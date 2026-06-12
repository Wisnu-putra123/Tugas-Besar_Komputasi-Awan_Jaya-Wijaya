<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurus Tugas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex h-screen overflow-hidden">

    <div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/40 z-20 hidden md:hidden transition-opacity duration-300 opacity-0"></div>

    <aside id="sidebar" class="fixed md:static inset-y-0 left-0 w-64 bg-slate-800 text-white flex flex-col z-30 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="h-16 flex items-center justify-between px-6 border-b border-slate-700">
            <h1 class="text-xl font-bold tracking-wider">Jaya Wijaya</h1>
            <button id="close-sidebar" class="md:hidden text-slate-400 hover:text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('members') }}" class="flex items-center px-4 py-3 {{ Request::routeIs('members') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700' }} rounded-lg font-medium transition">
                <svg class="w-5 h-5 mr-3 transition-colors {{ request()->routeIs('group.members') ? 'text-white' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Anggota Kelompok
            </a>
            
            <a href="{{ route('tasks.index') }}" class="flex items-center px-4 py-3 {{ Request::routeIs('tasks.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700' }} rounded-lg font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Daftar Tugas
            </a>
            
            <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-3 {{ Request::routeIs('profile.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-700' }} rounded-lg font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profil Saya
            </a>

            <form action="{{ route('logout') }}" method="POST" class="pt-4">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-red-400 hover:bg-red-900/30 rounded-lg font-medium transition text-left">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar (Logout)
                </button>
            </form>
        </nav>
        <div class="p-4 border-t border-slate-700 text-sm text-slate-400 text-center">
            &copy; 2026 Jaya Wijaya
        </div>
    </aside>

    <div class="flex-1 flex flex-col w-full min-w-0">
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-4 md:px-6 z-10">
            <div class="flex items-center space-x-3">
                <button id="open-sidebar" class="md:hidden text-slate-600 hover:text-slate-950 focus:outline-none p-1 rounded-lg hover:bg-slate-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-lg md:text-xl font-semibold text-slate-700 truncate">Task Management</h2>
            </div>
            <div class="flex items-center space-x-3 md:space-x-4">
                <div class="px-2.5 py-1 bg-green-100 text-green-700 border border-green-200 rounded-full text-xs md:text-sm font-medium whitespace-nowrap">
                    Webserver: <span class="font-bold text-sm md:text-lg">{{ env('SERVER_INDICATOR', 'Lokal') }}</span>
                </div>
                @if(auth()->check())
                    <a href="{{ route('profile.show') }}" class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold shrink-0" title="{{ auth()->user()->name }}">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }} 
                    </a>
                @else
                    <div class="w-8 h-8 rounded-full bg-gray-400 text-white flex items-center justify-center font-bold shrink-0">
                        G
                    </div>
                @endif
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-slate-50">
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
                    // Tutup
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('opacity-0');
                    setTimeout(() => overlay.classList.add('hidden'), 300);
                } else {
                    // Buka
                    overlay.classList.remove('hidden');
                    // jeda mikro agar animasi transisi opacity berjalan mulus
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