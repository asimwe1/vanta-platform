<x-filament-panels::page.simple>
    <style>
        .fi-simple-layout {
            min-height: 100vh;
            background:
                radial-gradient(circle at 14% 18%, rgba(245, 158, 11, 0.18), transparent 30%),
                radial-gradient(circle at 82% 20%, rgba(20, 184, 166, 0.14), transparent 28%),
                linear-gradient(135deg, #09090b 0%, #18181b 52%, #27272a 100%);
        }

        .fi-simple-main {
            width: min(100%, 520px);
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
    </style>

    <div class="vanta-login-mark">V</div>
    <p class="vanta-login-eyebrow">Vanta private admin</p>
    <div class="vanta-login-line"></div>
    <div class="vanta-login-trust" aria-label="Security and operations notes">
        <span>Signed VIP access</span>
        <span>Email OTP gate</span>
        <span>Command Center SLA</span>
    </div>

    {{ $this->content }}
</x-filament-panels::page.simple>
