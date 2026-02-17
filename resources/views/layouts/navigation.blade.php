<!-- NAVIGATION SIDEBAR + RESPONSIVE MOBILE -->
<div x-data="{ open: false }">

    <!-- OVERLAY (MOBILE) -->
    <div 
        x-show="open" 
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden">
    </div>

    <!-- MOBILE TOPBAR (LOGO TENGAH + USER KANAN) -->
    <div class="md:hidden flex items-center justify-between px-4 h-14 border-b bg-white shadow z-50 fixed top-0 left-0 right-0">

        <!-- HAMBURGER -->
        <button @click="open = !open" class="p-2 rounded hover:bg-gray-100 transition">
            <!-- Hamburger -->
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <!-- Close -->
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- LOGO (TENGAH) -->
        @php $role = Auth::user()->role; @endphp
        <a href="{{ route($role . '.dashboard') }}" class="flex items-center">
            <img src="{{ asset('images/inovindo-logo.webp') }}" class="h-8 w-auto">
        </a>

        <!-- USER (KANAN) -->
        <div class="flex items-center gap-2">
            <span class="text-sm font-medium text-gray-700 max-w-[90px] truncate">
                {{ Auth::user()->username }}
            </span>
            <div class="w-9 h-9 rounded-full bg-indigo-500 text-white flex items-center justify-center font-semibold uppercase">
                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
            </div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <nav 
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="bg-white border-r border-gray-200 h-screen fixed top-0 left-0 w-64 flex flex-col z-50 transition-transform duration-300
               md:translate-x-0 md:static">

        <!-- Logo -->
        <div class="h-16 flex items-center px-4 border-b border-gray-200">
            <a href="{{ route($role . '.dashboard') }}" class="flex items-center">
                <img src="{{ asset('images/inovindo-logo.webp') }}" alt="Logo" class="h-8 w-auto">
            </a>
        </div>

        <!-- MENU LIST -->
        <div class="flex-1 overflow-y-auto px-3 py-4 bg-gray-50">
            @auth

                {{-- ===================== ADMIN MENU ===================== --}}
                @if(Auth::user()->role == 'admin')

                    <div class="space-y-1">

                        <!-- Dashboard -->
                        <x-nav-link :href="route('admin.dashboard')" 
                            :active="request()->routeIs('admin.dashboard')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M3 12l9-9 9 9M4 10v10h6V14h4v6h6V10" />
                            </svg>
                            <span>Dashboard</span>
                        </x-nav-link>

                        <!-- Kehadiran Pegawai -->
                        <x-nav-link :href="route('admin.kehadiran.index')" 
                            :active="request()->routeIs('admin.kehadiran.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Kehadiran Pegawai</span>
                        </x-nav-link>

                        {{-- garis --}}
                        <div class="h-[1px] bg-slate-300/60 my-1 mx-3"></div>

                        {{-- <!-- Meeting -->
                        <x-nav-link :href="route('admin.meeting.index')" 
                            :active="request()->routeIs('admin.meeting.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />
                            </svg>
                            <span>Meeting</span>
                        </x-nav-link> --}}

                        {{-- <!-- Tugas -->
                        <x-nav-link :href="route('admin.tugas.index')" 
                            :active="request()->routeIs('admin.tugas.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Tugas</span>
                        </x-nav-link> --}}

                        <!-- Pengumuman -->
                        <x-nav-link :href="route('admin.pengumuman.index')" 
                            :active="request()->routeIs('admin.pengumuman.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 16h-1v-4H8m0 0h4m-4 0V8m5 8l5 3V5l-5 3" />
                            </svg>
                            <span>Pengumuman</span>
                        </x-nav-link>

                        <!-- Employee -->
                        <x-nav-link :href="route('admin.pegawai.index')" 
                            :active="request()->routeIs('admin.pegawai.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m8-6.63a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span>Employee</span>
                        </x-nav-link>

                        {{-- <!-- Tim & Divisi -->
                        <x-nav-link :href="route('admin.tim-divisi.index')" 
                            :active="request()->routeIs('admin.tim-divisi.*')" class="!justify-start gap-3 border-t pt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m8-6.63a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span>Tim & Divisi</span>
                        </x-nav-link> --}}

                        {{-- <!-- Manajemen Cuti -->
                        <x-nav-link :href="route('admin.cuti.index')" 
                            :active="request()->routeIs('admin.cuti.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4h16v16H4z" />
                            </svg>
                            <span>Manajemen Cuti</span>
                        </x-nav-link> --}}

                        <!-- Salary -->
                        <x-nav-link :href="route('admin.gaji.index')" 
                            :active="request()->routeIs('admin.gaji.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10v12" />
                            </svg>
                            <span>Salary</span>
                        </x-nav-link>

                        {{-- <!-- Tunjangan & Potongan -->
                        <x-nav-link :href="route('admin.tunjangan-potongan.index')" 
                            :active="request()->routeIs('admin.tunjangan-potongan.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10v12"/>
                            </svg>
                            <span>Tunjangan & Potongan</span>
                        </x-nav-link> --}}

                        {{-- <!-- Position -->
                        <x-nav-link :href="route('admin.jabatan.index')" 
                            :active="request()->routeIs('admin.jabatan.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a5 5 0 00-10 0v2M5 9h14v12H5z" />
                            </svg>
                            <span>Position</span>
                        </x-nav-link> --}}

                        {{-- garis --}}
                        <div class="h-[1px] bg-slate-300/60 my-1 mx-3"></div>


                        {{-- <!-- Tugas Pengumpulan -->
                        <x-nav-link :href="route('admin.tugas_pengumpulan.index')" 
                            :active="request()->routeIs('admin.tugas_pengumpulan.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Pengumpulan Tugas</span>
                        </x-nav-link> --}}

                        <!-- Laporan -->
                        <x-nav-link :href="route('admin.laporan.performa')" 
                            :active="request()->routeIs('admin.laporan.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17v-6m4 6V7m4 10V3" />
                            </svg>
                            <span>Laporan</span>
                        </x-nav-link>
                    </div>

                {{-- ===================== PEGAWAI MENU ===================== --}}
                @elseif(Auth::user()->role == 'pegawai')

                    <div class="space-y-1">

                        <!-- Dashboard -->
                        <x-nav-link :href="route('pegawai.dashboard')" 
                            :active="request()->routeIs('pegawai.dashboard')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l9-9 9 9M4 10v10h6V14h4v6h6V10" />
                            </svg>
                            <span>Dashboard</span>
                        </x-nav-link>

                        <!-- Kehadiran -->
                        <x-nav-link :href="route('pegawai.kehadiran.index')" 
                            :active="request()->routeIs('pegawai.kehadiran.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Kehadiran</span>
                        </x-nav-link>

                        {{-- garis --}}
                        <div class="h-[1px] bg-slate-300/60 my-1 mx-3"></div>

                        <!-- Tugas -->
                        <x-nav-link :href="route('pegawai.tugas.index')" 
                            :active="request()->routeIs('pegawai.tugas.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8l4 4v14a2 2 0 01-2 2z" />
                            </svg>
                            <span>Tugas</span>
                        </x-nav-link>

                        <!-- Gaji -->
                        <x-nav-link :href="route('pegawai.gaji')" 
                            :active="request()->routeIs('pegawai.gaji*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .9-3 2s1.343 2 3 2 3 .9 3 2-1.343 2-3 2m0-10v12" />
                            </svg>
                            <span>Gaji</span>
                        </x-nav-link>
                        
                        <!-- Pengajuan Cuti -->
                        <x-nav-link :href="route('pegawai.cuti.index')" 
                            :active="request()->routeIs('pegawai.cuti.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />
                            </svg>
                            <span>Pengajuan Cuti</span>
                        </x-nav-link>

                        {{-- garis --}}
                        <div class="h-[1px] bg-slate-300/60 my-1 mx-3"></div>

                        <!-- Meeting -->
                        <x-nav-link :href="route('pegawai.meeting.index')" 
                            :active="request()->routeIs('pegawai.meeting.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 8h14M5 12h14M5 16h14" />
                            </svg>
                            <span>Meeting</span>
                        </x-nav-link>

                        <!-- Pengumuman -->
                        <x-nav-link :href="route('pegawai.pengumuman.index')" 
                            :active="request()->routeIs('pegawai.pengumuman.*')" class="!justify-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 11H5m14 0l-4 4m4-4l-4-4M5 7h14M5 15h10" />
                            </svg>
                            <span>Pengumuman</span>
                        </x-nav-link>

                    </div>

                @endif
            @endauth
        </div>

        <!-- USER FOOTER -->
        <div class="border-t border-gray-200 p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.88 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800">{{ Auth::user()->username }}</p>
                    <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button class="w-full text-left px-3 py-2 text-red-600 hover:bg-red-100 rounded">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- CONTENT WRAPPER (PUSHED BY SIDEBAR) -->
    <div :class="open ? 'ml-0' : 'ml-0 md:ml-64'" class="transition-all duration-300">
        <!-- PAGE CONTENT DI SINI -->