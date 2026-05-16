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
        <section class="relative min-h-screen">
            <div class="absolute inset-0">
                <div class="h-full w-full bg-[radial-gradient(circle_at_15%_20%,rgba(245,158,11,0.18),transparent_32%),radial-gradient(circle_at_78%_16%,rgba(20,184,166,0.16),transparent_28%),linear-gradient(135deg,#09090b_0%,#18181b_52%,#27272a_100%)]"></div>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-zinc-950 to-transparent"></div>
            </div>

            <header class="relative z-10 mx-auto flex max-w-6xl items-center justify-between px-6 py-6">
                <a href="{{ route('landing') }}" class="flex items-center gap-3" aria-label="Vanta Platform home">
                    <span class="grid size-9 place-items-center border border-amber-300/60 bg-amber-300 text-sm font-semibold text-zinc-950">V</span>
                    <span class="text-sm font-medium uppercase tracking-[0.28em] text-zinc-200">Vanta</span>
                </a>
                <nav class="flex items-center gap-3">
                    <a href="#plans" class="hidden text-sm text-zinc-300 transition hover:text-white sm:inline">Plans</a>
                    <a href="{{ route('cards.index') }}" class="border border-white/20 px-4 py-2 text-sm font-medium text-white transition hover:border-amber-300 hover:text-amber-200">Card specifications</a>
                </nav>
            </header>

            <div class="relative z-10 mx-auto grid min-h-[calc(100vh-88px)] max-w-6xl items-center gap-12 px-6 pb-16 pt-10 lg:grid-cols-[0.95fr_1.05fr]">
                <div class="max-w-2xl">
                    <p class="mb-5 text-xs font-semibold uppercase tracking-[0.36em] text-amber-200">Clienteling control center</p>
                    <h1 class="text-5xl font-light leading-[1.02] tracking-tight text-white sm:text-6xl lg:text-7xl">
                        Total Recognition. Zero Friction.
                    </h1>
                    <p class="mt-7 max-w-lg text-lg leading-8 text-zinc-300">
                        A private operating layer for premium brands: instant VIP recognition, verified requests, predictive retention, and physical access assets.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#plans" class="bg-amber-300 px-5 py-3 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Request Executive Walkthrough</a>
                        <a href="{{ route('cards.index') }}" class="border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50">View Card Specifications</a>
                    </div>
                    <div class="mt-8 grid max-w-xl gap-3 text-xs uppercase tracking-[0.2em] text-zinc-400 sm:grid-cols-3">
                        <span class="border border-white/10 bg-white/[0.04] px-3 py-3">Demo route live</span>
                        <span class="border border-white/10 bg-white/[0.04] px-3 py-3">Signed access built</span>
                        <span class="border border-white/10 bg-white/[0.04] px-3 py-3">OTP gate wired</span>
                    </div>
                </div>

                <div class="relative">
                    <div class="border border-white/10 bg-white/[0.06] p-4 shadow-2xl shadow-black/30 backdrop-blur">
                        <div class="overflow-hidden border border-white/10 bg-zinc-950">
                            <div class="flex items-center justify-between border-b border-white/10 px-5 py-4">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.28em] text-amber-200">Today</p>
                                    <h2 class="mt-1 text-xl font-light">Recognition Console</h2>
                                </div>
                                <span class="bg-emerald-300 px-3 py-1 text-xs font-semibold text-emerald-950">Live</span>
                            </div>

                            <div class="grid gap-px bg-white/10 sm:grid-cols-3">
                                <div class="bg-zinc-950 p-5">
                                    <p class="text-3xl font-light">128</p>
                                    <p class="mt-2 text-xs uppercase tracking-[0.22em] text-zinc-400">VIP clients</p>
                                </div>
                                <div class="bg-zinc-950 p-5">
                                    <p class="text-3xl font-light">24</p>
                                    <p class="mt-2 text-xs uppercase tracking-[0.22em] text-zinc-400">Brand notes</p>
                                </div>
                                <div class="bg-zinc-950 p-5">
                                    <p class="text-3xl font-light">9</p>
                                    <p class="mt-2 text-xs uppercase tracking-[0.22em] text-zinc-400">Priority edits</p>
                                </div>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                                    <div>
                                        <p class="text-sm font-medium text-white">Amina R.</p>
                                        <p class="mt-1 text-sm text-zinc-400">1M+ Spend Verified · OTP clear</p>
                                    </div>
                                    <span class="text-xs uppercase tracking-[0.18em] text-amber-200">Black Tier</span>
                                </div>
                                <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                                    <div>
                                        <p class="text-sm font-medium text-white">Cedric M.</p>
                                        <p class="mt-1 text-sm text-zinc-400">Velocity drop · Pulse alert</p>
                                    </div>
                                    <span class="text-xs uppercase tracking-[0.18em] text-teal-200">At Risk</span>
                                </div>
                                <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                                    <div>
                                        <p class="text-sm font-medium text-white">Nadia K.</p>
                                        <p class="mt-1 text-sm text-zinc-400">Card scan · Private profile opened</p>
                                    </div>
                                    <span class="text-xs uppercase tracking-[0.18em] text-zinc-300">Vanta ID Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-12">
            <div class="mx-auto grid max-w-6xl gap-px overflow-hidden border border-white/10 bg-white/10 md:grid-cols-4">
                <div class="bg-zinc-950 p-5">
                    <p class="text-xs uppercase tracking-[0.24em] text-amber-200">01</p>
                    <p class="mt-3 text-lg font-light text-white">VIP profile</p>
                    <div class="mt-5 h-2 w-3/4 bg-white/10"></div>
                    <div class="mt-2 h-2 w-1/2 bg-amber-200/40"></div>
                </div>
                <div class="bg-zinc-950 p-5">
                    <p class="text-xs uppercase tracking-[0.24em] text-amber-200">02</p>
                    <p class="mt-3 text-lg font-light text-white">Magic link</p>
                    <div class="mt-5 grid grid-cols-3 gap-2">
                        <span class="h-8 border border-white/10 bg-white/[0.04]"></span>
                        <span class="h-8 border border-amber-200/40 bg-amber-200/10"></span>
                        <span class="h-8 border border-white/10 bg-white/[0.04]"></span>
                    </div>
                </div>
                <div class="bg-zinc-950 p-5">
                    <p class="text-xs uppercase tracking-[0.24em] text-amber-200">03</p>
                    <p class="mt-3 text-lg font-light text-white">OTP request</p>
                    <div class="mt-5 flex gap-2">
                        <span class="size-9 border border-emerald-300/40 bg-emerald-300/10"></span>
                        <span class="size-9 border border-emerald-300/40 bg-emerald-300/10"></span>
                        <span class="size-9 border border-emerald-300/40 bg-emerald-300/10"></span>
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
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-16">
            <div class="mx-auto max-w-6xl">
                <div class="grid gap-5 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Operational proof</p>
                        <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Built surfaces a buyer can inspect.</h2>
                    </div>
                    <p class="max-w-2xl text-base leading-8 text-zinc-300">
                        Vanta is structured as a working command system: public brand pages, private signed VIP links, email OTP verification, dynamic request forms, card ordering, and release-managed deployment.
                    </p>
                </div>

                <div class="mt-10 grid gap-px overflow-hidden border border-white/10 bg-white/10 lg:grid-cols-4">
                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Surface</p>
                            <span class="bg-emerald-300 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-emerald-950">Live</span>
                        </div>
                        <h3 class="mt-5 text-xl font-light text-white">Public profile</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Brand slugs resolve as public recognition pages with tier-aware APHEZIS branding.</p>
                        <a href="{{ route('vip.profile.demo') }}" class="mt-5 inline-flex text-sm font-semibold text-amber-200 hover:text-amber-100">Open demo</a>
                    </article>

                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Security</p>
                            <span class="border border-amber-200/40 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-amber-200">Verified</span>
                        </div>
                        <h3 class="mt-5 text-xl font-light text-white">Magic link + OTP</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">VIPs enter through temporary signed URLs and confirm high-value requests with a 6-digit email code.</p>
                    </article>

                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Operations</p>
                            <span class="border border-white/15 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-zinc-300">Admin</span>
                        </div>
                        <h3 class="mt-5 text-xl font-light text-white">Brand-scoped console</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Brand managers see their own VIPs, requests, capacity, card inventory, and public page controls.</p>
                    </article>

                    <article class="bg-zinc-950 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.24em] text-zinc-500">Release</p>
                            <span class="border border-teal-200/40 px-2 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-teal-200">CI/CD</span>
                        </div>
                        <h3 class="mt-5 text-xl font-light text-white">Deployable platform</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Development runs on dev branch; production releases are promoted through master and version tags.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20">
            <div class="mx-auto max-w-6xl">
                <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">The Vanta Protocol</p>
                <div class="mt-4 grid gap-5 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">
                    <h2 class="text-4xl font-light leading-tight text-white sm:text-5xl">Recognition mapped to the staff workflow.</h2>
                    <p class="max-w-2xl text-base leading-8 text-zinc-300">
                        Vanta turns a private card or magic link into a clear operating sequence for front-of-house teams, managers, and concierge follow-up.
                    </p>
                </div>

                <div class="mt-10 grid gap-px overflow-hidden border border-white/10 bg-white/10 md:grid-cols-4">
                    <article class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">Step 01</p>
                        <h3 class="mt-4 text-xl font-light text-white">Identification</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Issue encrypted 304-grade steel cards to your top 1%.</p>
                    </article>
                    <article class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">Step 02</p>
                        <h3 class="mt-4 text-xl font-light text-white">Recognition</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Staff identifies the guest instantly in the Vanta Console, no questions asked.</p>
                    </article>
                    <article class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">Step 03</p>
                        <h3 class="mt-4 text-xl font-light text-white">Intelligence</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Vanta Pulse tracks visit velocity and flags the moment a regular pattern drops.</p>
                    </article>
                    <article class="bg-zinc-950 p-5">
                        <p class="text-xs uppercase tracking-[0.24em] text-amber-200">Step 04</p>
                        <h3 class="mt-4 text-xl font-light text-white">Retention</h3>
                        <p class="mt-3 text-sm leading-6 text-zinc-400">Use the SMS Gateway or Priority Concierge to bring them back before the relationship fades.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="plans" class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20">
            <div class="mx-auto max-w-6xl">
                <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">SLA and security subscription</p>
                <div class="mt-4 grid gap-5 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <h2 class="text-4xl font-light leading-tight text-white sm:text-5xl">Pick the operating capacity.</h2>
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
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Intentionally capped for early-adopting boutique venues in Kigali.</p>
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
                        <p class="mt-2 text-sm leading-6 text-zinc-300">For established establishments integrating automated retention infrastructure.</p>
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
                        <p class="mt-2 text-sm leading-6 text-zinc-400">Reserved for multi-location hospitality groups and sovereign institutions.</p>
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

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20">
            <div class="mx-auto grid max-w-6xl gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Vanta Pulse</p>
                    <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Predictive retention, not dead data.</h2>
                    <p class="mt-5 max-w-xl text-base leading-8 text-zinc-300">
                        Vanta tracks VIP access velocity from magic links and card scans. When a high-value client drops below their normal rhythm, the Pulse brief flags the risk before the relationship fades.
                    </p>
                    <div class="mt-7 border border-amber-200/20 bg-amber-300/[0.07] p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Scenario</p>
                        <p class="mt-3 text-sm leading-7 text-zinc-300">
                            Boutique hotel: VIP guest has not booked in 21 days. Action: automated Pulse Alert triggered for the General Manager.
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

        <section id="hardware" class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20">
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
                        <div class="aspect-[1.58/1] border border-white/10 bg-[linear-gradient(135deg,#4a320e,#d6a647_46%,#120d05)]"></div>
                        <div class="aspect-[1.58/1] border border-white/10 bg-[linear-gradient(135deg,#111827,#52525b_48%,#09090b)]"></div>
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
