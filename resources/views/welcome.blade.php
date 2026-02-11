<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Price Tracker | Smart Real-time Monitoring</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Manrope"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }

        .custom-shadow {
            box-shadow: 0 10px 40px -10px rgba(19, 127, 236, 0.2);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display transition-colors duration-300">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 w-full border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <div class=" p-1.5 rounded-lg">
                        <!-- <span class="material-icons text-white text-2xl">trending_down</span> -->
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-10 rounded-2xl" >
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white">Albert <span class="text-primary">Construction and Supplies</span></span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('filament.admin.auth.login') }}" class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg text-sm font-semibold transition-all shadow-lg shadow-primary/20">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <main class="min-h-screen">
        <!-- Hero Section -->
        <section class="pt-20 pb-16 px-4">
            <form method="GET" action="{{ route('properties.search-product') }}" class="relative max-w-2xl mx-auto group">
                <div class="absolute -inset-1 bg-linear-to-r from-primary/50 to-blue-600/50 rounded-xl blur opacity-25 group-focus-within:opacity-50 transition duration-1000"></div>

                <div class="relative flex items-center bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-2 custom-shadow">
                    <span class="material-icons text-slate-400 ml-4">search</span>

                    <input 
                        name="query"
                        class="w-full bg-transparent border-none focus:ring-0 text-slate-900 dark:text-white placeholder-slate-500 py-3 px-4"
                        placeholder="Search product name (Cement, Nails, etc.)"
                        type="text"
                    />

                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-lg font-bold transition-all">
                        Search
                    </button>
                </div>
            </form>
        </section>
        <!-- Product Table Section -->
        <section class="max-w-7xl mx-auto px-4 pb-24">
            <div class="mb-8 flex items-end justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Price Tracker Activity</h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Real-time price movements in our store.</p>
                </div>
            </div>
            <div class="overflow-hidden bg-white dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-800 backdrop-blur-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">
                                <th class="px-6 py-4">SKU</th>
                                <th class="px-6 py-4">Barcode</th>
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Description</th>
                                <th class="px-6 py-4">Unit</th>
                                <th class="px-6 py-4">Price</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                            @foreach($products as $product)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <p class="font-bold text-slate-900 dark:text-white">{{ $product->sku }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <p class="font-bold text-slate-900 dark:text-white">{{ $product->barcode }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <p class="font-bold text-slate-900 dark:text-white">{{ $product->name }}</p>
                                                <p class="text-xs text-slate-500 dark:text-slate-500">{{ $product->brand->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-sm font-medium text-slate-600 dark:text-slate-400">{{ $product->description }}</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <p class="font-bold text-slate-900 dark:text-white">{{ $product->unit->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span class="text-lg font-extrabold text-slate-900 dark:text-white"> ₱{{ number_format($product->current_price, 2) }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-white dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                <!-- Contact Numbers -->
                <div class="flex flex-col">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                            <span class="material-icons text-primary">call</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Contact Sales</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex flex-col">
                            <span class="text-xs text-slate-500 uppercase font-bold tracking-wider">CSR</span>
                            <span class="text-base font-semibold text-slate-900 dark:text-slate-300">+639262087005</span>
                        </li>
                        <li class="flex flex-col">
                            <span class="text-xs text-slate-500 uppercase font-bold tracking-wider">CSR 1</span>
                            <span class="text-base font-semibold text-slate-900 dark:text-slate-300">+639071186618</span>
                        </li>
                    </ul>
                </div>
                <!-- Office Address -->
                <div class="flex flex-col">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                            <span class="material-icons text-primary">Address</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Main Store</h3>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">Visit Us</span>
                        <address class="not-italic text-base font-semibold text-slate-900 dark:text-slate-300 leading-relaxed">
                            Pruok Kalubihan,<br />
                            Barangay Bajumpandan,<br />
                            Negros Oriental Philippines
                        </address>
                    </div>
                </div>
                <!-- Email Support -->
                <div class="flex flex-col">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                            <span class="material-icons text-primary">alternate_email</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Email Support</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex flex-col">
                            <span class="text-xs text-slate-500 uppercase font-bold tracking-wider">Technical Help</span>
                            <a class="text-base font-semibold text-slate-900 dark:text-slate-300 hover:text-primary transition-colors" href="">jeromevillaver@gmail.com</a>
                        </li>
                        <li class="flex flex-col">
                            <span class="text-xs text-slate-500 uppercase font-bold tracking-wider">Partnerships</span>
                            <a class="text-base font-semibold text-slate-900 dark:text-slate-300 hover:text-primary transition-colors" href="">Annoying Mice Devs</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center border-t border-slate-200 dark:border-slate-800 pt-8 gap-6">
                <div class="flex items-center gap-2 grayscale opacity-50">
                    <span class="text-sm font-bold tracking-tight text-slate-900 dark:text-white">Albert Construction and Supplies</span>
                </div>
                <p class="text-xs font-medium text-slate-400"> © @php echo date('Y'); @endphp Payag ni Angol.</p>
            </div>
        </div>
    </footer>
</body>

</html>