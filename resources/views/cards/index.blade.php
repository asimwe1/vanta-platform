<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanta Cards · APHEZIS</title>
    @vite(['resources/css/app.css'])
    <style>
        .vanta-card-preview,
        .vanta-card-swatch {
            background: linear-gradient(135deg, #050505, #242426 54%, #09090b);
        }

        .vanta-card-preview[data-design="matte_black"] {
            background: #050505;
        }

        .vanta-card-preview[data-design="brushed_gold"],
        .vanta-card-swatch[data-design="brushed_gold"] {
            background: linear-gradient(135deg, #4a320e, #d6a647 46%, #120d05);
        }

        .vanta-card-preview[data-design="graphite_steel"],
        .vanta-card-swatch[data-design="graphite_steel"] {
            background: linear-gradient(135deg, #111827, #52525b 48%, #09090b);
        }

        .vanta-card-preview[data-design="custom"],
        .vanta-card-swatch[data-design="custom"] {
            background:
                radial-gradient(circle at 24% 18%, rgba(245, 158, 11, 0.3), transparent 30%),
                linear-gradient(135deg, #030712, #164e63 48%, #09090b);
        }

        .vanta-design-option.is-selected {
            border-color: rgba(252, 211, 77, 0.7);
            background: rgba(252, 211, 77, 0.08);
        }
    </style>
</head>
<body class="bg-zinc-950 text-white antialiased">
    <main class="min-h-screen overflow-hidden">
        <section class="relative border-b border-white/10">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_14%_18%,rgba(245,158,11,0.2),transparent_31%),radial-gradient(circle_at_82%_12%,rgba(20,184,166,0.13),transparent_28%),linear-gradient(135deg,#09090b_0%,#18181b_54%,#27272a_100%)]"></div>
            <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-zinc-950 to-transparent"></div>

            <header class="relative z-10 mx-auto flex max-w-7xl items-center justify-between px-6 py-6">
                <a href="{{ route('landing') }}" class="flex items-center gap-3" aria-label="Vanta Platform home">
                    <span class="grid size-9 place-items-center border border-amber-300/60 bg-amber-300 text-sm font-semibold text-zinc-950">V</span>
                    <span class="text-sm font-medium uppercase tracking-[0.28em] text-zinc-200">Vanta</span>
                </a>
                <nav class="flex items-center gap-3">
                    <a href="{{ route('landing') }}#plans" class="hidden text-sm text-zinc-300 transition hover:text-white sm:inline">Plans</a>
                    <a href="#request" class="border border-white/20 px-4 py-2 text-sm font-medium text-white transition hover:border-amber-300 hover:text-amber-200">Request cards</a>
                </nav>
            </header>

            <div class="relative z-10 mx-auto grid min-h-[calc(100vh-88px)] max-w-7xl gap-10 px-6 pb-16 pt-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.36em] text-amber-200">Card design studio</p>
                    <h1 class="mt-5 max-w-3xl text-5xl font-light leading-[1.02] text-white sm:text-6xl lg:text-7xl">
                        Explore the physical layer of Vanta access.
                    </h1>
                    <p class="mt-7 max-w-2xl text-base leading-8 text-zinc-300 sm:text-lg">
                        Review standard APHEZIS metal card finishes, select a production path, and submit a replenishment order or design inquiry for your company.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="#designs" class="bg-amber-300 px-5 py-3 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">Explore designs</a>
                        <a href="#request" class="border border-white/20 px-5 py-3 text-center text-sm font-semibold text-white transition hover:border-white/50">Send inquiry</a>
                    </div>
                </div>

                <div class="border border-white/10 bg-white/[0.05] p-4 shadow-2xl shadow-black/30 backdrop-blur">
                    <div class="relative overflow-hidden border border-white/10 bg-zinc-950 p-5 sm:p-7">
                        <div class="absolute inset-x-0 top-0 h-px bg-amber-200/60"></div>
                        <div id="cardPreview" data-design="matte_black" class="vanta-card-preview relative mx-auto aspect-[1.58/1] max-w-xl overflow-hidden border border-amber-200/40 shadow-2xl shadow-black/40">
                            <img
                                id="previewReferenceImage"
                                src="{{ asset('images/vanta-black-card-spec.png') }}"
                                alt="Vanta Black metal card specifications"
                                class="h-full w-full object-cover"
                            >
                            <div id="previewGeneratedCard" class="hidden h-full flex-col justify-between p-6">
                                <div class="flex items-start justify-between">
                                    <span class="text-xs font-semibold uppercase tracking-[0.28em] text-amber-100">APHEZIS</span>
                                    <span class="grid size-10 place-items-center border border-amber-100/50 text-[10px] uppercase tracking-[0.18em] text-amber-100">NFC</span>
                                </div>
                                <div>
                                    <p id="previewName" class="text-2xl font-light uppercase tracking-[0.18em] text-white sm:text-3xl">{{ $designs['matte_black']['name'] }}</p>
                                    <p id="previewFinish" class="mt-2 text-xs uppercase tracking-[0.24em] text-zinc-300">{{ $designs['matte_black']['finish'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-4 sm:grid-cols-3">
                            <div class="border border-white/10 bg-white/[0.04] p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Price</p>
                                <p id="previewPrice" class="mt-2 text-lg font-light text-white">{{ $designs['matte_black']['price'] }}</p>
                            </div>
                            <div class="border border-white/10 bg-white/[0.04] p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Quantity</p>
                                <p id="previewQuantity" class="mt-2 text-lg font-light text-white">20 cards</p>
                            </div>
                            <div class="border border-white/10 bg-white/[0.04] p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-zinc-500">Estimate</p>
                                <p id="previewEstimate" class="mt-2 text-lg font-light text-white">$300</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="designs" class="border-b border-white/10 bg-zinc-950 px-6 py-16">
            <div class="mx-auto max-w-7xl">
                <div class="grid gap-5 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Available finishes</p>
                        <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Choose a standard card or request a custom production pass.</h2>
                    </div>
                    <p class="text-base leading-8 text-zinc-300">
                        Standard designs use fixed pricing. Custom cards are reviewed manually for artwork, finishing, deadline, and production complexity.
                    </p>
                </div>

                <div class="mt-10 grid gap-4 lg:grid-cols-4">
                    @foreach ($designs as $key => $design)
                        <button
                            type="button"
                            data-card-option="{{ $key }}"
                            class="vanta-design-option group border border-white/10 bg-white/[0.04] p-5 text-left transition hover:border-white/25 {{ $key === 'matte_black' ? 'is-selected' : '' }}"
                        >
                            @if ($key === 'matte_black')
                                <img
                                    src="{{ asset('images/vanta-black-card-spec.png') }}"
                                    alt="Vanta Black card specifications"
                                    class="block aspect-[1.58/1] w-full border border-white/10 object-cover"
                                    loading="lazy"
                                >
                            @else
                                <span data-design="{{ $key }}" class="vanta-card-swatch block aspect-[1.58/1] border border-white/10"></span>
                            @endif
                            <span class="mt-5 block text-lg font-light text-white">{{ $design['name'] }}</span>
                            <span class="mt-2 block text-sm leading-6 text-zinc-400">{{ $design['description'] }}</span>
                            <span class="mt-4 block text-sm font-semibold text-amber-200">{{ $design['price'] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="request" class="bg-zinc-950 px-6 py-16">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.34em] text-amber-200">Order or inquire</p>
                    <h2 class="mt-4 text-4xl font-light leading-tight text-white sm:text-5xl">Send the card request to APHEZIS.</h2>
                    <p class="mt-5 text-base leading-8 text-zinc-300">
                        Use this for a first production run, a replenishment order, or a custom quote. APHEZIS confirms artwork, quantities, delivery timing, and final pricing before production.
                    </p>

                    <div id="designFeatures" class="mt-8 grid gap-3 text-sm text-zinc-400">
                        @foreach ($designs['matte_black']['features'] as $feature)
                            <p class="border border-white/10 bg-white/[0.04] px-4 py-3"><span class="text-zinc-100">{{ $feature }}</span></p>
                        @endforeach
                    </div>
                </div>

                <div class="border border-white/10 bg-white/[0.05] p-5 sm:p-6">
                    @if (session('card_inquiry_status'))
                        <div class="mb-5 border border-emerald-300/30 bg-emerald-300/[0.08] px-4 py-3 text-sm leading-6 text-emerald-100">
                            {{ session('card_inquiry_status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('cards.inquiry.store') }}" class="grid gap-4">
                        @csrf
                        <input id="designTypeInput" type="hidden" name="design_type" value="{{ old('design_type', 'matte_black') }}">

                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Company</span>
                                <input name="company_name" value="{{ old('company_name') }}" required class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-300" placeholder="Company name">
                                @error('company_name') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                            </label>
                            <label class="block">
                                <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Contact</span>
                                <input name="contact_name" value="{{ old('contact_name') }}" required class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-300" placeholder="Full name">
                                @error('contact_name') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                            </label>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Email</span>
                                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-300" placeholder="name@company.com">
                                @error('email') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                            </label>
                            <label class="block">
                                <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Phone</span>
                                <input name="phone" value="{{ old('phone') }}" class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-300" placeholder="+250 ...">
                                @error('phone') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                            </label>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Quantity</span>
                                <input id="quantityInput" type="number" name="quantity" min="10" max="5000" step="5" value="{{ old('quantity', 20) }}" required class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition focus:border-amber-300">
                                @error('quantity') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                            </label>
                            <label class="block">
                                <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Request type</span>
                                <select name="intent" class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition focus:border-amber-300">
                                    <option value="order" @selected(old('intent', 'order') === 'order')>Order cards</option>
                                    <option value="inquiry" @selected(old('intent') === 'inquiry')>Send inquiry</option>
                                </select>
                                @error('intent') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                            </label>
                        </div>

                        <label class="block">
                            <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">Notes</span>
                            <textarea name="notes" rows="5" class="w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm leading-6 text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-300" placeholder="Design notes, deadline, delivery location, logo requirements, or replenishment context.">{{ old('notes') }}</textarea>
                            @error('notes') <span class="mt-2 block text-sm text-red-300">{{ $message }}</span> @enderror
                        </label>

                        <button type="submit" class="bg-amber-300 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-amber-200">
                            Submit request
                        </button>
                    </form>
                </div>
            </div>

            <div class="mx-auto mt-12 flex max-w-7xl justify-end">
                @include('partials.powered-by')
            </div>
        </section>
    </main>

    <script>
        const cardDesigns = @json($designs);
        const preview = document.getElementById('cardPreview');
        const previewReferenceImage = document.getElementById('previewReferenceImage');
        const previewGeneratedCard = document.getElementById('previewGeneratedCard');
        const previewName = document.getElementById('previewName');
        const previewFinish = document.getElementById('previewFinish');
        const previewPrice = document.getElementById('previewPrice');
        const previewQuantity = document.getElementById('previewQuantity');
        const previewEstimate = document.getElementById('previewEstimate');
        const designTypeInput = document.getElementById('designTypeInput');
        const quantityInput = document.getElementById('quantityInput');
        const designFeatures = document.getElementById('designFeatures');
        let selectedDesign = designTypeInput.value || 'matte_black';

        function formatEstimate() {
            if (selectedDesign === 'custom') {
                return 'Quoted after review';
            }

            return '$' + (Number(quantityInput.value || 0) * 15).toLocaleString();
        }

        function renderFeatures(features) {
            designFeatures.replaceChildren();

            features.forEach((feature) => {
                const item = document.createElement('p');
                const label = document.createElement('span');

                item.className = 'border border-white/10 bg-white/[0.04] px-4 py-3';
                label.className = 'text-zinc-100';
                label.textContent = feature;
                item.append(label);
                designFeatures.append(item);
            });
        }

        function selectDesign(designKey) {
            const design = cardDesigns[designKey] || cardDesigns.matte_black;
            selectedDesign = designKey;
            designTypeInput.value = designKey;
            preview.dataset.design = designKey;
            previewReferenceImage.classList.toggle('hidden', designKey !== 'matte_black');
            previewGeneratedCard.classList.toggle('hidden', designKey === 'matte_black');
            previewGeneratedCard.classList.toggle('flex', designKey !== 'matte_black');
            previewName.textContent = design.name;
            previewFinish.textContent = design.finish;
            previewPrice.textContent = design.price;
            previewQuantity.textContent = `${quantityInput.value || 0} cards`;
            previewEstimate.textContent = formatEstimate();
            renderFeatures(design.features);

            document.querySelectorAll('[data-card-option]').forEach((button) => {
                button.classList.toggle('is-selected', button.dataset.cardOption === designKey);
            });
        }

        document.querySelectorAll('[data-card-option]').forEach((button) => {
            button.addEventListener('click', () => selectDesign(button.dataset.cardOption));
        });

        quantityInput.addEventListener('input', () => {
            previewQuantity.textContent = `${quantityInput.value || 0} cards`;
            previewEstimate.textContent = formatEstimate();
        });

        selectDesign(selectedDesign);
    </script>
</body>
</html>
