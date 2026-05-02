<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $vipClient->full_name }} · VIP Profile</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-stone-50 text-zinc-900 antialiased">
    <main class="mx-auto min-h-screen max-w-3xl px-6 py-24">
        <div class="border border-amber-200/60 bg-white p-10 shadow-sm">
            <p class="mb-6 text-xs uppercase tracking-[0.35em] text-amber-700">{{ $vipClient->brand->name }}</p>
            <h1 class="text-4xl font-light tracking-tight">{{ $vipClient->full_name }}</h1>
            <p class="mt-2 text-sm text-zinc-500">Member {{ $vipClient->membership_code }}</p>

            @if($vipClient->notes)
                <div class="mt-10 border-t border-zinc-200 pt-8 text-zinc-700 leading-relaxed">
                    {{ $vipClient->notes }}
                </div>
            @endif
        </div>
    </main>
</body>
</html>
