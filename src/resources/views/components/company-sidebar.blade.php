@props(['active' => 'dashboard'])

<aside class="w-80 bg-slate-900 p-6 text-slate-100 shrink-0 flex flex-col justify-between border-r border-slate-800 min-h-screen">
    <div>
        <div class="mb-10 mt-2 px-2">
            <div class="text-3xl font-black tracking-wider text-blue-500 uppercase">JOBHUB</div>
        </div>

        <nav class="space-y-1.5">
            <a href="{{ route('company.dashboard') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('company.dashboard') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <span class="text-base">📊</span>
                <span>Dashboard</span>
            </a>
            
            <a href="{{ route('company.jobs') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('company.jobs') || request()->routeIs('company.jobs.*') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <span class="text-base">💼</span>
                <span>Job Listings</span>
            </a>
            
            <a href="{{ route('company.profile') }}" 
               class="flex items-center gap-4 rounded-xl px-4 py-3.5 text-sm transition {{ request()->routeIs('company.profile') ? 'bg-blue-600 font-semibold text-white shadow-md shadow-blue-600/10' : 'font-medium text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                <span class="text-base">📄</span>
                <span>Company Profile</span>
            </a>
        </nav>
    </div>

    <div class="border-t border-slate-800/60 pt-4 mt-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-4 rounded-xl px-4 py-3.5 text-sm font-medium text-amber-600 hover:bg-slate-800/60 transition">
                <span class="text-base">🚪</span>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
