@props(['active' => 'dashboard'])

<aside class="w-80 bg-slate-900 p-6 text-slate-100 shrink-0 flex flex-col justify-between border-r border-slate-800 min-h-screen">
    <div>
        <div class="mb-10 mt-2 px-2">
            <div class="text-3xl font-black tracking-wider text-blue-500 uppercase">JOBHUB</div>
            <div class="text-[10px] font-bold text-slate-400 tracking-widest mt-1 uppercase">Admin Panel</div>
        </div>

        <nav class="space-y-1.5">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                <span>Dashboard</span>
            </a>
            
            <a href="{{ route('admin.users') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('admin.users') || request()->routeIs('admin.users.*') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                <span>Manajemen User</span>
            </a>
            
            <a href="{{ route('admin.companies') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('admin.companies') || request()->routeIs('admin.companies.*') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" /></svg>
                <span>Manajemen Perusahaan</span>
            </a>

            <a href="{{ route('admin.jobs') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('admin.jobs') || request()->routeIs('admin.jobs.*') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.896 1.982-1.982 1.982H5.732c-1.086 0-1.982-.888-1.982-1.982v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v3.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" /></svg>
                <span>Manajemen Lowongan</span>
            </a>
            
            <a href="{{ route('admin.categories') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('admin.categories') || request()->routeIs('admin.categories.*') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" /></svg>
                <span>Kategori Pekerjaan</span>
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
        <a href="{{ route('profile.edit') }}" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
            <span>Profil Akun</span>
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
