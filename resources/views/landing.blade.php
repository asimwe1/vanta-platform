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
                        VIP operations for brands that move personally.
                    </h1>
                    <p class="mt-7 max-w-xl text-lg leading-8 text-zinc-300">
                        Manage private client records, signed VIP access, email OTP confirmations, and metal card procurement from one managed APHEZIS infrastructure.
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
                                    <h2 class="mt-1 text-xl font-light">Concierge Pipeline</h2>
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
                                        <p class="mt-1 text-sm text-zinc-400">New arrival preview and fitting notes ready.</p>
                                    </div>
                                    <span class="text-xs uppercase tracking-[0.18em] text-amber-200">Gold</span>
                                </div>
                                <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                                    <div>
                                        <p class="text-sm font-medium text-white">Cedric M.</p>
                                        <p class="mt-1 text-sm text-zinc-400">Membership profile updated for Kigali visit.</p>
                                    </div>
                                    <span class="text-xs uppercase tracking-[0.18em] text-teal-200">Platinum</span>
                                </div>
                                <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                                    <div>
                                        <p class="text-sm font-medium text-white">Nadia K.</p>
                                        <p class="mt-1 text-sm text-zinc-400">Concierge team assigned a private follow-up.</p>
                                    </div>
                                    <span class="text-xs uppercase tracking-[0.18em] text-zinc-300">Black</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="plans" class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20">
            <div class="mx-auto max-w-6xl">
                <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">SLA and security subscription</p>
                <div class="mt-4 grid gap-5 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <h2 class="text-4xl font-light leading-tight text-white sm:text-5xl">Predictable retainers for high-value client infrastructure.</h2>
                    <p class="text-base leading-8 text-zinc-300">
                        APHEZIS Vanta is priced like an operational utility: hosting, security, OTP, updates, VIP capacity, and quarterly insight support under one manual SLA.
                    </p>
                </div>

                <div class="mt-10 grid gap-4 lg:grid-cols-3">
                    <article class="border border-white/10 bg-white/[0.04] p-6">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Tier I</p>
                        <h3 class="mt-4 text-2xl font-light text-white">Entry Concierge</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-400">Up to 50 VIP profiles, email OTP, standard schema, and 30-day data logs.</p>
                        <p class="mt-6 text-3xl font-light text-white">$100<span class="text-sm text-zinc-500"> / month guide</span></p>
                    </article>
                    <article class="border border-amber-300/40 bg-amber-300/[0.08] p-6 shadow-2xl shadow-amber-950/20">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Tier II</p>
                        <h3 class="mt-4 text-2xl font-light text-white">Elite Management</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-300">Up to 250 VIP profiles, dynamic presets, Vanta View analytics, and 1-year data logs.</p>
                        <p class="mt-6 text-3xl font-light text-white">$300<span class="text-sm text-zinc-500"> / month guide</span></p>
                    </article>
                    <article class="border border-white/10 bg-white/[0.04] p-6">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">Tier III</p>
                        <h3 class="mt-4 text-2xl font-light text-white">Enterprise</h3>
                        <p class="mt-3 text-sm leading-7 text-zinc-400">Unlimited VIPs, SMS OTP option, API access, priority support, and dedicated reporting.</p>
                        <p class="mt-6 text-3xl font-light text-white">Custom<span class="text-sm text-zinc-500"> / quote</span></p>
                    </article>
                </div>
            </div>
        </section>

        <section id="hardware" class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-20">
            <div class="mx-auto grid max-w-6xl gap-10 lg:grid-cols-[1fr_0.9fr] lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Hardware procurement</p>
                    <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Beyond plastic. A physical signal for private access.</h2>
                    <p class="mt-5 text-base leading-8 text-zinc-300">
                        Brands can order replenishment cards from the command center when stock runs low. Standard finishes use fixed pricing, while custom laser etching, artwork, and special fabrication move through a manual quote.
                    </p>
                    <a href="{{ route('cards.index') }}" class="mt-7 inline-flex bg-amber-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Explore card designs</a>
                    <div class="mt-8 grid gap-4 text-sm text-zinc-400 sm:grid-cols-2">
                        <p><span class="text-zinc-100">Standard designs</span><br>Matte Black, Brushed Gold, and Graphite Steel at a fixed card rate.</p>
                        <p><span class="text-zinc-100">Custom design requests</span><br>Upload artwork, request a finish, and receive a quoted production price.</p>
                    </div>
                </div>

                <div class="border border-white/10 bg-white/[0.05] p-6">
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
                    <p class="mt-5 text-sm leading-7 text-zinc-400">
                        The platform tracks remaining card stock and turns fulfillment into inventory, so procurement stays connected to VIP onboarding.
                    </p>
                </div>
            </div>
        </section>

        <section class="relative z-10 border-t border-white/10 bg-zinc-950 px-6 py-10">
            <div class="mx-auto grid max-w-6xl gap-6 text-sm text-zinc-400 md:grid-cols-3">
                <p><span class="text-zinc-100">Magic-link VIP access</span><br>Signed URLs remove passwords while OTP protects high-value actions.</p>
                <p><span class="text-zinc-100">Vanta View insights</span><br>Activity signals become monthly briefing points for retention and upsell.</p>
                <p><span class="text-zinc-100">Manual billing control</span><br>Capacity, subscription dates, and card stock stay managed without payment gateway friction.</p>
            </div>
            <div class="mx-auto mt-8 flex max-w-6xl justify-end">
                @include('partials.powered-by')
            </div>
        </section>
    </main>
</body>
</html>
