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
                    <a href="{{ route('cards.index') }}" class="border border-white/20 px-4 py-2 text-sm font-medium text-white transition hover:border-amber-300 hover:text-amber-200">Card designs</a>
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
                        <a href="#plans" class="bg-amber-300 px-5 py-3 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Explore plans</a>
                        <a href="{{ route('cards.index') }}" class="border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50">Explore card designs</a>
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
                    <div class="mt-5 aspect-[1.58/1] border border-amber-200/30 bg-[linear-gradient(135deg,#050505,#262626_45%,#0b0b0b)]"></div>
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
                        <div class="flex items-center justify-between">
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Tier I</p>
                            <span class="border border-white/10 px-2 py-1 text-xs text-zinc-400">20 VIPs</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-light text-white">Vanta One</h3>
                        <p class="mt-2 text-sm text-zinc-400">Boutique elite infrastructure</p>
                        <div class="mt-6 space-y-3 text-sm text-zinc-300">
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">20 VIP Slots</p>
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">Email OTP and magic links</p>
                            <p class="border border-white/10 bg-white/[0.04] px-3 py-2">Monthly Pulse Brief</p>
                        </div>
                        <p class="mt-5 text-xs uppercase tracking-[0.22em] text-zinc-500">Powered by ApheZis visible</p>
                        <p class="mt-6 text-3xl font-light text-white">$50<span class="text-sm text-zinc-500"> / month guide</span></p>
                    </article>
                    <article class="border border-amber-300/40 bg-amber-300/[0.08] p-6 shadow-2xl shadow-amber-950/20">
                        <div class="flex items-center justify-between">
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Tier II</p>
                            <span class="border border-amber-200/30 px-2 py-1 text-xs text-amber-100">125 VIPs</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-light text-white">Vanta Luxe</h3>
                        <p class="mt-2 text-sm text-zinc-300">Private-label business intelligence</p>
                        <div class="mt-6 space-y-3 text-sm text-zinc-100">
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">Full White-Labeling</p>
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">Live Vanta View Dashboard</p>
                            <p class="border border-amber-200/20 bg-amber-200/10 px-3 py-2">Churn-risk and velocity alerts</p>
                        </div>
                        <p class="mt-6 text-3xl font-light text-white">$200<span class="text-sm text-zinc-500"> / month guide</span></p>
                    </article>
                    <article class="border border-white/10 bg-white/[0.04] p-6">
                        <div class="flex items-center justify-between">
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Tier III</p>
                            <span class="border border-white/10 px-2 py-1 text-xs text-zinc-400">500 base</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-light text-white">Vanta Noir</h3>
                        <p class="mt-2 text-sm text-zinc-400">Sovereign enterprise layer</p>
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
                    <a href="{{ route('cards.index') }}" class="mt-7 inline-flex bg-amber-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Explore card designs</a>
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
                    <div class="relative aspect-[1.58/1] overflow-hidden border border-amber-200/30 bg-[linear-gradient(135deg,#060606,#262626_45%,#0b0b0b)] p-6 shadow-2xl shadow-black/40">
                        <div class="absolute inset-x-0 top-0 h-px bg-amber-200/60"></div>
                        <div class="flex h-full flex-col justify-between">
                            <div class="flex items-start justify-between">
                                <span class="text-xs uppercase tracking-[0.28em] text-amber-200">APHEZIS</span>
                                <span class="size-9 border border-amber-200/50"></span>
                            </div>
                            <div>
                                <p class="text-2xl font-light tracking-[0.18em] text-white">VANTA BLACK</p>
                                <p class="mt-2 text-xs uppercase tracking-[0.24em] text-zinc-400">NFC enabled · 304 steel · private access</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="aspect-[1.58/1] border border-white/10 bg-[linear-gradient(135deg,#050505,#242426_54%,#09090b)]"></div>
                        <div class="aspect-[1.58/1] border border-white/10 bg-[linear-gradient(135deg,#4a320e,#d6a647_46%,#120d05)]"></div>
                        <div class="aspect-[1.58/1] border border-white/10 bg-[linear-gradient(135deg,#111827,#52525b_48%,#09090b)]"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-10">
            <div class="mx-auto grid max-w-6xl gap-px overflow-hidden border border-white/10 bg-white/10 text-sm md:grid-cols-3">
                <div class="bg-zinc-950 p-5"><span class="text-zinc-100">Sector</span><br><span class="text-zinc-500">Boutique Lounges (Kigali)</span></div>
                <div class="bg-zinc-950 p-5"><span class="text-zinc-100">Sector</span><br><span class="text-zinc-500">Private Hospitality (Kigali)</span></div>
                <div class="bg-zinc-950 p-5"><span class="text-zinc-100">Sector</span><br><span class="text-zinc-500">Premium Retail (Kigali)</span></div>
            </div>
            <div class="mx-auto mt-8 flex max-w-6xl justify-end">
                @include('partials.powered-by')
            </div>
        </section>
    </main>
</body>
</html>
