<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance

    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden mr-2" icon="bars-2" inset="left" />

            <x-app-logo href="{{ route('dashboard') }}" wire:navigate />

            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item icon="layout-grid" :href="route('blog.posts.index')" :current="request()->routeIs('blog.posts.index')" wire:navigate>
                    {{ __('Posts') }}
                </flux:navbar.item>
            </flux:navbar>

            <flux:spacer />
            @guest
            <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0! relative">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center h-10 px-3 rounded hover:bg-zinc-200 dark:hover:bg-zinc-700">
                        <x-icon name="user" class="w-5 h-5 mr-1" />
                        {{ __('Account') }}
                    </button>

                    <!-- Dropdown -->
                    <div
                        x-show="open"
                        @click.outside="open = false"
                        class="absolute right-0 mt-2 w-40 bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded shadow-lg z-50"
                        style="display: none;"
                    >
                        @guest
                            <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-700">
                                {{ __('Login') }}
                            </a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-700">
                                {{ __('Register') }}
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-700">
                                {{ __('Dashboard') }}
                            </a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-700">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </flux:navbar>
            @endguest
            <x-desktop-user-menu />
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar collapsible="mobile" sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Platform')">
                    <flux:sidebar.item icon="layout-grid" :href="route('blog.posts.index')" :current="request()->routeIs('blog.posts.index')" wire:navigate>
                        {{ __('Posts')  }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:spacer />

            <flux:sidebar.nav>
                <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </flux:sidebar.item>
                <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                    {{ __('Documentation') }}
                </flux:sidebar.item>
            </flux:sidebar.nav>
        </flux:sidebar>

        <flux:main>
            {{ $slot }}
        </flux:main>

        @fluxScripts

        @stack('js')

        @if(session('swal'))
            <script>
                Swal.fire(@json(session('swal')));
            </script>
        @endif
    </body>
</html>
