<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanta · Page not found</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-zinc-950 text-white antialiased">
    <main class="relative grid min-h-screen overflow-hidden px-6 py-10">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-[radial-gradient(circle_at_14%_18%,rgba(245,158,11,0.18),transparent_30%),radial-gradient(circle_at_82%_20%,rgba(20,184,166,0.13),transparent_27%),linear-gradient(135deg,#09090b_0%,#18181b_54%,#27272a_100%)]"></div>
            <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-zinc-950 to-transparent"></div>
        </div>

        <section class="relative z-10 mx-auto grid w-full max-w-6xl items-center gap-10 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-3" aria-label="Vanta Platform home">
                    <span class="grid size-10 place-items-center border border-amber-300/60 bg-amber-300 text-sm font-semibold text-zinc-950">V</span>
                    <span class="text-sm font-medium uppercase tracking-[0.28em] text-zinc-200">Vanta</span>
                </a>

                <p class="mt-16 text-xs font-semibold uppercase tracking-[0.36em] text-amber-200">Signal lost · 404</p>
                <h1 class="mt-5 max-w-3xl text-5xl font-light leading-[1.02] tracking-tight text-white sm:text-6xl lg:text-7xl">
                    This private route is not available.
                </h1>
                <p class="mt-7 max-w-xl text-lg leading-8 text-zinc-300">
                    The page may have moved, expired, or requires a fresh signed access link from the brand concierge team.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('landing') }}" class="bg-amber-300 px-5 py-3 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Return to overview</a>
                    <a href="{{ route('landing') }}#plans" class="border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50">Explore plans</a>
                </div>
            </div>

            <div class="border border-white/10 bg-white/[0.05] p-6 shadow-2xl shadow-black/30 backdrop-blur">
                <div class="border border-white/10 bg-zinc-950 p-6">
                    <div class="flex items-center justify-between border-b border-white/10 pb-5">
                        <div>
                            <p class="text-xs uppercase tracking-[0.28em] text-amber-200">Access check</p>
                            <h2 class="mt-1 text-xl font-light">Vanta Command Center</h2>
                        </div>
                        <span class="border border-amber-200/40 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-amber-200">404</span>
                    </div>

                    <div class="mt-6 grid gap-3">
                        <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-sm text-zinc-300">Signed VIP link</p>
                            <p class="text-sm font-medium text-zinc-500">Expired</p>
                        </div>
                        <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-sm text-zinc-300">Public route</p>
                            <p class="text-sm font-medium text-amber-200">Unavailable</p>
                        </div>
                        <div class="grid grid-cols-[1fr_auto] gap-4 border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-sm text-zinc-300">Recommended next step</p>
                            <p class="text-sm font-medium text-teal-200">Request access</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
