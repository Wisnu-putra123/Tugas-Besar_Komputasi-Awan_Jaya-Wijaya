<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurus Tugas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-800 text-white flex flex-col hidden md:flex">
        <div class="h-16 flex items-center justify-center border-b border-slate-700">
            <h1 class="text-xl font-bold tracking-wider">Jaya Wijaya</h1>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2">
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

    <div class="flex-1 flex flex-col w-full">
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-10">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold text-slate-700">Sistem Manajemen Tugas</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="px-3 py-1 bg-green-100 text-green-700 border border-green-200 rounded-full text-sm font-medium">
                    Webserver: <span class="font-bold text-lg">{{ env('SERVER_INDICATOR', 'Lokal') }}</span>
                </div>
                <a href="{{ route('profile.show') }}" class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">
                    U
                </a>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 bg-slate-50">
            @yield('content')
        </main>
    </div>

</body>
</html>