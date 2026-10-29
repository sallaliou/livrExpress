<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LivrExpress — Livraison rapide à Dakar</title>
    <meta name="description" content="LivrExpress, votre partenaire de livraison rapide et fiable à Dakar. Colis, repas, courses — livrés en un temps record.">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50:  '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="font-sans text-gray-800 bg-white antialiased">

    <!-- ========== NAVBAR ========== -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center group-hover:bg-primary-700 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white navbar-logo-text transition-colors">Livr<span class="text-primary-400">Express</span></span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#how-it-works" class="nav-link text-white/80 hover:text-white font-medium transition-colors">Comment ça marche</a>
                    <a href="#pricing" class="nav-link text-white/80 hover:text-white font-medium transition-colors">Tarifs</a>
                    <a href="#testimonials" class="nav-link text-white/80 hover:text-white font-medium transition-colors">Témoignages</a>
                    <a href="#contact" class="nav-link text-white/80 hover:text-white font-medium transition-colors">Contact</a>
                    <button onclick="openContactModal()" class="bg-white text-primary-600 px-6 py-2.5 rounded-full font-semibold hover:bg-primary-50 transition-all hover:shadow-lg cursor-pointer">
                        Commander
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-primary-800/95 backdrop-blur-lg border-t border-white/10">
            <div class="px-4 py-4 space-y-2">
                <a href="#how-it-works" class="block px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-colors">Comment ça marche</a>
                <a href="#pricing" class="block px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-colors">Tarifs</a>
                <a href="#testimonials" class="block px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-colors">Témoignages</a>
                <a href="#contact" class="block px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-colors">Contact</a>
                <button onclick="openContactModal()" class="w-full mt-2 bg-white text-primary-600 px-4 py-3 rounded-lg font-semibold text-center hover:bg-primary-50 transition-colors">
                    Commander
                </button>
            </div>
        </div>
    </nav>

    <!-- ========== HERO SECTION ========== -->
    <section id="hero" class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-primary-600">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary-300 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary-400 rounded-full blur-3xl"></div>
        </div>

        <!-- Floating shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-shape absolute top-1/4 left-[10%] w-4 h-4 bg-white/20 rounded-full"></div>
            <div class="floating-shape absolute top-1/3 right-[15%] w-6 h-6 bg-white/10 rounded-full" style="animation-delay: 1s;"></div>
            <div class="floating-shape absolute bottom-1/4 left-[20%] w-3 h-3 bg-white/15 rounded-full" style="animation-delay: 2s;"></div>
            <div class="floating-shape absolute top-[60%] right-[25%] w-5 h-5 bg-white/10 rounded-full" style="animation-delay: 0.5s;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-center lg:text-left animate-fade-in">
                    <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white/90 text-sm font-medium mb-6 border border-white/20">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        Disponible 7j/7 à Dakar
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-black text-white leading-tight mb-6">
                        Livraison
                        <span class="relative">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-300 to-cyan-300">express</span>
                            <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 200 12" fill="none">
                                <path d="M2 10C50 2 150 2 198 10" stroke="rgb(147,197,253)" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <br>à Dakar
                    </h1>
                    <p class="text-lg sm:text-xl text-white/80 mb-10 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Colis, repas, courses — nous livrons tout ce dont vous avez besoin, 
                        partout à Dakar, en <strong class="text-white">moins de 45 minutes</strong>.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#contact" class="group inline-flex items-center justify-center px-8 py-4 bg-white text-primary-700 rounded-full font-bold text-lg hover:bg-primary-50 transition-all shadow-2xl shadow-primary-900/30 hover:shadow-primary-900/50 hover:-translate-y-0.5">
                            Commander maintenant
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#how-it-works" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white/30 text-white rounded-full font-semibold text-lg hover:bg-white/10 transition-all backdrop-blur-sm">
                            En savoir plus
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 mt-14 pt-8 border-t border-white/10">
                        <div>
                            <div class="text-3xl sm:text-4xl font-black text-white counter" data-target="15000">0</div>
                            <div class="text-white/60 text-sm mt-1">Livraisons / mois</div>
                        </div>
                        <div>
                            <div class="text-3xl sm:text-4xl font-black text-white"><span class="counter" data-target="45">0</span> min</div>
                            <div class="text-white/60 text-sm mt-1">Délai moyen</div>
                        </div>
                        <div>
                            <div class="text-3xl sm:text-4xl font-black text-white counter" data-target="98">0</div>
                            <div class="text-white/60 text-sm mt-1">% Satisfaction</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual -->
                <div class="hidden lg:flex justify-center animate-fade-in-right">
                    <div class="relative">
                        <!-- Main Card -->
                        <div class="w-96 h-[480px] bg-white/10 backdrop-blur-xl rounded-3xl border border-white/20 p-8 shadow-2xl">
                            <div class="flex items-center space-x-3 mb-8">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-white/80 text-sm font-medium">Suivi en temps réel</span>
                            </div>
                            <!-- Map mockup -->
                            <div class="w-full h-48 bg-primary-700/50 rounded-2xl mb-6 flex items-center justify-center overflow-hidden relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-primary-600/30 to-primary-800/30"></div>
                                <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <!-- Animated dot on "map" -->
                                <div class="absolute w-4 h-4 bg-green-400 rounded-full animate-ping-slow top-16 left-20"></div>
                                <div class="absolute w-3 h-3 bg-green-400 rounded-full top-[4.1rem] left-[5.1rem]"></div>
                            </div>
                            <!-- Info rows -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between bg-white/5 rounded-xl p-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-primary-500/30 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-white text-sm font-medium">Colis #4821</div>
                                            <div class="text-white/50 text-xs">Plateau → Mermoz</div>
                                        </div>
                                    </div>
                                    <span class="text-green-400 text-xs font-semibold bg-green-400/10 px-3 py-1 rounded-full">En cours</span>
                                </div>
                                <div class="flex items-center justify-between bg-white/5 rounded-xl p-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-orange-500/30 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-white text-sm font-medium">Estimation</div>
                                            <div class="text-white/50 text-xs">Arrivée prévue</div>
                                        </div>
                                    </div>
                                    <span class="text-white font-bold text-lg">23 min</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating notification card -->
                        <div class="absolute -top-4 -right-8 bg-white rounded-2xl shadow-2xl p-4 animate-float w-56">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-800">Livré !</div>
                                    <div class="text-xs text-gray-500">il y a 2 min</div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating rating card -->
                        <div class="absolute -bottom-6 -left-8 bg-white rounded-2xl shadow-2xl p-4 animate-float w-48" style="animation-delay: 1.5s;">
                            <div class="flex items-center space-x-1 mb-1">
                                <span class="text-yellow-400 text-lg">★★★★★</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">4.9/5</div>
                            <div class="text-xs text-gray-500">2,340 avis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 50L48 45C96 40 192 30 288 28C384 26 480 32 576 40C672 48 768 58 864 58C960 58 1056 48 1152 42C1248 36 1344 34 1392 33L1440 32V100H1392C1344 100 1248 100 1152 100C1056 100 960 100 864 100C768 100 672 100 576 100C480 100 384 100 288 100C192 100 96 100 48 100H0V50Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- ========== COMMENT ÇA MARCHE ========== -->
    <section id="how-it-works" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">Simple & Rapide</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 mb-4">
                    Comment ça <span class="text-primary-600">marche</span> ?
                </h2>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                    Trois étapes simples pour recevoir votre livraison en un temps record
                </p>
            </div>

            <!-- Steps -->
            <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
                <!-- Step 1 -->
                <div class="group relative text-center p-8 rounded-3xl hover:bg-primary-50/50 transition-all duration-300">
                    <div class="relative inline-flex mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center shadow-xl shadow-primary-500/25 group-hover:shadow-primary-500/40 transition-shadow group-hover:-translate-y-1 transform transition-transform duration-300">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="absolute -top-3 -right-3 w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Passez commande</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Appelez-nous ou envoyez un message WhatsApp avec les détails de votre livraison.
                    </p>
                </div>

                <!-- Connector (desktop) -->
                <div class="hidden md:block absolute left-1/3 top-1/2 w-1/6 pointer-events-none" aria-hidden="true">
                </div>

                <!-- Step 2 -->
                <div class="group relative text-center p-8 rounded-3xl hover:bg-primary-50/50 transition-all duration-300">
                    <div class="relative inline-flex mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center shadow-xl shadow-primary-500/25 group-hover:shadow-primary-500/40 transition-shadow group-hover:-translate-y-1 transform transition-transform duration-300">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>
                        <span class="absolute -top-3 -right-3 w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">On récupère</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Notre livreur se rend à l'adresse de collecte et récupère votre colis en toute sécurité.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="group relative text-center p-8 rounded-3xl hover:bg-primary-50/50 transition-all duration-300">
                    <div class="relative inline-flex mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center shadow-xl shadow-primary-500/25 group-hover:shadow-primary-500/40 transition-shadow group-hover:-translate-y-1 transform transition-transform duration-300">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="absolute -top-3 -right-3 w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Livré !</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Votre colis est livré à destination. Vous recevez une confirmation instantanée.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SECTION TARIFS ========== -->
    <section id="pricing" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">Tarifs transparents</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 mb-4">
                    Nos <span class="text-primary-600">tarifs</span>
                </h2>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                    Des prix clairs et compétitifs, sans frais cachés
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid md:grid-cols-3 gap-8 lg:gap-10">
                
                <!-- Standard -->
                <div class="group bg-white rounded-3xl p-8 shadow-lg shadow-gray-200/50 hover:shadow-xl hover:shadow-primary-100/50 transition-all duration-300 border border-gray-100 hover:border-primary-200 hover:-translate-y-1">
                    <div class="mb-8">
                        <div class="w-14 h-14 bg-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Standard</h3>
                        <p class="text-gray-500">Livraison dans la journée</p>
                    </div>
                    <div class="mb-8">
                        <div class="flex items-baseline">
                            <span class="text-5xl font-black text-gray-900">1 500</span>
                            <span class="text-lg text-gray-500 ml-2 font-medium">FCFA</span>
                        </div>
                        <span class="text-sm text-gray-400 mt-1 block">par livraison</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Livraison sous 3-5h
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Colis jusqu'à 5 kg
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Suivi par SMS
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Zone : Dakar centre
                        </li>
                    </ul>
                    <button onclick="openContactModal('Bonjour, je souhaite commander la formule Standard (1 500 FCFA).')" class="w-full py-4 text-center bg-primary-50 text-primary-700 rounded-2xl font-bold hover:bg-primary-100 transition-colors cursor-pointer">
                        Choisir Standard
                    </button>
                </div>

                <!-- Express (Featured) -->
                <div class="group relative bg-gradient-to-br from-primary-600 to-primary-800 rounded-3xl p-8 shadow-2xl shadow-primary-500/25 hover:shadow-primary-500/40 transition-all duration-300 hover:-translate-y-2 scale-[1.02] md:scale-105">
                    <!-- Badge -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-400 text-gray-900 px-6 py-1.5 rounded-full text-sm font-bold shadow-lg">
                            ⭐ Populaire
                        </span>
                    </div>
                    <div class="mb-8 mt-2">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-5">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Express</h3>
                        <p class="text-white/70">Livraison rapide garantie</p>
                    </div>
                    <div class="mb-8">
                        <div class="flex items-baseline">
                            <span class="text-5xl font-black text-white">3 000</span>
                            <span class="text-lg text-white/70 ml-2 font-medium">FCFA</span>
                        </div>
                        <span class="text-sm text-white/50 mt-1 block">par livraison</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center text-white/90">
                            <svg class="w-5 h-5 text-primary-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Livraison sous 45 min
                        </li>
                        <li class="flex items-center text-white/90">
                            <svg class="w-5 h-5 text-primary-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Colis jusqu'à 10 kg
                        </li>
                        <li class="flex items-center text-white/90">
                            <svg class="w-5 h-5 text-primary-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Suivi en temps réel
                        </li>
                        <li class="flex items-center text-white/90">
                            <svg class="w-5 h-5 text-primary-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Tout Dakar & banlieue
                        </li>
                        <li class="flex items-center text-white/90">
                            <svg class="w-5 h-5 text-primary-300 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Priorité livreur dédié
                        </li>
                    </ul>
                    <button onclick="openContactModal('Bonjour, je souhaite commander la formule Express (3 000 FCFA).')" class="w-full py-4 text-center bg-white text-primary-700 rounded-2xl font-bold hover:bg-primary-50 transition-colors shadow-lg cursor-pointer">
                        Choisir Express
                    </button>
                </div>

                <!-- Business -->
                <div class="group bg-white rounded-3xl p-8 shadow-lg shadow-gray-200/50 hover:shadow-xl hover:shadow-primary-100/50 transition-all duration-300 border border-gray-100 hover:border-primary-200 hover:-translate-y-1">
                    <div class="mb-8">
                        <div class="w-14 h-14 bg-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Business</h3>
                        <p class="text-gray-500">Pour les professionnels</p>
                    </div>
                    <div class="mb-8">
                        <div class="flex items-baseline">
                            <span class="text-5xl font-black text-gray-900">25 000</span>
                            <span class="text-lg text-gray-500 ml-2 font-medium">FCFA</span>
                        </div>
                        <span class="text-sm text-gray-400 mt-1 block">par mois (illimité)</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Livraisons illimitées
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Colis jusqu'à 20 kg
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Dashboard entreprise
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Support prioritaire 24/7
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Facturation mensuelle
                        </li>
                    </ul>
                    <button onclick="openContactModal('Bonjour, je souhaite souscrire à la formule Business (25 000 FCFA / mois).')" class="w-full py-4 text-center bg-primary-50 text-primary-700 rounded-2xl font-bold hover:bg-primary-100 transition-colors cursor-pointer">
                        Choisir Business
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TÉMOIGNAGES ========== -->
    <section id="testimonials" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">Avis clients</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 mb-4">
                    Ce que disent nos <span class="text-primary-600">clients</span>
                </h2>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                    Découvrez pourquoi des milliers de Dakarois nous font confiance
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- Testimonial 1 -->
                <div class="group bg-gray-50 rounded-3xl p-8 hover:bg-primary-50/50 transition-all duration-300 border border-transparent hover:border-primary-100">
                    <div class="flex items-center space-x-1 mb-6">
                        <span class="text-yellow-400 text-xl">★★★★★</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-8 text-lg">
                        "Service incroyable ! J'ai envoyé un colis de Plateau à Parcelles Assainies en <strong class="text-gray-800">moins de 40 minutes</strong>. Le livreur était très professionnel."
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            A
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Aminata Diallo</div>
                            <div class="text-sm text-gray-500">Commerçante — Plateau</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="group bg-gray-50 rounded-3xl p-8 hover:bg-primary-50/50 transition-all duration-300 border border-transparent hover:border-primary-100">
                    <div class="flex items-center space-x-1 mb-6">
                        <span class="text-yellow-400 text-xl">★★★★★</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-8 text-lg">
                        "Depuis que j'utilise LivrExpress pour mon restaurant, <strong class="text-gray-800">mes ventes ont augmenté de 30%</strong>. Mes clients adorent la rapidité de livraison."
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            M
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Moussa Ndiaye</div>
                            <div class="text-sm text-gray-500">Restaurateur — Almadies</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="group bg-gray-50 rounded-3xl p-8 hover:bg-primary-50/50 transition-all duration-300 border border-transparent hover:border-primary-100">
                    <div class="flex items-center space-x-1 mb-6">
                        <span class="text-yellow-400 text-xl">★★★★★</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-8 text-lg">
                        "L'abonnement Business est un game changer. <strong class="text-gray-800">Livraisons illimitées</strong>, suivi en temps réel et un service client au top. Je recommande !"
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            F
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Fatou Sow</div>
                            <div class="text-sm text-gray-500">E-commerçante — Mermoz</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA SECTION ========== -->
    <section class="py-24 bg-gradient-to-br from-primary-600 to-primary-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-40 h-40 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-60 h-60 bg-primary-300 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-6">
                Prêt à livrer plus vite ?
            </h2>
            <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto">
                Rejoignez les milliers d'entreprises et particuliers qui font confiance à LivrExpress chaque jour.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/221770000000" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-green-500 text-white rounded-full font-bold text-lg hover:bg-green-600 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Contacter via WhatsApp
                </a>
                <a href="tel:+221330000000" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white/30 text-white rounded-full font-bold text-lg hover:bg-white/10 transition-all backdrop-blur-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Appeler maintenant
                </a>
            </div>
        </div>
    </section>

    <!-- ========== CONTACT / FOOTER ========== -->
    <footer id="contact" class="bg-gray-900 text-white">
        <!-- Contact Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
                
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <a href="#" class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold">Livr<span class="text-primary-400">Express</span></span>
                    </a>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Le service de livraison le plus rapide et fiable de Dakar. Disponible 7 jours sur 7.
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors" aria-label="Twitter / X">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors" aria-label="TikTok">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#hero" class="text-gray-400 hover:text-primary-400 transition-colors">Accueil</a></li>
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-primary-400 transition-colors">Comment ça marche</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-primary-400 transition-colors">Tarifs</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-primary-400 transition-colors">Témoignages</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Contact</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-primary-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-400">Rue Carnot, Plateau<br>Dakar, Sénégal</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:+221330000000" class="text-gray-400 hover:text-primary-400 transition-colors">+221 76 600 99 88</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-primary-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:contact@livrexpress.sn" class="text-gray-400 hover:text-primary-400 transition-colors">contact@livrexpress.sn</a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <a href="https://wa.me/221770000000" class="text-gray-400 hover:text-green-400 transition-colors">+221 77 77 366 77 24</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Action & Form Section -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Demande rapide</h4>

                    <!-- Bouton Déclencheur Initial "Nous contacter" -->
                    <div id="contact-cta-card" class="bg-gray-800/90 border border-gray-700/70 rounded-2xl p-6 text-center shadow-lg transition-all duration-300">
                        <div class="w-12 h-12 bg-primary-500/20 text-primary-400 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h5 class="text-white font-semibold text-base mb-2">Une livraison ou une question ?</h5>
                        <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                            Cliquez ci-dessous pour afficher le formulaire et transmettre directement votre demande.
                        </p>
                        
                        <div class="space-y-2.5">
                            <button 
                                id="btn-show-contact-form" 
                                type="button" 
                                class="w-full inline-flex items-center justify-center px-5 py-3.5 bg-primary-600 hover:bg-primary-500 text-white rounded-xl font-bold transition-all shadow-lg shadow-primary-900/50 hover:shadow-primary-600/30 hover:-translate-y-0.5 group"
                            >
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>Nous contacter</span>
                            </button>

                            <button 
                                type="button" 
                                onclick="openContactModal()" 
                                class="w-full inline-flex items-center justify-center px-3 py-2 text-xs text-primary-300 hover:text-white hover:bg-gray-700/50 rounded-lg transition-colors font-medium"
                            >
                                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                </svg>
                                <span>Ouvrir en fenêtre popup</span>
                            </button>
                        </div>
                    </div>

                    <!-- Formulaire de contact (affiché après le clic) -->
                    <div id="contact-form-wrapper" class="hidden transition-all duration-300">
                        <div class="flex items-center justify-between mb-3 pb-2 border-b border-gray-800">
                            <span class="text-xs uppercase tracking-wider text-primary-400 font-semibold flex items-center">
                                <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                                Formulaire de contact
                            </span>
                            <button 
                                id="btn-hide-contact-form" 
                                type="button" 
                                class="text-gray-400 hover:text-white text-xs flex items-center gap-1 hover:bg-gray-800 px-2 py-1 rounded transition-colors"
                                title="Masquer le formulaire"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span>Masquer</span>
                            </button>
                        </div>

                        <form id="contact-form" action="process_form.php" method="POST" class="space-y-3">
                            <input 
                                type="text" 
                                id="inline-contact-name"
                                name="name" 
                                placeholder="Votre nom" 
                                required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all text-sm"
                            >
                            <input 
                                type="tel" 
                                name="phone" 
                                placeholder="Numéro de téléphone" 
                                required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all text-sm"
                            >
                            <textarea 
                                name="message" 
                                placeholder="Votre message ou détails de livraison..." 
                                rows="3" 
                                required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all resize-none text-sm"
                            ></textarea>
                            <button 
                                type="submit" 
                                class="w-full py-3.5 bg-primary-600 text-white rounded-xl font-bold hover:bg-primary-500 transition-colors flex items-center justify-center space-x-2 text-sm shadow-lg shadow-primary-900/40"
                            >
                                <span>Envoyer ma demande</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                            <div id="form-message" class="hidden text-sm text-center py-2 px-3 rounded-lg font-medium"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-gray-500 text-sm">
                        &copy; <?php echo date('Y'); ?> LivrExpress. Tous droits réservés.
                    </p>
                    <div class="flex flex-wrap items-center gap-6 text-sm">
                        <a href="admin.php" class="inline-flex items-center text-primary-400 hover:text-primary-300 font-medium transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Espace Commandes
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-400 transition-colors">Mentions légales</a>
                        <a href="#" class="text-gray-500 hover:text-gray-400 transition-colors">Politique de confidentialité</a>
                        <a href="#" class="text-gray-500 hover:text-gray-400 transition-colors">CGV</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========== CONTACT MODAL ========== -->
    <div id="contact-modal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <!-- Backdrop -->
        <div id="modal-backdrop" class="fixed inset-0 bg-gray-950/70 backdrop-blur-sm transition-opacity"></div>
        
        <!-- Modal Dialog Box -->
        <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 lg:p-8 flex items-center justify-center min-h-full">
            <div class="relative bg-white rounded-3xl shadow-2xl border border-gray-100 max-w-lg w-full overflow-hidden transform transition-all animate-slide-down">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-primary-700 to-primary-900 px-6 sm:px-8 py-6 text-white relative">
                    <button 
                        type="button" 
                        id="close-modal-btn" 
                        class="absolute top-5 right-5 text-white/70 hover:text-white p-2 rounded-xl hover:bg-white/10 transition-colors"
                        aria-label="Fermer la boîte de dialogue"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <div class="inline-flex items-center space-x-2 px-3 py-1 bg-white/15 rounded-full text-xs font-semibold mb-2 backdrop-blur-sm">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        <span>Service Client Dakar 7j/7</span>
                    </div>
                    <h3 id="modal-headline" class="text-2xl font-black">Nous contacter</h3>
                    <p class="text-primary-100 text-sm mt-1">LivrExpress — Vos livraisons en moins de 45 min à Dakar</p>
                </div>

                <!-- Modal Body / Form -->
                <div class="p-6 sm:p-8">
                    <form id="modal-contact-form" action="process_form.php" method="POST" class="space-y-4">
                        <div>
                            <label for="modal-name" class="block text-sm font-semibold text-gray-700 mb-1.5">Votre nom complet</label>
                            <input 
                                type="text" 
                                id="modal-name" 
                                name="name" 
                                placeholder="Ex: Aminata Diallo" 
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:bg-white transition-all text-sm"
                            >
                        </div>
                        <div>
                            <label for="modal-phone" class="block text-sm font-semibold text-gray-700 mb-1.5">Numéro de téléphone</label>
                            <input 
                                type="tel" 
                                id="modal-phone" 
                                name="phone" 
                                placeholder="Ex: +221 77 123 45 67" 
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:bg-white transition-all text-sm"
                            >
                        </div>
                        <div>
                            <label for="modal-message" class="block text-sm font-semibold text-gray-700 mb-1.5">Votre message / Demande de livraison</label>
                            <textarea 
                                id="modal-message" 
                                name="message" 
                                placeholder="Détails : adresses de collecte et livraison, type de colis..." 
                                rows="3" 
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:bg-white transition-all text-sm resize-none"
                            ></textarea>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full py-3.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-bold transition-all shadow-lg shadow-primary-600/30 flex items-center justify-center space-x-2 text-base"
                        >
                            <span>Envoyer ma demande</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>

                        <div id="modal-form-message" class="hidden text-sm text-center py-2.5 px-3 rounded-xl font-medium"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top -->
    <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:bg-primary-700 hover:-translate-y-1 z-40">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
