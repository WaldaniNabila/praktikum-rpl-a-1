<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelamar — JobHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-2xl font-semibold text-gray-900">
            Halo, {{ auth()->user()->name }}! 👋
        </h1>
        <p class="text-gray-500 mt-1">Selamat datang di dashboard pelamar JOBHUB.</p>

        <div class="mt-8 grid grid-cols-3 gap-4">
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <div class="text-sm text-gray-500">Lamaran Dikirim</div>
                <div class="text-3xl font-semibold text-blue-700 mt-1">0</div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <div class="text-sm text-gray-500">Lamaran Diproses</div>
                <div class="text-3xl font-semibold text-amber-600 mt-1">0</div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <div class="text-sm text-gray-500">Lamaran Diterima</div>
                <div class="text-3xl font-semibold text-teal-600 mt-1">0</div>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="text-sm text-red-600 hover:underline">Logout</button>
        </form>
    </div>
</body>
</html>