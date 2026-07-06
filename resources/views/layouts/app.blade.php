<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurus Tugas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50/50 text-slate-800 font-sans antialiased flex h-screen overflow-hidden">

    <div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/30 z-40 hidden md:hidden transition-opacity duration-300 opacity-0 backdrop-blur-sm"></div>

    <aside id="sidebar" class="fixed md:static inset-y-0 left-0 w-64 bg-slate-900/95 backdrop-blur-md text-slate-200 flex flex-col z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out border-r border-slate-800">
        
        <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800/60">
            <div class="flex items-center space-x-2.5">
                <div class="w-7 h-7 bg-blue-600 rounded-lg flex items-center justify-center font-black text-sm text-white shadow-md shadow-blue-500/20">
                    J
                </div>
                <h1 class="text-lg font-bold tracking-tight text-white">Jaya Wijaya</h1>
            </div>
            <button id="close-sidebar" class="md:hidden text-slate-400 hover:text-white p-1 rounded-lg hover:bg-slate-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            
            <a href="{{ route('members.index') }}" class="group flex items-center px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 relative {{ Request::routeIs('members*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/10' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                @if(Request::routeIs('members*'))
                    <span class="absolute left-0 top-3 bottom-3 w-1 bg-white rounded-r"></span>
                @endif
                <svg class="w-5 h-5 mr-3 shrink-0 transition-colors {{ Request::routeIs('members*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Anggota Kelompok
            </a>
            
            <a href="{{ route('tasks.index') }}" class="group flex items-center px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 relative {{ Request::routeIs('tasks.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/10' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                @if(Request::routeIs('tasks.*'))
                    <span class="absolute left-0 top-3 bottom-3 w-1 bg-white rounded-r"></span>
                @endif
                <svg class="w-5 h-5 mr-3 shrink-0 transition-colors {{ Request::routeIs('tasks.*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                Daftar Tugas
            </a>
            
            <a href="{{ route('profile.show') }}" class="group flex items-center px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 relative {{ Request::routeIs('profile.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/10' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                @if(Request::routeIs('profile.*'))
                    <span class="absolute left-0 top-3 bottom-3 w-1 bg-white rounded-r"></span>
                @endif
                <svg class="w-5 h-5 mr-3 shrink-0 transition-colors {{ Request::routeIs('profile.*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Profil Saya
            </a>

            <div class="pt-4 mt-4 border-t border-slate-800/60">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-rose-400 hover:bg-rose-500/10 rounded-xl font-medium text-sm transition-all duration-200 text-left group">
                        <svg class="w-5 h-5 mr-3 shrink-0 text-rose-400/80 group-hover:text-rose-400 transition-colors" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </nav>

        <div class="p-4 border-t border-slate-800/60 text-xs text-slate-500 text-center font-medium tracking-wide">
            &copy; 2026 Jaya Wijaya
        </div>
    </aside>

    <div class="flex-1 flex flex-col w-full min-w-0">
        
        <header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200/60 flex items-center justify-between px-4 md:px-6 z-30">
            <div class="flex items-center space-x-3">
                <button id="open-sidebar" class="md:hidden text-slate-500 hover:text-slate-800 focus:outline-none p-1.5 rounded-xl hover:bg-slate-100 transition active:scale-95">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-base md:text-lg font-bold text-slate-800 tracking-tight truncate">Task Management</h2>
            </div>
            
            <div class="flex items-center space-x-3 md:space-x-4">
                <div class="px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200/60 rounded-xl text-xs md:text-sm font-semibold flex items-center space-x-1.5 shadow-sm">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span>Webserver: <span class="font-bold text-emerald-800">{{ env('SERVER_INDICATOR', 'Lokal') }}</span></span>
                </div>
                
                @if(auth()->check())
                    <a href="{{ route('profile.show') }}" class="w-8 h-8 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-md shadow-blue-500/10 hover:shadow-blue-500/20 transition transform hover:scale-105" title="{{ auth()->user()->name }}">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }} 
                    </a>
                @else
                    <div class="w-8 h-8 rounded-xl bg-slate-300 text-slate-600 flex items-center justify-center font-bold text-sm shrink-0">
                        G
                    </div>
                @endif
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-slate-50/60">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const openBtn = document.getElementById('open-sidebar');
            const closeBtn = document.getElementById('close-sidebar');

            function toggleSidebar() {
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                
                if (isOpen) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('opacity-0');
                    setTimeout(() => overlay.classList.add('hidden'), 300);
                } else {
                    overlay.classList.remove('hidden');
                    setTimeout(() => overlay.classList.remove('opacity-0'), 10);
                    sidebar.classList.remove('-translate-x-full');
                }
            }

            openBtn.addEventListener('click', toggleSidebar);
            closeBtn.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>