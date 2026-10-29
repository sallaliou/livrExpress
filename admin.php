<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LivrExpress — Tableau de bord</title>

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

    <style>
        html { scroll-behavior: smooth; }
        ::selection { background-color: #3b82f6; color: white; }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #93c5fd; border-radius: 999px; }
        ::-webkit-scrollbar-thumb:hover { background: #3b82f6; }

        /* Fade-in animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out both;
        }

        /* Stagger children */
        .stagger > *:nth-child(1) { animation-delay: 0.05s; }
        .stagger > *:nth-child(2) { animation-delay: 0.1s; }
        .stagger > *:nth-child(3) { animation-delay: 0.15s; }
        .stagger > *:nth-child(4) { animation-delay: 0.2s; }

        /* Pulse badge */
        @keyframes pulseDot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .pulse-dot { animation: pulseDot 2s ease-in-out infinite; }

        /* Slide-down for modal */
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        .animate-slide-down {
            animation: slideDown 0.2s ease-out both;
        }

        /* Table row hover */
        .order-row {
            transition: all 0.15s ease;
        }
        .order-row:hover {
            background-color: #eff6ff;
        }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800 antialiased min-h-screen">

    <!-- ========== SIDEBAR (Desktop) + Top bar (Mobile) ========== -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside id="sidebar" class="hidden lg:flex lg:flex-col w-72 bg-white border-r border-gray-200 flex-shrink-0">
            <!-- Logo -->
            <div class="h-20 flex items-center px-6 border-b border-gray-100">
                <a href="index.php" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center group-hover:bg-primary-700 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Livr<span class="text-primary-600">Express</span></span>
                </a>
            </div>

            <!-- Nav -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-primary-50 text-primary-700 rounded-xl font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span>Commandes</span>
                </a>
                <a href="index.php" class="flex items-center space-x-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-700 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1"/>
                    </svg>
                    <span>Retour au site</span>
                </a>
            </nav>

            <!-- Footer -->
            <div class="p-4 border-t border-gray-100">
                <div class="bg-primary-50 rounded-xl p-4">
                    <p class="text-sm text-primary-700 font-medium mb-1">Besoin d'aide ?</p>
                    <p class="text-xs text-primary-600/70">support@livrexpress.sn</p>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Bar -->
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6 lg:px-8 flex-shrink-0">
                <!-- Mobile menu button -->
                <button id="mobile-sidebar-btn" class="lg:hidden p-2 -ml-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Page Title -->
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Commandes</h1>
                    <p class="text-sm text-gray-500 hidden sm:block">Gérez les demandes de livraison</p>
                </div>

                <!-- Right side -->
                <div class="flex items-center space-x-3">
                    <button onclick="loadOrders()" class="p-2.5 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors" title="Actualiser">
                        <svg id="refresh-icon" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </button>
                    <a href="index.php" class="hidden sm:inline-flex items-center px-4 py-2.5 bg-primary-600 text-white rounded-xl font-semibold text-sm hover:bg-primary-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour au site
                    </a>
                </div>
            </header>

            <!-- Main scrollable area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">

                <!-- Stats Cards -->
                <div id="stats-cards" class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-8 stagger">
                    <!-- Filled by JS -->
                </div>

                <!-- Filters bar -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sm:p-5 mb-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                        <!-- Search -->
                        <div class="relative flex-1 w-full">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input 
                                id="search-input" 
                                type="text" 
                                placeholder="Rechercher par nom ou téléphone..." 
                                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                            >
                        </div>

                        <!-- Status filter -->
                        <select id="status-filter" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all cursor-pointer">
                            <option value="">Tous les statuts</option>
                            <option value="nouvelle">🆕 Nouvelle</option>
                            <option value="en_cours">🚚 En cours</option>
                            <option value="livree">✅ Livrée</option>
                            <option value="annulee">❌ Annulée</option>
                        </select>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Table Header (desktop) -->
                    <div class="hidden md:grid md:grid-cols-12 gap-4 px-6 py-4 bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <div class="col-span-1">#</div>
                        <div class="col-span-2">Client</div>
                        <div class="col-span-2">Téléphone</div>
                        <div class="col-span-3">Message</div>
                        <div class="col-span-1">Statut</div>
                        <div class="col-span-2">Date</div>
                        <div class="col-span-1 text-right">Actions</div>
                    </div>

                    <!-- Orders list -->
                    <div id="orders-list">
                        <!-- Skeleton loading -->
                        <div id="loading-skeleton" class="divide-y divide-gray-50">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <div class="px-6 py-5 grid grid-cols-12 gap-4 animate-pulse">
                                <div class="col-span-1"><div class="h-4 bg-gray-200 rounded w-8"></div></div>
                                <div class="col-span-2"><div class="h-4 bg-gray-200 rounded w-24"></div></div>
                                <div class="col-span-2"><div class="h-4 bg-gray-200 rounded w-28"></div></div>
                                <div class="col-span-3"><div class="h-4 bg-gray-200 rounded w-full"></div></div>
                                <div class="col-span-1"><div class="h-6 bg-gray-200 rounded-full w-16"></div></div>
                                <div class="col-span-2"><div class="h-4 bg-gray-200 rounded w-20"></div></div>
                                <div class="col-span-1"><div class="h-4 bg-gray-200 rounded w-8 ml-auto"></div></div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <!-- Actual orders container -->
                        <div id="orders-container" class="hidden divide-y divide-gray-50"></div>

                        <!-- Empty state -->
                        <div id="empty-state" class="hidden py-20 text-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Aucune commande</h3>
                            <p class="text-gray-500 text-sm">Les nouvelles commandes apparaîtront ici.</p>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div id="pagination" class="hidden mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p id="pagination-info" class="text-sm text-gray-500"></p>
                    <div class="flex items-center space-x-2">
                        <button id="prev-btn" onclick="changePage(-1)" class="px-4 py-2 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors disabled:opacity-40 disabled:cursor-not-allowed">
                            ← Précédent
                        </button>
                        <span id="page-indicator" class="px-4 py-2 bg-primary-50 text-primary-700 rounded-xl text-sm font-bold"></span>
                        <button id="next-btn" onclick="changePage(1)" class="px-4 py-2 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors disabled:opacity-40 disabled:cursor-not-allowed">
                            Suivant →
                        </button>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- ========== Detail Modal ========== -->
    <div id="detail-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="absolute inset-4 sm:inset-auto sm:top-1/2 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 sm:w-full sm:max-w-lg">
            <div id="modal-content" class="bg-white rounded-2xl shadow-2xl overflow-hidden animate-slide-down">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <!-- ========== Mobile Sidebar Overlay ========== -->
    <div id="mobile-sidebar-overlay" class="fixed inset-0 z-40 hidden lg:hidden">
        <div class="absolute inset-0 bg-black/30" onclick="closeMobileSidebar()"></div>
        <aside class="absolute left-0 top-0 bottom-0 w-72 bg-white shadow-xl animate-slide-down">
            <div class="h-20 flex items-center px-6 border-b border-gray-100">
                <a href="index.php" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Livr<span class="text-primary-600">Express</span></span>
                </a>
                <button onclick="closeMobileSidebar()" class="ml-auto p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <nav class="px-4 py-6 space-y-1">
                <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-primary-50 text-primary-700 rounded-xl font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span>Commandes</span>
                </a>
                <a href="index.php" class="flex items-center space-x-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-gray-700 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1"/>
                    </svg>
                    <span>Retour au site</span>
                </a>
            </nav>
        </aside>
    </div>

    <!-- ========== Toast Notification ========== -->
    <div id="toast" class="fixed bottom-6 right-6 z-50 hidden">
        <div class="bg-gray-900 text-white px-5 py-3 rounded-xl shadow-lg flex items-center space-x-3 animate-slide-down">
            <span id="toast-icon"></span>
            <span id="toast-text" class="text-sm font-medium"></span>
        </div>
    </div>

    <script>
    /**
     * LivrExpress — Admin Dashboard JS
     */

    // ==========================================
    // State
    // ==========================================
    let currentPage = 1;
    let totalPages  = 1;
    let allOrders   = [];
    const LIMIT     = 10;

    // ==========================================
    // Status config
    // ==========================================
    const STATUS_CONFIG = {
        nouvelle: {
            label: 'Nouvelle',
            emoji: '🆕',
            bg: 'bg-blue-100',
            text: 'text-blue-700',
            dot: 'bg-blue-500',
        },
        en_cours: {
            label: 'En cours',
            emoji: '🚚',
            bg: 'bg-yellow-100',
            text: 'text-yellow-700',
            dot: 'bg-yellow-500',
        },
        livree: {
            label: 'Livrée',
            emoji: '✅',
            bg: 'bg-green-100',
            text: 'text-green-700',
            dot: 'bg-green-500',
        },
        annulee: {
            label: 'Annulée',
            emoji: '❌',
            bg: 'bg-red-100',
            text: 'text-red-700',
            dot: 'bg-red-500',
        }
    };

    // ==========================================
    // Init
    // ==========================================
    document.addEventListener('DOMContentLoaded', () => {
        loadStats();
        loadOrders();

        // Search debounce
        let searchTimeout;
        document.getElementById('search-input').addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                currentPage = 1;
                renderOrders();
            }, 300);
        });

        // Status filter
        document.getElementById('status-filter').addEventListener('change', () => {
            currentPage = 1;
            renderOrders();
        });

        // Mobile sidebar
        document.getElementById('mobile-sidebar-btn').addEventListener('click', () => {
            document.getElementById('mobile-sidebar-overlay').classList.remove('hidden');
        });

        // Auto-refresh every 30 seconds
        setInterval(() => {
            loadOrders(true);
            loadStats();
        }, 30000);
    });

    // ==========================================
    // Load stats
    // ==========================================
    async function loadStats() {
        try {
            const res = await fetch('api_orders.php?action=stats');
            const json = await res.json();
            if (!json.success) return;

            const s = json.data;
            document.getElementById('stats-cards').innerHTML = `
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm animate-fade-in-up">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-400">Total</span>
                    </div>
                    <div class="text-2xl font-black text-gray-900">${s.total}</div>
                    <div class="text-xs text-gray-500 mt-1">Commandes</div>
                </div>
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm animate-fade-in-up">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                            <span class="text-lg">🆕</span>
                        </div>
                        <span class="text-xs font-medium text-gray-400">Nouvelles</span>
                    </div>
                    <div class="text-2xl font-black text-blue-600">${s.nouvelle}</div>
                    <div class="text-xs text-gray-500 mt-1">En attente</div>
                </div>
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm animate-fade-in-up">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <span class="text-lg">🚚</span>
                        </div>
                        <span class="text-xs font-medium text-gray-400">En cours</span>
                    </div>
                    <div class="text-2xl font-black text-yellow-600">${s.en_cours}</div>
                    <div class="text-xs text-gray-500 mt-1">En livraison</div>
                </div>
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm animate-fade-in-up">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                            <span class="text-lg">✅</span>
                        </div>
                        <span class="text-xs font-medium text-gray-400">Livrées</span>
                    </div>
                    <div class="text-2xl font-black text-green-600">${s.livree}</div>
                    <div class="text-xs text-gray-500 mt-1">Terminées</div>
                </div>
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm animate-fade-in-up col-span-2 lg:col-span-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                            <span class="text-lg">📅</span>
                        </div>
                        <span class="text-xs font-medium text-gray-400">Aujourd'hui</span>
                    </div>
                    <div class="text-2xl font-black text-purple-600">${s.today}</div>
                    <div class="text-xs text-gray-500 mt-1">Commandes du jour</div>
                </div>
            `;
        } catch (err) {
            console.error('Stats error:', err);
        }
    }

    // ==========================================
    // Load orders
    // ==========================================
    async function loadOrders(silent = false) {
        if (!silent) {
            document.getElementById('loading-skeleton').classList.remove('hidden');
            document.getElementById('orders-container').classList.add('hidden');
            document.getElementById('empty-state').classList.add('hidden');
        }

        // Spin the refresh icon
        const icon = document.getElementById('refresh-icon');
        icon.classList.add('animate-spin');

        try {
            // Load ALL orders (we paginate/filter client-side for responsiveness)
            const res = await fetch('api_orders.php?action=list&limit=9999');
            const json = await res.json();

            if (!json.success) {
                showToast('Erreur de chargement', 'error');
                return;
            }

            allOrders = json.data;
            renderOrders();

        } catch (err) {
            console.error('Load error:', err);
            showToast('Erreur de connexion', 'error');
        } finally {
            icon.classList.remove('animate-spin');
            document.getElementById('loading-skeleton').classList.add('hidden');
        }
    }

    // ==========================================
    // Render orders (client-side filter + paginate)
    // ==========================================
    function renderOrders() {
        const search = document.getElementById('search-input').value.toLowerCase().trim();
        const statusFilter = document.getElementById('status-filter').value;

        // Filter
        let filtered = allOrders.filter(order => {
            const matchSearch = !search || 
                order.name.toLowerCase().includes(search) || 
                order.phone.toLowerCase().includes(search) ||
                (order.message && order.message.toLowerCase().includes(search));
            const matchStatus = !statusFilter || order.status === statusFilter;
            return matchSearch && matchStatus;
        });

        // Paginate
        const total = filtered.length;
        totalPages = Math.max(1, Math.ceil(total / LIMIT));
        currentPage = Math.min(currentPage, totalPages);
        const offset = (currentPage - 1) * LIMIT;
        const paged = filtered.slice(offset, offset + LIMIT);

        const container = document.getElementById('orders-container');
        const emptyState = document.getElementById('empty-state');
        const pagination = document.getElementById('pagination');

        if (total === 0) {
            container.classList.add('hidden');
            emptyState.classList.remove('hidden');
            pagination.classList.add('hidden');
            return;
        }

        emptyState.classList.add('hidden');
        container.classList.remove('hidden');

        // Render rows
        container.innerHTML = paged.map((order, idx) => {
            const cfg = STATUS_CONFIG[order.status] || STATUS_CONFIG.nouvelle;
            const num = offset + idx + 1;
            const date = formatDate(order.created_at);
            const msgPreview = order.message ? (order.message.length > 50 ? order.message.slice(0, 50) + '…' : order.message) : '—';

            return `
                <!-- Desktop Row -->
                <div class="order-row hidden md:grid md:grid-cols-12 gap-4 px-6 py-4 items-center cursor-pointer" onclick='showDetail(${JSON.stringify(order).replace(/'/g, "&#39;")})'>
                    <div class="col-span-1 text-sm text-gray-400 font-mono">${num}</div>
                    <div class="col-span-2">
                        <div class="font-semibold text-gray-900 text-sm">${escHtml(order.name)}</div>
                    </div>
                    <div class="col-span-2 text-sm text-gray-600 font-mono">${escHtml(order.phone)}</div>
                    <div class="col-span-3 text-sm text-gray-500 truncate" title="${escHtml(order.message)}">${escHtml(msgPreview)}</div>
                    <div class="col-span-1">
                        <span class="inline-flex items-center space-x-1.5 px-2.5 py-1 ${cfg.bg} ${cfg.text} rounded-full text-xs font-semibold">
                            <span class="w-1.5 h-1.5 ${cfg.dot} rounded-full ${order.status === 'nouvelle' ? 'pulse-dot' : ''}"></span>
                            <span>${cfg.label}</span>
                        </span>
                    </div>
                    <div class="col-span-2 text-sm text-gray-500">${date}</div>
                    <div class="col-span-1 flex justify-end space-x-1">
                        <button onclick="event.stopPropagation(); showStatusMenu('${order.id}')" class="p-1.5 hover:bg-gray-100 rounded-lg transition-colors" title="Changer le statut">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                            </svg>
                        </button>
                        <button onclick="event.stopPropagation(); confirmDelete('${order.id}', '${escHtml(order.name)}')" class="p-1.5 hover:bg-red-50 rounded-lg transition-colors" title="Supprimer">
                            <svg class="w-4 h-4 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Card -->
                <div class="md:hidden order-row px-4 py-4 cursor-pointer" onclick='showDetail(${JSON.stringify(order).replace(/'/g, "&#39;")})'>
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <div class="font-semibold text-gray-900">${escHtml(order.name)}</div>
                            <div class="text-sm text-gray-500 font-mono">${escHtml(order.phone)}</div>
                        </div>
                        <span class="inline-flex items-center space-x-1.5 px-2.5 py-1 ${cfg.bg} ${cfg.text} rounded-full text-xs font-semibold">
                            <span class="w-1.5 h-1.5 ${cfg.dot} rounded-full"></span>
                            <span>${cfg.label}</span>
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mb-2 line-clamp-2">${escHtml(order.message || '—')}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400">${date}</span>
                        <div class="flex space-x-1">
                            <button onclick="event.stopPropagation(); showStatusMenu('${order.id}')" class="p-1.5 hover:bg-gray-100 rounded-lg">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                                </svg>
                            </button>
                            <button onclick="event.stopPropagation(); confirmDelete('${order.id}', '${escHtml(order.name)}')" class="p-1.5 hover:bg-red-50 rounded-lg">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }).join('');

        // Pagination
        if (totalPages > 1) {
            pagination.classList.remove('hidden');
            pagination.classList.add('flex');
            document.getElementById('pagination-info').textContent = `${offset + 1}–${Math.min(offset + LIMIT, total)} sur ${total} commandes`;
            document.getElementById('page-indicator').textContent = `${currentPage} / ${totalPages}`;
            document.getElementById('prev-btn').disabled = currentPage <= 1;
            document.getElementById('next-btn').disabled = currentPage >= totalPages;
        } else {
            pagination.classList.add('hidden');
            pagination.classList.remove('flex');
        }
    }

    // ==========================================
    // Pagination
    // ==========================================
    function changePage(delta) {
        currentPage = Math.max(1, Math.min(totalPages, currentPage + delta));
        renderOrders();
        // Scroll to top of table
        document.getElementById('orders-list').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // ==========================================
    // Show detail modal
    // ==========================================
    function showDetail(order) {
        const cfg = STATUS_CONFIG[order.status] || STATUS_CONFIG.nouvelle;
        const modal = document.getElementById('detail-modal');
        const content = document.getElementById('modal-content');

        content.innerHTML = `
            <div class="bg-gradient-to-r from-primary-600 to-primary-800 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-white font-bold text-lg">${escHtml(order.name)}</h3>
                        <p class="text-white/70 text-sm font-mono">${escHtml(order.phone)}</p>
                    </div>
                    <button onclick="closeModal()" class="p-2 hover:bg-white/10 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-5">
                <!-- Status -->
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Statut actuel</span>
                    <span class="inline-flex items-center space-x-1.5 px-3 py-1.5 ${cfg.bg} ${cfg.text} rounded-full text-sm font-semibold">
                        <span class="w-2 h-2 ${cfg.dot} rounded-full"></span>
                        <span>${cfg.label}</span>
                    </span>
                </div>

                <!-- Message -->
                <div>
                    <span class="text-sm text-gray-500 block mb-2">Message</span>
                    <div class="bg-gray-50 rounded-xl p-4 text-gray-700 text-sm leading-relaxed">${escHtml(order.message || 'Aucun message')}</div>
                </div>

                <!-- Date -->
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Reçue le</span>
                    <span class="text-gray-700 font-medium">${formatDateFull(order.created_at)}</span>
                </div>
                ${order.updated_at ? `
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Mise à jour</span>
                    <span class="text-gray-700 font-medium">${formatDateFull(order.updated_at)}</span>
                </div>` : ''}

                <!-- Actions -->
                <div class="border-t border-gray-100 pt-5">
                    <p class="text-sm text-gray-500 mb-3">Changer le statut :</p>
                    <div class="grid grid-cols-2 gap-2">
                        ${Object.entries(STATUS_CONFIG).map(([key, val]) => `
                            <button 
                                onclick="updateStatus('${order.id}', '${key}')" 
                                class="flex items-center justify-center space-x-2 px-3 py-2.5 border rounded-xl text-sm font-medium transition-colors
                                    ${order.status === key 
                                        ? val.bg + ' ' + val.text + ' border-transparent ring-2 ring-offset-1 ring-' + key.replace('_', '-')
                                        : 'border-gray-200 text-gray-600 hover:bg-gray-50'
                                    }"
                            >
                                <span>${val.emoji}</span>
                                <span>${val.label}</span>
                            </button>
                        `).join('')}
                    </div>
                </div>

                <!-- Contact -->
                <div class="flex space-x-3">
                    <a href="tel:${escHtml(order.phone)}" class="flex-1 flex items-center justify-center space-x-2 px-4 py-2.5 bg-primary-600 text-white rounded-xl font-medium text-sm hover:bg-primary-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>Appeler</span>
                    </a>
                    <a href="https://wa.me/${order.phone.replace(/[^0-9+]/g, '')}" target="_blank" class="flex-1 flex items-center justify-center space-x-2 px-4 py-2.5 bg-green-500 text-white rounded-xl font-medium text-sm hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        `;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('detail-modal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // ==========================================
    // Status quick-change menu
    // ==========================================
    function showStatusMenu(orderId) {
        const order = allOrders.find(o => o.id === orderId);
        if (order) showDetail(order);
    }

    // ==========================================
    // Update status
    // ==========================================
    async function updateStatus(id, status) {
        try {
            const form = new FormData();
            form.append('action', 'update_status');
            form.append('id', id);
            form.append('status', status);

            const res = await fetch('api_orders.php', { method: 'POST', body: form });
            const json = await res.json();

            if (json.success) {
                showToast(`Statut → ${STATUS_CONFIG[status].emoji} ${STATUS_CONFIG[status].label}`, 'success');
                closeModal();
                await loadOrders(true);
                loadStats();
            } else {
                showToast(json.message, 'error');
            }
        } catch (err) {
            showToast('Erreur de connexion', 'error');
        }
    }

    // ==========================================
    // Delete
    // ==========================================
    function confirmDelete(id, name) {
        if (!confirm(`Supprimer la commande de "${name}" ?\nCette action est irréversible.`)) return;
        deleteOrder(id);
    }

    async function deleteOrder(id) {
        try {
            const form = new FormData();
            form.append('action', 'delete');
            form.append('id', id);

            const res = await fetch('api_orders.php', { method: 'POST', body: form });
            const json = await res.json();

            if (json.success) {
                showToast('Commande supprimée', 'success');
                closeModal();
                await loadOrders(true);
                loadStats();
            } else {
                showToast(json.message, 'error');
            }
        } catch (err) {
            showToast('Erreur de connexion', 'error');
        }
    }

    // ==========================================
    // Toast
    // ==========================================
    function showToast(message, type = 'info') {
        const toast = document.getElementById('toast');
        const icon = document.getElementById('toast-icon');
        const text = document.getElementById('toast-text');

        const icons = {
            success: '✅',
            error: '❌',
            info: 'ℹ️'
        };

        icon.textContent = icons[type] || icons.info;
        text.textContent = message;

        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 3000);
    }

    // ==========================================
    // Mobile sidebar
    // ==========================================
    function closeMobileSidebar() {
        document.getElementById('mobile-sidebar-overlay').classList.add('hidden');
    }

    // ==========================================
    // Helpers
    // ==========================================
    function escHtml(str) {
        const div = document.createElement('div');
        div.textContent = str || '';
        return div.innerHTML;
    }

    function formatDate(dateStr) {
        if (!dateStr) return '—';
        const d = new Date(dateStr);
        const now = new Date();
        const diffMs = now - d;
        const diffMin = Math.floor(diffMs / 60000);
        const diffH = Math.floor(diffMs / 3600000);

        if (diffMin < 1) return 'À l\'instant';
        if (diffMin < 60) return `il y a ${diffMin} min`;
        if (diffH < 24) return `il y a ${diffH}h`;

        return d.toLocaleDateString('fr-FR', { day: '2-digit', month: 'short', year: 'numeric' });
    }

    function formatDateFull(dateStr) {
        if (!dateStr) return '—';
        const d = new Date(dateStr);
        return d.toLocaleDateString('fr-FR', { 
            weekday: 'long', day: 'numeric', month: 'long', year: 'numeric', 
            hour: '2-digit', minute: '2-digit' 
        });
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
            closeMobileSidebar();
        }
    });
    </script>
</body>
</html>
