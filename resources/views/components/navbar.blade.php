<nav class="bg-[#41B06E]" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo dan Judul -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center space-x-4">
                    <img src="{{ asset('img/Logo_Fix.png') }}" alt="logo" class="logo">
                    <span class="text-white text-lg font-bold">E-POSYANDU</span>
                </div>
            </div>

            <!-- Navigasi -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/home" class="{{ request()->is('home') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Home</a>
                <a href="/bayi" class="{{ request()->is('bayi') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Bayi</a>
                <a href="{{ route('ibu-hamil.index') }}" class="{{ request()->is('ibu-hamil*') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Ibu Hamil</a>
                <a href="{{ route('perkembanganbayi.index') }}" class="{{ request()->is('perkembanganbayi*') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Perkembangan Bayi</a>
                <a href="{{ route('imunisasi.index') }}" class="{{ request()->is('imunisasi*') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Imunisasi</a>
            </div>

            <!-- Tombol Logout -->
            <div class="hidden md:flex items-center">
                <div class="relative group">
                    <button type="button" @click="logout" id="logout-button" class="relative flex justify-center items-center">
                        <img src="{{ asset('img/logout.png') }}" alt="Logout Icon" class="logout h-10 w-10 cursor-pointer">
                    </button>
                    <span class="absolute top-12 left-1/2 transform -translate-x-1/2 rounded-md bg-gray-800 text-white text-xs px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">Sign Out</span>
                </div>
            </div>

            <!-- Tombol Menu Mobile -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-[#297F4C] p-2 text-gray-400 hover:bg-[#297F4C] hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#297F4C]">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu Icon -->
                    <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <!-- Close Icon -->
                    <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="/home" class="{{ request()->is('home') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Home</a>
            <a href="/bayi" class="{{ request()->is('bayi') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Bayi</a>
            <a href="{{ route('ibu-hamil.index') }}" class="{{ request()->is('ibu-hamil*') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Ibu Hamil</a>
            <a href="{{ route('perkembanganbayi.index') }}" class="{{ request()->is('perkembanganbayi*') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Perkembangan Bayi</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="mt-3 space-y-1 px-2">
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-[#297F4C] hover:text-white">Sign Out</a>
            </div>
        </div>
    </div>
</nav>
