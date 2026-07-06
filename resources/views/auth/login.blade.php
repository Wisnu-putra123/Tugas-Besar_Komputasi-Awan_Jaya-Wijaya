<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Task Assignment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 flex items-center justify-center min-h-screen font-sans text-slate-100 p-4 antialiased selection:bg-indigo-500 selection:text-white">

    <div class="w-full max-w-md bg-slate-900/40 border border-slate-800/80 backdrop-blur-xl p-8 rounded-[2rem] shadow-2xl transition-all duration-300 hover:border-slate-700/50 relative overflow-hidden group">
        
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-indigo-500/10 rounded-full blur-3xl group-hover:bg-indigo-500/20 transition-colors duration-500"></div>
        <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-purple-500/10 rounded-full blur-3xl group-hover:bg-purple-500/20 transition-colors duration-500"></div>

        <div class="text-center mb-8 relative z-10">
            <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase mb-4 shadow-sm backdrop-blur-md">
                <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                Server: {{ env('SERVER_INDICATOR', 'Lokal') }}
            </div>
            <h2 class="text-3xl font-extrabold text-white tracking-tight bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">
                Jaya Wijaya
            </h2>
            <p class="text-sm text-slate-400 mt-2">Masuk untuk mengelola tugas kelompok</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 text-emerald-400 text-sm rounded-2xl border border-emerald-500/20 flex items-center gap-3 backdrop-blur-md animate-fadeIn">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-500/10 text-rose-400 text-sm rounded-2xl border border-rose-500/20 flex items-center gap-3 backdrop-blur-md animate-fadeIn">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6 relative z-10">
            @csrf
            
            <div class="space-y-2">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Alamat Email</label>
                <div class="relative group/input">
                    <input type="email" name="email" value="{{ old('email') }}" 
                        class="w-full bg-slate-950/40 border border-slate-800 text-white rounded-2xl pl-4 pr-4 py-3.5 focus:bg-slate-950/80 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 outline-none transition duration-200 placeholder-slate-600 text-sm" 
                        placeholder="contoh@email.com" required>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Password</label>
                <div class="relative group/input">
                    <input type="password" name="password" 
                        class="w-full bg-slate-950/40 border border-slate-800 text-white rounded-2xl pl-4 pr-4 py-3.5 focus:bg-slate-950/80 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 outline-none transition duration-200 placeholder-slate-600 text-sm" 
                        placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-500 hover:to-violet-500 text-white font-semibold py-3.5 rounded-2xl transition duration-300 shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 active:scale-[0.98] mt-4 text-sm tracking-wide">
                Login
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-800/60 text-center relative z-10">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-4">Belum memiliki akun?</p>
            <a href="{{ route('register') }}" 
                class="inline-block w-full text-indigo-400 bg-indigo-500/5 hover:bg-indigo-500/10 border border-indigo-500/10 hover:border-indigo-500/20 font-semibold py-3.5 rounded-2xl transition duration-200 text-sm tracking-wide active:scale-[0.98]">
                Buat Akun Baru
            </a>
        </div>
        
    </div>

</body>
</html>