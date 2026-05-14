# Vanta Production Deployment

This repo deploys `dev-branch` to `vanta.aphezis.com` through GitHub Actions.

## GitHub Secrets

Set these in `asimwe1/vanta-platform` under `Settings -> Secrets and variables -> Actions`:

- `DEPLOY_SSH_KEY`: private key allowed to SSH into the server

Do not commit private keys, production `.env` files, passwords, API tokens, SMTP credentials, or Cloudflare tokens. Keep those values in GitHub Secrets or in `/var/www/vanta-platform/shared/.env` on the server.

The workflow already targets:

- host: `41.186.186.162`
- port: `222`
- user: `root`
- path: `/var/www/vanta-platform`
- domain: `vanta.aphezis.com`

The workflow builds PHP vendor files and Vite assets in GitHub Actions, uploads one archive to the server, then performs an atomic symlink release:

- releases: `/var/www/vanta-platform/releases/<timestamp-sha>`
- shared env/storage/database: `/var/www/vanta-platform/shared`
- web root: `/var/www/vanta-platform/current/public`

This keeps Vanta isolated from other production apps.

## Server Setup

Create a dedicated Nginx site using `deploy/nginx/vanta.aphezis.com.conf`.

Important:

- Do not point Nginx at another app's directory.
- Do not reuse another app's `.env`, database, storage, queue worker, or PHP-FPM pool.
- Do not remove or replace existing Nginx sites. Add `vanta.aphezis.com` beside the existing domains so current production apps continue serving normally.
- If the server uses PHP 8.5 or 8.3 instead of 8.4, change the `fastcgi_pass` socket in the Nginx config.

Recommended commands on the server:

```bash
mkdir -p /var/www/vanta-platform
cp /path/to/repo/deploy/nginx/vanta.aphezis.com.conf /etc/nginx/sites-available/vanta.aphezis.com
ln -s /etc/nginx/sites-available/vanta.aphezis.com /etc/nginx/sites-enabled/vanta.aphezis.com
nginx -t
systemctl reload nginx
```

The deployment workflow creates `.env` on first deploy if one does not exist. For production, use MySQL on the server and keep its credentials only in `/var/www/vanta-platform/shared/.env`.

Current production database:

- connection: `mysql`
- host: `127.0.0.1`
- database: `vanta_platform`
- user: `vanta_platform`

Do not commit the MySQL password. Edit `/var/www/vanta-platform/shared/.env` on the server for production mail, queue, and database settings.

Use `.env.production.example` as a checklist only. It intentionally contains placeholders and must not contain real secrets.

## Release and Integration Management

Two GitHub Actions workflows manage integration and releases:

- `Integration checks`: runs Composer validation, migrations, Laravel tests, Vite build, and route boot checks for pull requests.
- `Release management`: manually creates annotated version tags and GitHub Releases for the private platform.

To create a private release:

1. Open GitHub Actions.
2. Run `Release management`.
3. Enter a semantic version such as `v1.0.0`.
4. Use `dev-branch` or a specific commit SHA as the target.
5. Add release notes for what changed.

Tags are version markers. Deployment still happens from `dev-branch` through `Build and deploy Vanta`, so you can separate production deployment from private release bookkeeping.

## Cloudflare

In Cloudflare DNS for `aphezis.com`:

- Type: `A`
- Name: `vanta`
- IPv4 address: `41.186.186.162`
- Proxy: start as `DNS only` until the origin certificate works, then switch to proxied if desired.

SSL/TLS:

- Set mode to `Full (strict)` once the origin has a valid certificate.
- Either install Let's Encrypt on the server for `vanta.aphezis.com`, or create a Cloudflare Origin Certificate and install it in Nginx.
- Enable `Always Use HTTPS` after the certificate is working.

Do not change existing DNS records for other production apps.

## Side-by-side Safety

This deployment does not restart PHP-FPM, Nginx, Supervisor, or any other app service. Existing apps keep running.

If Vanta later needs queue workers, create a separate service name such as `vanta-worker` and point it to:

```bash
cd /var/www/vanta-platform/current && php artisan queue:work --tries=3
```

Avoid global `php artisan queue:restart` on a shared server unless Vanta has isolated cache/queue configuration.
