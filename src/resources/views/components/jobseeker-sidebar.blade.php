<aside class="w-80 bg-slate-900 p-6 text-slate-100 shrink-0 flex flex-col justify-between border-r border-slate-800 min-h-screen">
    <div>
        <div class="mb-10 mt-2 px-2">
            <div class="text-3xl font-black tracking-wider text-blue-500 uppercase">JOBHUB</div>
            <div class="text-[10px] font-bold text-slate-400 tracking-widest mt-1 uppercase">Pelamar Panel</div>
        </div>

        <nav class="space-y-1.5">
            <a href="{{ route('job_seeker.dashboard') }}"
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('job_seeker.dashboard') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('job_seeker.applications') }}"
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('job_seeker.applications') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" /></svg>
                <span>Status Lamaran</span>
            </a>

            <a href="{{ route('job_seeker.bookmarks') }}"
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('job_seeker.bookmarks') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" /></svg>
                <span>Lowongan Tersimpan</span>
            </a>
        </nav>
    </div>

    <div class="border-t border-slate-800/60 pt-4 mt-8 space-y-1">
        <a href="{{ route('home') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
            <span>Beranda Utama</span>
        </a>
        <a href="{{ route('jobs.index') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
            <span>Cari Lowongan</span>
        </a>
        <a href="{{ route('job_seeker.profile') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium {{ request()->routeIs('job_seeker.profile') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }} transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
            <span>Profil Pelamar</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-amber-600 hover:bg-slate-800/60 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
