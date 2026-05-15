<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $isWhiteLabel = ! ($brand->branding_visible ?? true) || in_array($brand->subscription_tier ?? 'tier_1', ['tier_2', 'tier_3'], true);
        $brandAccessTitle = "{$brand->name} Private Access";
        $pageTitle = $isWhiteLabel ? $brandAccessTitle : "{$brand->name} | Vanta";
        $pageDescription = $brand->description ?: "Private VIP recognition and request access for {$brand->name} clients.";
        $shareImage = filled($brand->logo_path) ? asset('storage/' . $brand->logo_path) : null;
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $isWhiteLabel ? $brand->name : 'Vanta' }}">
    <meta name="twitter:card" content="{{ $shareImage ? 'summary_large_image' : 'summary' }}">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    @if($shareImage)
        <meta property="og:image" content="{{ $shareImage }}">
        <meta property="og:image:alt" content="{{ $brand->name }} private access">
        <meta name="twitter:image" content="{{ $shareImage }}">
    @endif
    @if ($isWhiteLabel && $brand->logo_path)
        <link rel="icon" href="{{ $shareImage }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 antialiased">
    <main class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-[radial-gradient(circle_at_18%_18%,rgba(245,158,11,0.18),transparent_30%),radial-gradient(circle_at_82%_20%,rgba(20,184,166,0.14),transparent_26%),linear-gradient(135deg,#09090b_0%,#18181b_54%,#27272a_100%)]"></div>
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-amber-200/50 to-transparent"></div>
        </div>

        <section class="relative mx-auto flex min-h-screen w-full max-w-6xl flex-col px-5 py-6 sm:px-8 lg:px-10">
            <header class="flex items-center justify-between gap-5">
                <a href="{{ route('landing') }}" class="flex items-center gap-3" aria-label="Vanta Platform home">
                    @if (! ($brand->branding_visible ?? true) && $brand->logo_path)
                        <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }} logo" class="h-10 w-10 object-contain">
                    @else
                        <span class="grid h-10 w-10 place-items-center border border-amber-200/50 bg-amber-300 text-sm font-black text-zinc-950">V</span>
                    @endif
                    <span class="text-sm font-semibold tracking-wide">{{ $brand->name }}</span>
                </a>

                @include('partials.powered-by', ['brand' => $brand])
            </header>

            <div class="grid flex-1 items-center gap-10 py-12 lg:grid-cols-[1.05fr_0.95fr]">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.28em] text-amber-200">{{ str($brand->category ?: 'Private clienteling')->replace('_', ' ')->title() }}</p>
                    <h1 class="mt-5 max-w-3xl text-4xl font-light leading-tight text-white sm:text-6xl">
                        Private access for {{ $brand->name }} clients.
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-zinc-300">
                        {{ $brand->description ?: 'A controlled public surface for VIP recognition, curated requests, and high-touch client follow-up.' }}
                    </p>

                    <div class="mt-8 grid gap-3 sm:grid-cols-3">
                        <div class="border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-2xl font-light text-white">{{ $brand->vipClients()->where('is_active', true)->count() }}</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.18em] text-zinc-500">VIP profiles</p>
                        </div>
                        <div class="border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-2xl font-light text-white">{{ count($formSchema) }}</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.18em] text-zinc-500">Request fields</p>
                        </div>
                        <div class="border border-white/10 bg-white/[0.04] p-4">
                            <p class="text-2xl font-light text-white">{{ $brand->is_active ? 'Live' : 'Paused' }}</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.18em] text-zinc-500">Public status</p>
                        </div>
                    </div>
                </div>

                <div class="border border-white/10 bg-zinc-950/65 p-5 shadow-2xl shadow-black/40 backdrop-blur">
                    <div class="flex items-start justify-between gap-4 border-b border-white/10 pb-5">
                        <div>
                            <p class="text-sm font-semibold text-white">Client request preview</p>
                            <p class="mt-1 text-sm text-zinc-500">Fields configured from the brand dashboard.</p>
                        </div>
                        <span class="border border-amber-200/30 bg-amber-300/10 px-3 py-1 text-xs font-semibold text-amber-100">Public</span>
                    </div>

                    <div class="mt-5 grid gap-3">
                        @foreach ($formSchema as $field)
                            <div class="border border-white/10 bg-white/[0.03] p-4">
                                <div class="flex items-center justify-between gap-4">
                                    <p class="text-sm font-medium text-zinc-100">{{ $field['label'] ?? 'Request field' }}</p>
                                    <span class="text-xs text-zinc-500">{{ str($field['type'] ?? 'text')->title() }}</span>
                                </div>
                                <p class="mt-2 text-xs text-zinc-500">{{ ($field['is_required'] ?? false) ? 'Required' : 'Optional' }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 border-t border-white/10 pt-5">
                        <p class="text-xs font-bold uppercase tracking-[0.24em] text-zinc-500">Recent public profiles</p>
                        <div class="mt-4 grid gap-3">
                            @forelse ($vipClients as $vipClient)
                                <div class="flex items-center justify-between gap-4 border border-white/10 bg-white/[0.03] px-4 py-3">
                                    <div>
                                        <p class="text-sm font-medium text-white">{{ $vipClient->full_name }}</p>
                                        <p class="text-xs text-zinc-500">{{ $vipClient->membership_code ?: $vipClient->slug }}</p>
                                    </div>
                                    <span class="text-xs text-emerald-300">Active</span>
                                </div>
                            @empty
                                <p class="border border-dashed border-white/15 p-4 text-sm text-zinc-500">No public VIP profiles are active yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
