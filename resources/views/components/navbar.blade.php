<nav class="bg-[#41B06E]" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="{{ asset('img/Logo_Fix.png') }}" alt="logo" class="logo">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/home" class="{{ request()->is('home') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
              <a href="/bayi" class="{{ request()->is('bayi') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Bayi</a>
              <a href="{{ route('ibu-hamil.index') }}" class="{{ request()->is('ibu-hamil*') ? 'bg-[#297F4C] text-white' : 'text-gray-300 hover:bg-[#297F4C] hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Ibu Hamil</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">

            <!-- Profile dropdown -->
            <div class="relative ml-3 flex justify-center items-center">
              <div class="group">
                <button 
                    type="button" 
                    @click="logout" 
                    id="logout-button"
                    class="relative flex justify-center items-center"
                    >
                <img src="{{ asset('img/logout.png') }}" alt="Logout Icon" class="logout h-10 w-10 cursor-pointer"/>
                </button>
                <span class="absolute top-12 left-1/2 transform -translate-x-1/2 rounded-md bg-gray-800 text-white text-xs px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                SignOut
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden" >
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-[#297F4C] p-2 text-gray-400 hover:bg-[#297F4C] hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#297F4C]" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="block rounded-md bg-[#297F4C] px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-[#297F4C] hover:text-white">Bayi</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-[#297F4C] hover:text-white">Ibu Hamil</a>
      </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-[#297F4C] hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>