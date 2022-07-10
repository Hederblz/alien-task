<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('tarefas-index') }}">
                        <x-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <style>
                    .nav-icon
                    {
                        font-size: clamp(1em, 1.5em, 1.5em);
                    }
                    .link{
                        text-decoration:none;
                    }
                </style>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    
                    <x-nav-link :href="route('tarefas-index')" :active="request()->routeIs('tarefas-index')" class="link">
                        <ion-icon name="checkbox-outline" class="nav-icon"></ion-icon>
                        {{ __('Tarefas') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('notas-index')" :active="request()->routeIs('notas-index')" class="link">
                        <ion-icon name="document-outline" class="nav-icon"></ion-icon>
                        {{ __('Notas') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('etiquetas-index')" :active="request()->routeIs('etiquetas-index')" class="link">
                        <ion-icon name="bookmark-outline" class="nav-icon"></ion-icon>
                        {{ __('Etiquetas') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('timer')" :active="request()->routeIs('timer')" class="link">
                        <ion-icon name="time-outline" class="nav-icon"></ion-icon>
                        {{ __('Temporizador') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="link">
                        <ion-icon name="stats-chart-outline"class="nav-icon"></ion-icon>
                        {{ __('Painel de estatisticas') }}
                    </x-nav-link>

                    <x-nav-link :href="route('historico-index')" :active="request()->routeIs('historico-index')" class="link">
                        <ion-icon name="book-outline" class="nav-icon"></ion-icon>
                        {{ __('Histórico') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            
                            <x-dropdown-link :href="route('perfil', Auth::user()->id)" class="link">
                            <ion-icon name="person-outline"class="nav-icon"></ion-icon>
                                {{ __('Pefil') }}
                            </x-dropdown-link>
                            
                            <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();" class="link">
                            <ion-icon name="exit-outline" class="nav-icon"></ion-icon>
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            
            <x-responsive-nav-link :href="route('tarefas-index')" :active="request()->routeIs('tarefas-index')" class="link">
                <ion-icon name="checkbox-outline" class="nav-icon"></ion-icon>
                {{ __('Tarefas') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('notas-index')" :active="request()->routeIs('notas-index')" class="link">
                <ion-icon name="document-outline" class="nav-icon"></ion-icon>
                {{ __('Notas') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('etiquetas-index')" :active="request()->routeIs('etiquetas-index')" class="link">
                <ion-icon name="bookmark-outline" class="nav-icon"></ion-icon>
                {{ __('Etiquetas') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('timer')" :active="request()->routeIs('timer')" class="link">
                <ion-icon name="time-outline" class="nav-icon"></ion-icon>
                {{ __('Temporizador') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="link">
                <ion-icon name="stats-chart-outline"class="nav-icon"></ion-icon>
                {{ __('Painel de estatisticas') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="align-middle d-flex link">
                <ion-icon name="book-outline"></ion-icon>
                {{ __('Histórico') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="link">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
     crossorigin="anonymous">

     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

     <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/interfaces.js"></script>
</nav>
