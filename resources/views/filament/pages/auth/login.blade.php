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
            width: min(100%, 470px);
        }

        .fi-simple-page-content {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(9, 9, 11, 0.72);
            padding: clamp(1.25rem, 5vw, 2rem);
            box-shadow: 0 28px 80px rgba(0, 0, 0, 0.38);
            backdrop-filter: blur(18px);
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
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: 1rem;
            place-items: center;
            border: 1px solid rgba(252, 211, 77, 0.68);
            background: #fcd34d;
            color: #18181b;
            font-weight: 800;
        }

        .vanta-login-eyebrow {
            margin: 0 0 0.75rem;
            color: #fde68a;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.26em;
            text-transform: uppercase;
        }
    </style>

    <div class="vanta-login-mark">V</div>
    <p class="vanta-login-eyebrow">Vanta private admin</p>

    {{ $this->content }}
</x-filament-panels::page.simple>
