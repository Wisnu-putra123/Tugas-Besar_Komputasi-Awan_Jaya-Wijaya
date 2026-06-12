<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Task Assignment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans text-slate-800 p-4">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-sm border border-slate-100 transition-all">
        
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner text-2xl font-bold">
                TA
            </div>
            <h2 class="text-2xl font-bold text-slate-800">Selamat Datang</h2>
            <p class="text-sm text-slate-500 mt-1">Masuk untuk mengelola tugas kelompok</p>
        </div>

        @if(session('success'))
            <div class="mb-5 p-4 bg-green-50 text-green-700 text-sm rounded-xl border border-green-100 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-5 p-4 bg-red-50 text-red-700 text-sm rounded-xl border border-red-100 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="contoh@email.com" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                <input type="password" name="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="••••••••" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition shadow-sm mt-2">
                Masuk ke Sistem
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500 mb-3">Belum memiliki akun?</p>
            <a href="{{ route('register') }}" class="inline-block w-full text-blue-600 bg-blue-50 hover:bg-blue-100 font-semibold py-3 rounded-xl transition">
                Buat Akun Baru
            </a>
        </div>
        
    </div>

</body>
</html>