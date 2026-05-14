<x-filament-panels::page>
    <style>
        .vanta-dashboard {
            display: grid;
            gap: 1.25rem;
        }

        .vanta-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.10);
            background:
                radial-gradient(circle at 12% 18%, rgba(245, 158, 11, 0.22), transparent 30%),
                radial-gradient(circle at 82% 18%, rgba(20, 184, 166, 0.16), transparent 26%),
                linear-gradient(135deg, #09090b 0%, #18181b 54%, #27272a 100%);
            color: #ffffff;
            padding: clamp(1.25rem, 3vw, 2rem);
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.24);
        }

        .vanta-hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 1.5rem;
        }

        @media (min-width: 960px) {
            .vanta-hero-grid {
                grid-template-columns: minmax(0, 1fr) 340px;
                align-items: end;
            }
        }

        .vanta-eyebrow {
            margin: 0 0 0.75rem;
            color: #fde68a;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.28em;
            text-transform: uppercase;
        }

        .vanta-title {
            max-width: 760px;
            margin: 0;
            color: #ffffff;
            font-size: clamp(2rem, 5vw, 4.5rem);
            font-weight: 300;
            line-height: 1.02;
            letter-spacing: 0;
        }

        .vanta-copy {
            max-width: 680px;
            margin: 1rem 0 0;
            color: #d4d4d8;
            font-size: 1rem;
            line-height: 1.8;
        }

        .vanta-pulse-card {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(9, 9, 11, 0.72);
            padding: 1rem;
            backdrop-filter: blur(18px);
        }

        .vanta-pulse-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.10);
            padding: 0.85rem 0;
        }

        .vanta-pulse-row:first-child {
            padding-top: 0;
        }

        .vanta-pulse-row:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .vanta-muted {
            color: #a1a1aa;
        }

        .vanta-status {
            display: inline-flex;
            align-items: center;
            background: #a7f3d0;
            color: #064e3b;
            padding: 0.25rem 0.55rem;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.14em;
        }

        .vanta-metrics {
            display: grid;
            gap: 1rem;
        }

        @media (min-width: 760px) {
            .vanta-metrics {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .vanta-metric {
            border: 1px solid rgba(24, 24, 27, 0.10);
            background: #fafafa;
            padding: 1.25rem;
            box-shadow: 0 14px 35px rgba(24, 24, 27, 0.06);
        }

        .dark .vanta-metric {
            border-color: rgba(255, 255, 255, 0.10);
            background: rgba(39, 39, 42, 0.62);
        }

        .vanta-metric-label {
            margin: 0;
            color: #71717a;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .dark .vanta-metric-label {
            color: #a1a1aa;
        }

        .vanta-metric-value {
            margin: 0.55rem 0 0;
            color: #18181b;
            font-size: 2.35rem;
            font-weight: 300;
            line-height: 1;
        }

        .dark .vanta-metric-value {
            color: #ffffff;
        }

        .vanta-metric-detail {
            margin: 0.5rem 0 0;
            color: #71717a;
            font-size: 0.9rem;
        }

        .dark .vanta-metric-detail {
            color: #d4d4d8;
        }

        .vanta-grid {
            display: grid;
            gap: 1rem;
        }

        @media (min-width: 1024px) {
            .vanta-grid {
                grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
            }
        }

        .vanta-panel {
            border: 1px solid rgba(24, 24, 27, 0.10);
            background: #fafafa;
            padding: 1.25rem;
        }

        .dark .vanta-panel {
            border-color: rgba(255, 255, 255, 0.10);
            background: rgba(39, 39, 42, 0.62);
        }

        .vanta-panel-head {
            display: flex;
            align-items: start;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .vanta-panel-title {
            margin: 0;
            color: #18181b;
            font-size: 1.05rem;
            font-weight: 600;
        }

        .dark .vanta-panel-title {
            color: #ffffff;
        }

        .vanta-panel-subtitle {
            margin: 0.2rem 0 0;
            color: #71717a;
            font-size: 0.88rem;
        }

        .dark .vanta-panel-subtitle {
            color: #a1a1aa;
        }

        .vanta-link {
            color: #b45309;
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
        }

        .dark .vanta-link {
            color: #fde68a;
        }

        .vanta-list {
            display: grid;
            gap: 0.75rem;
        }

        .vanta-client {
            display: grid;
            gap: 0.85rem;
            border: 1px solid rgba(24, 24, 27, 0.08);
            background: rgba(255, 255, 255, 0.72);
            padding: 1rem;
        }

        @media (min-width: 680px) {
            .vanta-client {
                grid-template-columns: 44px minmax(0, 1fr) auto;
                align-items: center;
            }
        }

        .dark .vanta-client {
            border-color: rgba(255, 255, 255, 0.10);
            background: rgba(9, 9, 11, 0.34);
        }

        .vanta-avatar {
            display: grid;
            width: 44px;
            height: 44px;
            place-items: center;
            background: #fcd34d;
            color: #18181b;
            font-weight: 800;
        }

        .vanta-client-name {
            margin: 0;
            color: #18181b;
            font-weight: 700;
        }

        .dark .vanta-client-name {
            color: #ffffff;
        }

        .vanta-client-meta {
            margin: 0.25rem 0 0;
            color: #71717a;
            font-size: 0.88rem;
        }

        .dark .vanta-client-meta {
            color: #a1a1aa;
        }

        .vanta-tier {
            width: fit-content;
            border: 1px solid rgba(245, 158, 11, 0.35);
            color: #92400e;
            padding: 0.35rem 0.55rem;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .dark .vanta-tier {
            color: #fde68a;
        }

        .vanta-empty {
            border: 1px dashed rgba(113, 113, 122, 0.45);
            color: #71717a;
            padding: 1rem;
            font-size: 0.92rem;
        }

        .dark .vanta-empty {
            color: #a1a1aa;
        }

        .vanta-notice {
            display: grid;
            gap: 1rem;
            border: 1px solid rgba(245, 158, 11, 0.28);
            background: rgba(245, 158, 11, 0.08);
            padding: 1rem;
        }

        @media (min-width: 820px) {
            .vanta-notice {
                grid-template-columns: minmax(0, 1fr) auto;
                align-items: center;
            }
        }
    </style>

    <div class="vanta-dashboard">
        <section class="vanta-hero">
            <div class="vanta-hero-grid">
                <div>
                    <p class="vanta-eyebrow">{{ $lensLabel }}</p>
                    <h2 class="vanta-title">A calmer command room for high-touch VIP service.</h2>
                    <p class="vanta-copy">
                        Track brand health, profile readiness, and public VIP touchpoints from one focused workspace built for concierge teams.
                    </p>
                </div>

                <div class="vanta-pulse-card">
                    <div class="vanta-pulse-row">
                        <div>
                            <div style="font-weight: 700;">Service pulse</div>
                            <div class="vanta-muted" style="font-size: 0.85rem;">Operational snapshot</div>
                        </div>
                        <span class="vanta-status">Live</span>
                    </div>
                    <div class="vanta-pulse-row">
                        <span class="vanta-muted">Profile readiness</span>
                        <strong>{{ $metrics[0]['value'] > 0 ? 'Active' : 'Setup' }}</strong>
                    </div>
                    <div class="vanta-pulse-row">
                        <span class="vanta-muted">Public experience</span>
                        <strong>Premium</strong>
                    </div>
                    <div class="vanta-pulse-row">
                        <span class="vanta-muted">Admin mode</span>
                        <strong>Focused</strong>
                    </div>
                </div>
            </div>
        </section>

        <section class="vanta-metrics">
            @foreach ($metrics as $metric)
                <article class="vanta-metric">
                    <p class="vanta-metric-label">{{ $metric['label'] }}</p>
                    <p class="vanta-metric-value">{{ number_format($metric['value']) }}</p>
                    <p class="vanta-metric-detail">{{ $metric['detail'] }}</p>
                </article>
            @endforeach
        </section>

        @if ($currentBrand)
            <section class="vanta-metrics">
                @foreach ($billingMetrics as $metric)
                    <article class="vanta-metric">
                        <p class="vanta-metric-label">{{ $metric['label'] }}</p>
                        <p class="vanta-metric-value" style="font-size: 1.7rem;">{{ $metric['value'] }}</p>
                        <p class="vanta-metric-detail">{{ $metric['detail'] }}</p>
                    </article>
                @endforeach
            </section>

            @if ($currentBrand->card_stock_remaining < 5)
                <section class="vanta-notice">
                    <div>
                        <p class="vanta-panel-title">Metal card stock is low</p>
                        <p class="vanta-panel-subtitle">
                            Replenish cards before the next VIP onboarding batch. Standard designs are fixed-price; custom designs move through a manual quote.
                        </p>
                    </div>
                    <a class="vanta-link" href="{{ $cardOrderCreateUrl }}">Order cards</a>
                </section>
            @endif
        @endif

        <section class="vanta-grid">
            <article class="vanta-panel">
                <div class="vanta-panel-head">
                    <div>
                        <h3 class="vanta-panel-title">Recent VIP profiles</h3>
                        <p class="vanta-panel-subtitle">Newest client records awaiting concierge context.</p>
                    </div>
                    <a class="vanta-link" href="{{ $vipIndexUrl }}">View all</a>
                </div>

                <div class="vanta-list">
                    @forelse ($recentVipClients as $client)
                        <div class="vanta-client">
                            <div class="vanta-avatar">{{ str($client->full_name)->substr(0, 1)->upper() }}</div>
                            <div>
                                <p class="vanta-client-name">{{ $client->full_name }}</p>
                                <p class="vanta-client-meta">
                                    {{ $client->brand?->name ?? 'No brand' }} · {{ $client->membership_code }}
                                </p>
                            </div>
                            <span class="vanta-tier">{{ $client->tier ?: 'VIP' }}</span>
                        </div>
                    @empty
                        <div class="vanta-empty">
                            No VIP clients yet. Create the first profile to start building the private client experience.
                        </div>
                    @endforelse
                </div>
            </article>

            <article class="vanta-panel">
                <div class="vanta-panel-head">
                    <div>
                        <h3 class="vanta-panel-title">{{ $showAdvancedInsights ? 'Vanta View insights' : 'Service request inbox' }}</h3>
                        <p class="vanta-panel-subtitle">
                            {{ $showAdvancedInsights ? 'Advanced retainer lens: verified requests, activity patterns, and briefing-ready signals.' : 'Tier I lens: latest verified actions from VIP clients.' }}
                        </p>
                    </div>
                    <a class="vanta-link" href="{{ $serviceRequestIndexUrl }}">View inbox</a>
                </div>

                <div class="vanta-list">
                    @forelse ($latestServiceRequests as $request)
                        <div class="vanta-client">
                            <div class="vanta-avatar">{{ str($request->vipClient?->full_name ?? 'V')->substr(0, 1)->upper() }}</div>
                            <div>
                                <p class="vanta-client-name">{{ $request->vipClient?->full_name ?? 'Unknown profile' }}</p>
                                <p class="vanta-client-meta">
                                    {{ $request->brand?->name ?? 'No brand' }} · {{ str($request->type)->headline() }} · {{ $request->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <span class="vanta-tier">{{ $request->status }}</span>
                        </div>
                    @empty
                        <div class="vanta-empty">
                            No service requests yet. Verified client actions will appear here after OTP confirmation.
                        </div>
                    @endforelse
                </div>
            </article>
        </section>
    </div>
</x-filament-panels::page>
