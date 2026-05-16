<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanta Platform · VIP Client Operations</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-zinc-950 text-white antialiased">
    <main class="min-h-screen overflow-hidden">
        <section class="relative lg:min-h-screen">
            <div class="absolute inset-0">
                <div class="h-full w-full bg-[radial-gradient(circle_at_15%_20%,rgba(245,158,11,0.18),transparent_32%),radial-gradient(circle_at_78%_16%,rgba(20,184,166,0.16),transparent_28%),linear-gradient(135deg,#09090b_0%,#18181b_52%,#27272a_100%)]"></div>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-zinc-950 to-transparent"></div>
            </div>

            <header class="relative z-10 mx-auto flex max-w-6xl items-center justify-between px-6 py-6">
                <a href="{{ route('landing') }}" class="flex items-center gap-3" aria-label="Vanta Platform home">
                    <span class="grid size-9 place-items-center border border-amber-200/50 bg-white/[0.03] text-sm font-semibold text-amber-100">V</span>
                    <span class="text-sm font-medium uppercase tracking-[0.32em] text-zinc-100">Vanta</span>
                </a>
                <nav class="flex items-center gap-3">
                    <a href="#plans" class="hidden text-sm text-zinc-300 transition hover:text-white sm:inline">Plans</a>
                    <a href="{{ route('cards.index') }}" class="border border-white/20 px-4 py-2 text-sm font-medium text-white transition hover:border-amber-300 hover:text-amber-200">Card specifications</a>
                </nav>
            </header>

            <div class="relative z-10 mx-auto grid max-w-6xl items-center gap-12 px-6 pb-20 pt-12 lg:min-h-[calc(100vh-88px)] lg:grid-cols-[0.82fr_1.18fr] lg:pt-4">
                <div class="max-w-2xl">
                    <p class="mb-5 text-xs font-semibold uppercase tracking-[0.36em] text-amber-200">Clienteling control center</p>
                    <h1 class="text-5xl font-light leading-[1.02] tracking-tight text-white sm:text-6xl lg:text-7xl">
                        Total Recognition. Zero Friction.
                    </h1>
                    <p class="mt-7 max-w-lg text-lg leading-8 text-zinc-300">
                        Private recognition infrastructure for premium venues: metal access cards, signed VIP links, verified requests, and retention signals.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#plans" class="bg-amber-300 px-5 py-3 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Request Executive Walkthrough</a>
                        <a href="{{ route('cards.index') }}" class="border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50">View Card Specifications</a>
                    </div>
                    <div class="mt-8 grid max-w-xl gap-3 text-xs uppercase tracking-[0.2em] text-zinc-400 sm:grid-cols-3">
                        <span class="border border-white/10 bg-white/[0.04] px-3 py-3">1M+ Spend Verified</span>
                        <span class="border border-white/10 bg-white/[0.04] px-3 py-3">Black Tier</span>
                        <span class="border border-white/10 bg-white/[0.04] px-3 py-3">Vanta ID Active</span>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative">
                        <div class="absolute -inset-8 bg-amber-300/10 blur-3xl"></div>
                        <img
                            src="{{ asset('images/vanta-black-card-spec.png') }}"
                            alt="Vanta Black metal access card with engineering specifications"
                            class="relative aspect-[1.58/1] w-full border border-amber-200/25 object-cover shadow-2xl shadow-black/50"
                        >
                        <div class="relative mt-4 grid gap-px border border-white/10 bg-white/10 sm:grid-cols-3">
                            <div class="bg-zinc-950/95 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Access</p>
                                <p class="mt-2 text-lg font-light text-white">304 Steel NFC</p>
                            </div>
                            <div class="bg-zinc-950/95 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Security</p>
                                <p class="mt-2 text-lg font-light text-white">Email OTP</p>
                            </div>
                            <div class="bg-zinc-950/95 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Console</p>
                                <p class="mt-2 text-lg font-light text-white">Live Recognition</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20 lg:py-24">
            <div class="mx-auto max-w-6xl">
                <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Operational proof</p>
                <div class="mt-4 grid gap-5 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">
                    <h2 class="text-4xl font-light leading-tight text-white sm:text-5xl">The Vanta Protocol, live.</h2>
                    <p class="max-w-2xl text-base leading-8 text-zinc-300">
                        One flow connects the card, the guest, staff recognition, verified access, and the working platform surfaces a buyer can inspect.
                    </p>
                </div>

                <div class="mt-10 grid gap-px overflow-hidden border border-white/10 bg-white/10 md:grid-cols-4">
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">01</p>
                        <p class="mt-3 text-lg font-light text-white">Private Ledger</p>
                        <div class="mt-5 border border-white/10 bg-white/[0.035] p-4">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="font-mono text-sm uppercase tracking-[0.18em] text-white">Amina R.</p>
                                    <p class="mt-1 text-xs uppercase tracking-[0.2em] text-zinc-500">VIP 0014</p>
                                </div>
                                <span class="border border-amber-200/40 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.14em] text-amber-200">Black Tier</span>
                            </div>
                            <div class="mt-4 grid gap-2 font-mono text-[0.7rem] uppercase tracking-[0.12em] text-zinc-400">
                                <div class="flex items-center justify-between border-t border-white/10 pt-2">
                                    <span>Frequency</span>
                                    <span class="text-zinc-100">3x / week</span>
                                </div>
                                <div class="flex items-center justify-between border-t border-white/10 pt-2">
                                    <span>Spend</span>
                                    <span class="text-zinc-100">1M+ RWF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">02</p>
                        <p class="mt-3 text-lg font-light text-white">Magic link</p>
                        <div class="mt-5 mx-auto max-w-[10rem] border border-white/10 bg-black p-2 shadow-2xl shadow-black/30">
                            <div class="min-h-36 border border-white/10 bg-zinc-950 px-3 py-4">
                                <div class="mx-auto h-1 w-8 bg-white/15"></div>
                                <p class="mt-6 text-center text-[0.65rem] uppercase tracking-[0.2em] text-zinc-500">Private Access</p>
                                <button type="button" class="mt-5 w-full border border-amber-200/50 bg-amber-200/10 px-3 py-3 text-[0.68rem] font-semibold uppercase tracking-[0.12em] text-amber-100 shadow-[0_0_30px_rgba(251,191,36,0.12)]">
                                    Access Private Lounge
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">03</p>
                        <p class="mt-3 text-lg font-light text-white">Secure Gateway</p>
                        <div class="mt-5 border border-white/10 bg-white/[0.035] p-4">
                            <p class="font-mono text-[0.68rem] uppercase tracking-[0.18em] text-zinc-500">Verify identity</p>
                            <div class="mt-4 grid grid-cols-4 gap-2">
                                <span class="grid size-10 place-items-center border border-emerald-300/35 bg-emerald-300/10 font-mono text-lg text-emerald-100">•</span>
                                <span class="grid size-10 place-items-center border border-emerald-300/35 bg-emerald-300/10 font-mono text-lg text-emerald-100">•</span>
                                <span class="grid size-10 place-items-center border border-emerald-300/35 bg-emerald-300/10 font-mono text-lg text-emerald-100">•</span>
                                <span class="grid size-10 place-items-center border border-emerald-300/35 bg-emerald-300/10 font-mono text-lg text-emerald-100">•</span>
                            </div>
                            <div class="mt-4 inline-flex items-center gap-2 border border-emerald-300/30 bg-emerald-300/10 px-3 py-2 text-[0.68rem] font-semibold uppercase tracking-[0.12em] text-emerald-100">
                                <span>✓</span>
                                <span>Identity Verified</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">04</p>
                        <p class="mt-3 text-lg font-light text-white">Hardware Assets</p>
                        <img
                            src="{{ asset('images/vanta-black-card-spec.png') }}"
                            alt="Vanta Black metal card specifications"
                            class="mt-5 aspect-[1.58/1] w-full border border-amber-200/30 object-cover"
                            loading="lazy"
                        >
                    </div>
                </div>

                <div class="mt-4 grid gap-px overflow-hidden border border-white/10 bg-white/10 lg:grid-cols-4">
                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Surface</p>
                            <span class="bg-emerald-300 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-emerald-950">Live</span>
                        </div>
                        <h3 class="mt-4 text-xl font-light text-white">Public profile</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Brand slugs resolve as public recognition pages.</p>
                        <a href="{{ route('vip.profile.demo') }}" class="mt-4 inline-flex text-sm font-semibold text-amber-200 hover:text-amber-100">Open demo</a>
                    </article>

                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Security</p>
                            <span class="border border-amber-200/40 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-amber-200">Verified</span>
                        </div>
                        <h3 class="mt-4 text-xl font-light text-white">Magic link + OTP</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Signed URLs and email codes guard requests.</p>
                    </article>

                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Operations</p>
                            <span class="border border-white/15 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-zinc-300">Admin</span>
                        </div>
                        <h3 class="mt-4 text-xl font-light text-white">Brand-scoped console</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Managers see only their own brand data.</p>
                    </article>

                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Release</p>
                            <span class="border border-teal-200/40 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-teal-200">CI/CD</span>
                        </div>
                        <h3 class="mt-4 text-xl font-light text-white">Deployable platform</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Production promotion runs through tags.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="plans" class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20 lg:py-24">
            <div class="mx-auto max-w-6xl">
                <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">SLA and security subscription</p>
                <div class="mt-4 grid gap-5 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <h2 class="text-4xl font-light leading-tight text-white sm:text-5xl">Capacity, access, intelligence.</h2>
                    <div class="grid gap-3 sm:grid-cols-3">
                        <div class="border border-white/10 bg-white/[0.04] px-4 py-3 text-sm text-zinc-300">Security</div>
                        <div class="border border-white/10 bg-white/[0.04] px-4 py-3 text-sm text-zinc-300">Hosting</div>
                        <div class="border border-white/10 bg-white/[0.04] px-4 py-3 text-sm text-zinc-300">VIP capacity</div>
                    </div>
                </div>

                <div class="mt-10 grid gap-4 lg:grid-cols-3">
                    <article class="border border-white/10 bg-white/[0.04] p-6">
                        <div class="flex items-start justify-between gap-3">
                            <p class="min-w-0 text-xs font-semibold uppercase leading-5 tracking-[0.24em] text-amber-200">FOUNDING OPERATOR TIER</p>
                            <span class="border border-white/10 px-2 py-1 text-xs text-zinc-400">20 VIPs</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-light text-white">Vanta One</h3>
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Capped for early boutique operators.</p>
                        <div class="mt-6 space-y-3 text-sm text-zinc-300">
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">20 VIP Slots</p>
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">Email OTP & Magic Links</p>
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">Monthly Pulse Brief</p>
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">Powered by ApheZis Visible</p>
                        </div>
                        <p class="mt-6 text-3xl font-light text-white">$50<span class="text-sm text-zinc-500"> / mo</span></p>
                    </article>
                    <article class="border border-amber-300/40 bg-amber-300/[0.08] p-6 shadow-2xl shadow-amber-950/20">
                        <div class="flex items-start justify-between gap-3">
                            <p class="min-w-0 text-xs font-semibold uppercase leading-5 tracking-[0.24em] text-amber-200">PRIVATE ROLLOUT TIER</p>
                            <span class="border border-amber-200/30 px-2 py-1 text-xs text-amber-100">125 VIPs</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-light text-white">Vanta Luxe</h3>
                        <p class="mt-2 text-sm leading-6 text-zinc-300">Private-label retention infrastructure.</p>
                        <div class="mt-6 space-y-3 text-sm text-zinc-100">
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">125 VIP Slots</p>
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">Full White-Labeling</p>
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">Live Vanta View Dashboard</p>
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">Churn-Risk & Velocity Alerts</p>
                        </div>
                        <p class="mt-6 text-3xl font-light text-white">$200<span class="text-sm text-zinc-500"> / mo</span></p>
                    </article>
                    <article class="border border-white/10 bg-white/[0.04] p-6">
                        <div class="flex items-start justify-between gap-3">
                            <p class="min-w-0 text-xs font-semibold uppercase leading-5 tracking-[0.24em] text-amber-200">INVITATION-ONLY DEPLOYMENT</p>
                            <span class="border border-white/10 px-2 py-1 text-xs text-zinc-400">500 base</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-light text-white">Vanta Noir</h3>
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Reserved for multi-location deployments.</p>
                        <div class="mt-6 grid gap-2">
                            <div class="flex items-center gap-2">
                                <span class="size-3 bg-teal-200"></span>
                                <span class="text-xs uppercase tracking-[0.18em] text-zinc-500">SMS gateway</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="size-3 bg-amber-200"></span>
                                <span class="text-xs uppercase tracking-[0.18em] text-zinc-500">API access</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="size-3 bg-zinc-300"></span>
                                <span class="text-xs uppercase tracking-[0.18em] text-zinc-500">Black Glove</span>
                            </div>
                        </div>
                        <p class="mt-6 text-2xl font-light text-white">Bespoke<span class="text-sm text-zinc-500"> onboarding</span></p>
                    </article>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20 lg:py-24">
            <div class="mx-auto grid max-w-6xl gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Vanta Pulse</p>
                    <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Predictive retention, not dead data.</h2>
                    <p class="mt-5 max-w-xl text-base leading-8 text-zinc-300">
                        Vanta tracks access velocity. When a high-value guest disappears from their normal rhythm, managers see it early.
                    </p>
                    <div class="mt-7 border border-amber-200/20 bg-amber-300/[0.07] p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Scenario</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-300">
                            Boutique hotel: VIP guest inactive for 21 days. Pulse alert sent to the General Manager.
                        </p>
                    </div>
                </div>

                <div class="grid gap-px overflow-hidden border border-white/10 bg-white/10 sm:grid-cols-3">
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Trigger</p>
                        <p class="mt-4 text-3xl font-light text-white">50%</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Velocity drop over 14 days</p>
                    </div>
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Signal</p>
                        <p class="mt-4 text-3xl font-light text-amber-200">Pulse</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Monthly brief and live alerts</p>
                    </div>
                    <div class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Outcome</p>
                        <p class="mt-4 text-3xl font-light text-white">Retain</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Manager sees who needs attention</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="hardware" class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20 lg:py-24">
            <div class="mx-auto grid max-w-6xl gap-10 lg:grid-cols-[1fr_0.9fr] lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Hardware procurement</p>
                    <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Beyond plastic. A physical signal for private access.</h2>
                    <a href="{{ route('cards.index') }}" class="mt-7 inline-flex bg-amber-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">View Card Specifications</a>
                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        <div class="border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-2xl font-light text-white">$15</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.22em] text-zinc-400">Starting / unit</p>
                        </div>
                        <div class="border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-2xl font-light text-white">Quote</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.22em] text-zinc-400">Custom finishes</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4">
                    <img
                        src="{{ asset('images/vanta-black-card-spec.png') }}"
                        alt="Vanta Black 304 stainless steel card with NFC private access specifications"
                        class="aspect-[1.58/1] w-full border border-amber-200/30 object-cover shadow-2xl shadow-black/40"
                        loading="lazy"
                    >
                    <div class="grid grid-cols-3 gap-3">
                        <img
                            src="{{ asset('images/vanta-black-card-spec.png') }}"
                            alt="Vanta Black card reference"
                            class="aspect-[1.58/1] w-full border border-white/10 object-cover"
                            loading="lazy"
                        >
                        <img
                            src="{{ asset('images/vanta-gold-card-spec.png') }}"
                            alt="Vanta Gold card reference"
                            class="aspect-[1.58/1] w-full border border-white/10 object-cover"
                            loading="lazy"
                        >
                        <img
                            src="{{ asset('images/vanta-graphite-steel-card-spec.png') }}"
                            alt="Vanta Graphite Steel card reference"
                            class="aspect-[1.58/1] w-full border border-white/10 object-cover"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-10">
            <div class="mx-auto grid max-w-6xl gap-px overflow-hidden border border-white/10 bg-white/10 text-sm md:grid-cols-3">
                <div class="bg-zinc-950 p-5"><span class="text-zinc-100">Pilot sector</span><br><span class="text-zinc-500">Boutique Lounges (Kigali)</span></div>
                <div class="bg-zinc-950 p-5"><span class="text-zinc-100">Pilot sector</span><br><span class="text-zinc-500">Private Hospitality (Kigali)</span></div>
                <div class="bg-zinc-950 p-5"><span class="text-zinc-100">Pilot sector</span><br><span class="text-zinc-500">Premium Retail (Kigali)</span></div>
            </div>
            <div class="mx-auto mt-8 flex max-w-6xl justify-end">
                @include('partials.powered-by')
            </div>
        </section>
    </main>
</body>
</html>
