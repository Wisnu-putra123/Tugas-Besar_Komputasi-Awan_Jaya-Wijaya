<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Task Assignment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 flex items-center justify-center min-h-screen font-sans text-slate-100 p-4 antialiased selection:bg-indigo-500 selection:text-white">

    <div class="w-full max-w-md bg-slate-900/40 border border-slate-800/80 backdrop-blur-xl p-8 rounded-[2rem] shadow-2xl transition-all duration-300 hover:border-slate-700/50 relative overflow-hidden group my-8">
        
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-indigo-500/10 rounded-full blur-3xl group-hover:bg-indigo-500/20 transition-colors duration-500"></div>
        <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-purple-500/10 rounded-full blur-3xl group-hover:bg-purple-500/20 transition-colors duration-500"></div>

        <div class="text-center mb-8 relative z-10">
            <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase mb-4 shadow-sm backdrop-blur-md">
                <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                Server: {{ env('SERVER_INDICATOR', 'Lokal') }}
            </div>
            <h2 class="text-3xl font-extrabold text-white tracking-tight bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">
                Daftar Akun
            </h2>
            <p class="text-sm text-slate-400 mt-2">Lengkapi data di bawah ini untuk bergabung</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-5 relative z-10">
            @csrf
            
            <div class="space-y-1.5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full bg-slate-950/40 border @error('name') border-rose-500/50 focus:ring-rose-500/30 @else border-slate-800 focus:ring-indigo-500/50 focus:border-indigo-500 @enderror text-white rounded-2xl px-4 py-3.5 focus:bg-slate-950/80 focus:ring-2 outline-none transition duration-200 text-sm placeholder-slate-600" 
                    placeholder="Nama lengkap Anda" required>
                @error('name') 
                    <p class="text-rose-400 text-xs mt-1 font-medium flex items-center gap-1">
                        <span class="w-1 h-1 rounded-full bg-rose-400"></span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full bg-slate-950/40 border @error('email') border-rose-500/50 focus:ring-rose-500/30 @else border-slate-800 focus:ring-indigo-500/50 focus:border-indigo-500 @enderror text-white rounded-2xl px-4 py-3.5 focus:bg-slate-950/80 focus:ring-2 outline-none transition duration-200 text-sm placeholder-slate-600" 
                    placeholder="contoh@email.com" required>
                @error('email') 
                    <p class="text-rose-400 text-xs mt-1 font-medium flex items-center gap-1">
                        <span class="w-1 h-1 rounded-full bg-rose-400"></span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Password</label>
                <input type="password" name="password" 
                    class="w-full bg-slate-950/40 border @error('password') border-rose-500/50 focus:ring-rose-500/30 @else border-slate-800 focus:ring-indigo-500/50 focus:border-indigo-500 @enderror text-white rounded-2xl px-4 py-3.5 focus:bg-slate-950/80 focus:ring-2 outline-none transition duration-200 text-sm placeholder-slate-600" 
                    placeholder="••••••••" required>
                @error('password') 
                    <p class="text-rose-400 text-xs mt-1 font-medium flex items-center gap-1">
                        <span class="w-1 h-1 rounded-full bg-rose-400"></span> {{ $message }}
                    </p> 
                @enderror
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" 
                    class="w-full bg-slate-950/40 border border-slate-800 text-white rounded-2xl px-4 py-3.5 focus:bg-slate-950/80 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 outline-none transition duration-200 text-sm placeholder-slate-600" 
                    placeholder="••••••••" required>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-500 hover:to-violet-500 text-white font-semibold py-3.5 rounded-2xl transition duration-300 shadow-lg shadow-indigo-600/20 hover:shadow-indigo-600/30 active:scale-[0.98] mt-6 text-sm tracking-wide">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-800/60 text-center relative z-10">
            <p class="text-sm text-slate-400">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition duration-150 ml-1 hover:underline">
                    Masuk di sini
                </a>
            </p>
        </div>
        
    </div>

</body>
</html>