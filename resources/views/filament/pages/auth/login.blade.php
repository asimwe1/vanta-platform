<x-filament-panels::page.simple>
    <style>
        .fi-simple-layout {
            min-height: 100vh;
            padding: clamp(1rem, 3vw, 2.5rem);
            background:
                radial-gradient(circle at 14% 18%, rgba(245, 158, 11, 0.18), transparent 30%),
                radial-gradient(circle at 82% 20%, rgba(20, 184, 166, 0.14), transparent 28%),
                linear-gradient(135deg, #09090b 0%, #18181b 52%, #27272a 100%);
        }

        .fi-simple-main {
            width: min(100%, 520px);
        }

        @media (min-width: 1024px) {
            .fi-simple-main {
                width: min(100%, 1080px);
            }
        }

        .fi-simple-page-content {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.085), rgba(255, 255, 255, 0.035)),
                rgba(9, 9, 11, 0.82);
            padding: clamp(1.35rem, 5vw, 2.25rem);
            box-shadow: 0 32px 90px rgba(0, 0, 0, 0.44);
            backdrop-filter: blur(22px);
            position: relative;
            overflow: hidden;
        }

        @media (min-width: 768px) {
            .fi-simple-page-content {
                padding: clamp(2rem, 4vw, 3rem);
            }
        }

        @media (min-width: 1024px) {
            .fi-simple-page-content {
                padding: 0;
            }
        }

        .fi-simple-page-content::before {
            content: "";
            position: absolute;
            inset: 0;
            border-top: 1px solid rgba(252, 211, 77, 0.42);
            pointer-events: none;
        }

        .fi-simple-header {
            align-items: start;
            text-align: left;
        }

        @media (min-width: 1024px) {
            .fi-simple-header {
                display: none;
            }
        }

        .fi-simple-header-heading {
            color: #ffffff;
            font-size: clamp(2rem, 8vw, 3.25rem);
            font-weight: 300;
            letter-spacing: 0;
            line-height: 1.04;
        }

        .fi-simple-header-subheading {
            color: #d4d4d8;
            line-height: 1.75;
        }

        .vanta-login-mark {
            display: inline-grid;
            width: 3.25rem;
            height: 3.25rem;
            margin-bottom: 1.1rem;
            place-items: center;
            border: 1px solid rgba(252, 211, 77, 0.68);
            background: linear-gradient(135deg, #fde68a, #d97706);
            color: #09090b;
            font-weight: 800;
            box-shadow: 0 18px 50px rgba(245, 158, 11, 0.24);
        }

        @media (min-width: 1024px) {
            .vanta-login-mark {
                width: 3.75rem;
                height: 3.75rem;
                margin-bottom: 1.25rem;
            }
        }

        .vanta-login-eyebrow {
            margin: 0 0 0.75rem;
            color: #fde68a;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.26em;
            text-transform: uppercase;
        }

        .vanta-login-trust {
            display: grid;
            gap: 0.75rem;
            margin: 1.35rem 0 1.65rem;
            color: #a1a1aa;
            font-size: 0.82rem;
        }

        @media (min-width: 560px) {
            .vanta-login-trust {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .vanta-login-trust span {
            border: 1px solid rgba(255, 255, 255, 0.10);
            background: rgba(255, 255, 255, 0.04);
            padding: 0.7rem 0.75rem;
        }

        .vanta-login-line {
            height: 1px;
            margin: 0 0 1.35rem;
            background: linear-gradient(90deg, rgba(252, 211, 77, 0.62), rgba(255, 255, 255, 0.08), transparent);
        }

        .vanta-login-shell {
            display: grid;
            gap: 1.5rem;
        }

        .vanta-login-intro {
            position: relative;
            z-index: 1;
        }

        .vanta-login-form {
            position: relative;
            z-index: 1;
            min-width: 0;
        }

        .vanta-login-title {
            display: none;
            margin: 0;
            max-width: 26rem;
            color: #ffffff;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 300;
            letter-spacing: 0;
            line-height: 1.02;
        }

        .vanta-login-copy {
            display: none;
            margin: 1.25rem 0 0;
            max-width: 28rem;
            color: #d4d4d8;
            font-size: 0.98rem;
            line-height: 1.85;
        }

        .vanta-login-panel-meta {
            display: none;
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .vanta-login-shell {
                gap: 1.75rem;
            }

            .vanta-login-intro {
                max-width: 36rem;
            }
        }

        @media (min-width: 1024px) {
            .vanta-login-shell {
                grid-template-columns: minmax(0, 1.05fr) minmax(390px, 0.75fr);
                min-height: 680px;
                gap: 0;
            }

            .vanta-login-intro {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                min-height: 680px;
                padding: clamp(2rem, 4vw, 3.5rem);
                border-right: 1px solid rgba(255, 255, 255, 0.10);
                background:
                    radial-gradient(circle at 18% 20%, rgba(245, 158, 11, 0.16), transparent 34%),
                    rgba(255, 255, 255, 0.025);
            }

            .vanta-login-form {
                display: flex;
                flex-direction: column;
                justify-content: center;
                min-height: 680px;
                padding: clamp(2rem, 4vw, 3.25rem);
                background: rgba(9, 9, 11, 0.28);
            }

            .vanta-login-title,
            .vanta-login-copy,
            .vanta-login-panel-meta {
                display: block;
            }

            .vanta-login-trust {
                grid-template-columns: none;
                margin: 2rem 0 0;
                max-width: 24rem;
            }

            .vanta-login-trust span {
                padding: 0.85rem 0.95rem;
            }

            .vanta-login-line {
                margin-bottom: 2rem;
            }

            .vanta-login-panel-meta {
                margin-top: 2rem;
                color: #71717a;
                font-size: 0.78rem;
                letter-spacing: 0.2em;
                text-transform: uppercase;
            }
        }

        @media (max-width: 420px) {
            .fi-simple-layout {
                padding: 0.75rem;
            }

            .fi-simple-page-content {
                padding: 1rem;
            }

            .vanta-login-trust {
                gap: 0.55rem;
                margin: 1rem 0 1.25rem;
                font-size: 0.78rem;
            }

            .vanta-login-trust span {
                padding: 0.62rem 0.7rem;
            }
        }
    </style>

    <div class="vanta-login-shell">
        <div class="vanta-login-intro">
            <div>
                <div class="vanta-login-mark">V</div>
                <p class="vanta-login-eyebrow">Vanta private admin</p>
                <h1 class="vanta-login-title">Command access for private client operations.</h1>
                <p class="vanta-login-copy">
                    Manage VIP profiles, verified requests, retainer status, and card inventory from one controlled APHEZIS workspace.
                </p>
            </div>

            <div>
                <div class="vanta-login-line"></div>
                <div class="vanta-login-trust" aria-label="Security and operations notes">
                    <span>Signed VIP access</span>
                    <span>Email OTP gate</span>
                    <span>Command Center SLA</span>
                </div>
                <p class="vanta-login-panel-meta">Protected administrative surface</p>
            </div>
        </div>

        <div class="vanta-login-form">
            {{ $this->content }}
        </div>
    </div>
</x-filament-panels::page.simple>
