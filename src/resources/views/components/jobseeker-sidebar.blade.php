<aside class="w-80 bg-slate-900 p-6 text-slate-100 shrink-0 flex flex-col justify-between border-r border-slate-800 min-h-screen">
    <div>
        <div class="mb-10 mt-2 px-2">
            <div class="text-3xl font-black tracking-wider text-blue-500 uppercase">JOBHUB</div>
            <div class="text-[10px] font-bold text-slate-400 tracking-widest mt-1 uppercase">Pelamar Panel</div>
        </div>

        <nav class="space-y-1.5">
            <a href="{{ route('job_seeker.dashboard') }}"
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('job_seeker.dashboard') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <span class="text-base">📊</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('job_seeker.applications') }}"
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('job_seeker.applications') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <span class="text-base">📁</span>
                <span>Status Lamaran</span>
            </a>

            <a href="{{ route('job_seeker.bookmarks') }}"
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('job_seeker.bookmarks') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <span class="text-base">🔖</span>
                <span>Lowongan Tersimpan</span>
            </a>
        </nav>
    </div>

    <div class="border-t border-slate-800/60 pt-4 mt-8 space-y-1">
        <a href="{{ route('home') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
            <span class="text-base">🏠</span>
            <span>Beranda Utama</span>
        </a>
        <a href="{{ route('jobs.index') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
            <span class="text-base">🔍</span>
            <span>Cari Lowongan</span>
        </a>
        <a href="{{ route('job_seeker.profile') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium {{ request()->routeIs('job_seeker.profile') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }} transition">
            <span class="text-base">⚙️</span>
            <span>Profil Pelamar</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-amber-600 hover:bg-slate-800/60 transition">
                <span class="text-base">🚪</span>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
