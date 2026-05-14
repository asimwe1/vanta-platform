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
                width: min(100%, 1180px);
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
            display: none;
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
            grid-template-columns: 1fr;   /* single column on mobile */
            width: 100%;
            min-height: 100vh;
            gap: 0;                        /* no gap needed when visual is hidden */
        }

        .vanta-login-form {
            position: relative;
            z-index: 1;
            min-width: 0;
        }

        .vanta-login-title {
            margin: 0;
            max-width: 34rem;
            color: #ffffff;
            font-size: clamp(2rem, 7vw, 3.35rem);
            font-weight: 300;
            letter-spacing: 0;
            line-height: 1.02;
        }

        .vanta-login-copy {
            margin: 1.25rem 0 0;
            max-width: 36rem;
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
            align-items: center;
            justify-items: center;
            padding: 2rem;
            }

        .vanta-login-form {
            max-width: 36rem;
            width: 100%;
            }
        }

        .vanta-login-form-frame {
            margin-top: 1.5rem;
            max-width: 32rem;
        }

        .vanta-login-visual {
            display: none;
        }
        @media (min-width: 1024px) {
            .vanta-login-shell {
                grid-template-columns: minmax(560px, 2fr) minmax(320px, 1fr);
                min-height: min(720px, calc(100vh - 5rem));
                gap: 0;
            }

            .vanta-login-form {
                display: flex;
                flex-direction: column;
                justify-content: center;
                min-height: min(720px, calc(100vh - 5rem));
                padding: clamp(2.5rem, 4.5vw, 4.5rem);
                background:
                    radial-gradient(circle at 18% 20%, rgba(245, 158, 11, 0.16), transparent 34%),
                    rgba(9, 9, 11, 0.28);
            }

            .vanta-login-form-frame {
                margin-top: 2rem;
                max-width: 30rem;
            }

            .vanta-login-title {
                font-size: clamp(3rem, 4.7vw, 5.35rem);
                max-width: 42rem;
            }

            .vanta-login-copy {
                max-width: 39rem;
                font-size: 1rem;
            }

            .vanta-login-visual {
                display: flex;
                flex-direction: column;
                justify-content: stretch;
                min-height: min(720px, calc(100vh - 5rem));
                padding: 1rem;
                border-left: 1px solid rgba(255, 255, 255, 0.10);
                background:
                    linear-gradient(180deg, rgba(252, 211, 77, 0.12), rgba(20, 184, 166, 0.08)),
                    rgba(255, 255, 255, 0.025);
            }

            .vanta-login-image {
                position: relative;
                isolation: isolate;
                flex: 1;
                min-height: 0;
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.12);
                background:
                    linear-gradient(145deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.03)),
                    radial-gradient(circle at 52% 25%, rgba(252, 211, 77, 0.28), transparent 30%),
                    linear-gradient(160deg, #111113 0%, #202025 52%, #09090b 100%);
            }

            .vanta-login-image::before {
                content: "";
                position: absolute;
                inset: -20%;
                z-index: -1;
                background:
                    linear-gradient(115deg, transparent 0 42%, rgba(252, 211, 77, 0.16) 43% 44%, transparent 45% 100%),
                    linear-gradient(145deg, transparent 0 56%, rgba(255, 255, 255, 0.10) 57% 58%, transparent 59% 100%);
                transform: rotate(-8deg);
            }

            .vanta-metal-card {
                position: absolute;
                top: 16%;
                left: 50%;
                width: min(82%, 22rem);
                aspect-ratio: 1.58 / 1;
                padding: 1.4rem;
                transform: translateX(-50%) rotate(-8deg);
                border: 1px solid rgba(252, 211, 77, 0.48);
                background:
                    linear-gradient(135deg, rgba(255, 255, 255, 0.12), transparent 32%),
                    linear-gradient(160deg, #050505, #1e1e22 55%, #0b0b0d);
                box-shadow: 0 34px 70px rgba(0, 0, 0, 0.44), inset 0 1px 0 rgba(255, 255, 255, 0.18);
            }

            .vanta-metal-card::after {
                content: "";
                position: absolute;
                right: 1.2rem;
                bottom: 1.2rem;
                width: 2.3rem;
                height: 1.45rem;
                border: 1px solid rgba(252, 211, 77, 0.45);
                background: linear-gradient(135deg, rgba(252, 211, 77, 0.48), rgba(217, 119, 6, 0.18));
            }

            .vanta-card-code {
                color: #fde68a;
                font-size: 0.72rem;
                font-weight: 800;
                letter-spacing: 0.22em;
                text-transform: uppercase;
            }

            .vanta-card-title {
                margin-top: 2.8rem;
                color: #ffffff;
                font-size: 1.55rem;
                font-weight: 300;
                letter-spacing: 0;
                line-height: 1.05;
            }

            .vanta-card-meta {
                position: absolute;
                left: 1.4rem;
                bottom: 1.3rem;
                color: #a1a1aa;
                font-size: 0.72rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
            }

            .vanta-visual-stat {
                position: absolute;
                right: 8%;
                bottom: 12%;
                width: min(72%, 17rem);
                padding: 1rem;
                border: 1px solid rgba(255, 255, 255, 0.12);
                background: rgba(9, 9, 11, 0.76);
                box-shadow: 0 24px 60px rgba(0, 0, 0, 0.36);
                backdrop-filter: blur(18px);
            }

            .vanta-visual-stat strong {
                display: block;
                color: #ffffff;
                font-size: 1.7rem;
                font-weight: 300;
                letter-spacing: 0;
            }

            .vanta-visual-stat span {
                display: block;
                margin-top: 0.45rem;
                color: #a1a1aa;
                font-size: 0.78rem;
                line-height: 1.6;
            }

            .vanta-visual-dots {
                position: absolute;
                left: 9%;
                bottom: 10%;
                display: grid;
                gap: 0.45rem;
            }

            .vanta-visual-dots i {
                display: block;
                width: 0.55rem;
                height: 0.55rem;
                border: 1px solid rgba(252, 211, 77, 0.58);
                background: rgba(252, 211, 77, 0.2);
            }

            .vanta-login-trust {
                max-width: 35rem;
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
        <div class="vanta-login-form">
            <div class="vanta-login-form-head">
                <div class="vanta-login-mark">V</div>
                <p class="vanta-login-eyebrow">Vanta private admin</p>
                <h1 class="vanta-login-title">Enter the command center.</h1>
                <p class="vanta-login-copy">
                    Manage VIP profiles, verified requests, retainer status, and card inventory from one controlled APHEZIS workspace.
                </p>
            </div>

            <div class="vanta-login-form-frame">
                {{ $this->content }}
            </div>

            <div class="vanta-login-panel-meta">
                <div class="vanta-login-line"></div>
                <div class="vanta-login-trust" aria-label="Security and operations notes">
                    <span>Signed VIP access</span>
                    <span>Email OTP gate</span>
                    <span>Command Center SLA</span>
                </div>
                <p>Protected administrative surface</p>
            </div>
        </div>

        <div class="vanta-login-visual" aria-hidden="true">
            <div class="vanta-login-image">
                <div class="vanta-metal-card">
                    <div class="vanta-card-code">APHEZIS VANTA</div>
                    <div class="vanta-card-title">Private access<br>infrastructure</div>
                    <div class="vanta-card-meta">NFC verified</div>
                </div>

                <div class="vanta-visual-dots">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>

                <div class="vanta-visual-stat">
                    <strong>30-day</strong>
                    <span>Signed operational access with OTP-gated service requests.</span>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page.simple>
