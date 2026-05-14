<x-filament-panels::page>
    <style>
        .billing-grid {
            display: grid;
            gap: 1rem;
        }

        @media (min-width: 960px) {
            .billing-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .billing-card {
            border: 1px solid rgba(24, 24, 27, 0.10);
            background: #fafafa;
            padding: 1.25rem;
        }

        .dark .billing-card {
            border-color: rgba(255, 255, 255, 0.10);
            background: rgba(39, 39, 42, 0.62);
        }

        .billing-label {
            margin: 0;
            color: #71717a;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .dark .billing-label {
            color: #a1a1aa;
        }

        .billing-value {
            margin: 0.5rem 0 0;
            color: #18181b;
            font-size: 2rem;
            font-weight: 300;
        }

        .dark .billing-value {
            color: #ffffff;
        }

        .billing-table {
            margin-top: 1rem;
            overflow: hidden;
            border: 1px solid rgba(24, 24, 27, 0.10);
        }

        .dark .billing-table {
            border-color: rgba(255, 255, 255, 0.10);
        }

        .billing-row {
            display: grid;
            gap: 0.75rem;
            border-bottom: 1px solid rgba(24, 24, 27, 0.08);
            padding: 1rem;
        }

        @media (min-width: 980px) {
            .billing-row {
                grid-template-columns: 1.4fr 0.8fr 0.8fr 0.8fr 0.8fr;
                align-items: center;
            }
        }

        .dark .billing-row {
            border-bottom-color: rgba(255, 255, 255, 0.10);
        }

        .billing-row:last-child {
            border-bottom: 0;
        }

        .billing-name {
            margin: 0;
            color: #18181b;
            font-weight: 700;
        }

        .dark .billing-name {
            color: #ffffff;
        }

        .billing-muted {
            margin: 0.2rem 0 0;
            color: #71717a;
            font-size: 0.85rem;
        }

        .dark .billing-muted {
            color: #a1a1aa;
        }
    </style>

    <div class="billing-grid">
        <article class="billing-card">
            <p class="billing-label">Renewal watch</p>
            <p class="billing-value">{{ $expiringBrands->count() }}</p>
            <p class="billing-muted">Brands expiring in the next 14 days.</p>
        </article>

        <article class="billing-card">
            <p class="billing-label">Low card stock</p>
            <p class="billing-value">{{ $lowStockBrands->count() }}</p>
            <p class="billing-muted">Brands below the 5-card replenishment threshold.</p>
        </article>

        <article class="billing-card">
            <p class="billing-label">Manual billing model</p>
            <p class="billing-value">SLA</p>
            <p class="billing-muted">Retainer, security, hosting, and procurement stay visible without payment gateway complexity.</p>
        </article>
    </div>

    <section class="billing-card">
        <div style="display: flex; justify-content: space-between; gap: 1rem; align-items: start;">
            <div>
                <p class="billing-label">Brand billing ledger</p>
                <p class="billing-muted">Use this view for renewal calls, stock follow-up, and tier upgrade planning.</p>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a class="fi-btn fi-size-md fi-btn-color-gray" href="{{ $brandIndexUrl }}">Manage brands</a>
                <a class="fi-btn fi-size-md fi-btn-color-warning" href="{{ $cardOrderIndexUrl }}">Card orders</a>
            </div>
        </div>

        <div class="billing-table">
            @forelse ($brands as $brand)
                <div class="billing-row">
                    <div>
                        <p class="billing-name">{{ $brand->name }}</p>
                        <p class="billing-muted">{{ $brand->email ?: 'No billing email' }}</p>
                    </div>
                    <div>
                        <p class="billing-label">Tier</p>
                        <p class="billing-muted">{{ $tierOptions[$brand->subscription_tier] ?? str($brand->subscription_tier)->headline() }}</p>
                    </div>
                    <div>
                        <p class="billing-label">Capacity</p>
                        <p class="billing-muted">{{ number_format($brand->vip_clients_count) }} / {{ number_format($brand->vip_capacity) }}</p>
                    </div>
                    <div>
                        <p class="billing-label">Cards</p>
                        <p class="billing-muted">{{ number_format($brand->card_stock_remaining) }} in stock · {{ number_format($brand->card_orders_count) }} orders</p>
                    </div>
                    <div>
                        <p class="billing-label">SLA ends</p>
                        <p class="billing-muted">{{ $brand->subscription_end_date?->format('M j, Y') ?? 'Not set' }}</p>
                    </div>
                </div>
            @empty
                <div class="billing-row">
                    <p class="billing-muted">No brands have been created yet.</p>
                </div>
            @endforelse
        </div>
    </section>
</x-filament-panels::page>
