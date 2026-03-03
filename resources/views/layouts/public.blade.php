<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Blog' }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Mantengo Instrument Sans, pero puedes cambiar a Verdana/Arial si quieres más retro -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance

<style>

    :root {
        --bg-body: #f3f5f8;
        --bg-wrapper: #ffffff;
        --bg-header: linear-gradient(#f8fafc, #e9edf3);
        --bg-navbar: #eef2f7;
        --bg-card: #ffffff;
        --bg-soft: #f4f6fa;

        --border: #d8dde6;
        --border-strong: #c8ced8;

        --text-main: #2b2f36;
        --text-soft: #6b7280;
        --text-link: #374151;
        --text-link-hover: #111827;
    }

    /* 🌙 Soporte automático modo oscuro */
    @media (prefers-color-scheme: dark) {
        :root {
            --bg-body: #0e1116;
            --bg-wrapper: #141922;
            --bg-header: linear-gradient(#1c2330, #141922);
            --bg-navbar: #1a202c;
            --bg-card: #1a202c;
            --bg-soft: #252c39;

            --border: #2a2f38;
            --border-strong: #343c4b;

            --text-main: #c7cbd1;
            --text-soft: #7c8592;
            --text-link: #9aa3ad;
            --text-link-hover: #ffffff;
        }
    }

    body {
        background: var(--bg-body);
        color: var(--text-main);
        font-family: Verdana, Arial, sans-serif;
        font-size: 13px;
        line-height: 1.6;
    }

    #wrapper {
        max-width: 1500px;
        margin: 0 auto;
        background: var(--bg-wrapper);
        border-left: 1px solid var(--border);
        border-right: 1px solid var(--border);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Header */
    .flux-header {
        background: var(--bg-header);
        border-bottom: 2px solid var(--border-strong);
        padding: 20px 4%;
    }

    .flux-logo {
        font-family: "Trebuchet MS", sans-serif;
        font-size: 32px;
        letter-spacing: -1px;
        color: var(--text-main);
    }

    .flux-tagline {
        font-size: 12px;
        color: var(--text-soft);
        margin-top: 4px;
    }

    /* Navbar */
    .flux-navbar {
        background: var(--bg-navbar);
        border-bottom: 1px solid var(--border);
        padding: 10px 4%;
        font-size: 12px;
    }

    .flux-navbar a,
    .flux-navbar-item {
        color: var(--text-link) !important;
        margin-right: 20px;
        text-decoration: none;
    }

    .flux-navbar a:hover,
    .flux-navbar-item:hover {
        color: var(--text-link-hover) !important;
        text-decoration: underline;
    }

    /* Main grid */
    .flux-main {
        flex: 1;
        display: grid;
        grid-template-columns: 3fr 1fr;
        gap: 30px;
        padding: 30px 4%;
    }

    @media (max-width: 1000px) {
        .flux-main {
            grid-template-columns: 1fr;
        }
    }

    /* Posts */
    .post {
        background: var(--bg-card);
        border: 1px solid var(--border);
        margin-bottom: 25px;
        padding: 20px;
    }

    .post h2 {
        font-size: 18px;
        margin-bottom: 8px;
        color: var(--text-main);
    }

    .post-meta {
        font-size: 11px;
        color: var(--text-soft);
        margin-bottom: 15px;
    }

    .readmore {
        font-size: 11px;
        display: inline-block;
        margin-top: 10px;
        padding: 4px 10px;
        background: var(--bg-soft);
        border: 1px solid var(--border);
        color: var(--text-main);
        text-decoration: none;
    }

    .readmore:hover {
        opacity: 0.85;
    }

    /* Sidebar */
    .flux-sidebar {
        background: var(--bg-card) !important;
        border: 1px solid var(--border) !important;
    }

    .sidebar-box {
        background: var(--bg-card);
        border: 1px solid var(--border);
        margin-bottom: 25px;
        padding: 15px;
    }

    .sidebar-box h3 {
        font-size: 13px;
        margin-bottom: 10px;
        border-bottom: 1px solid var(--border);
        padding-bottom: 5px;
        color: var(--text-main);
    }

    .sidebar-box a {
        color: var(--text-link);
    }

    .sidebar-box a:hover {
        color: var(--text-link-hover);
    }

    /* Footer */
    #footer {
        border-top: 1px solid var(--border);
        background: var(--bg-wrapper);
        text-align: center;
        padding: 25px;
        font-size: 11px;
        color: var(--text-soft);
    }

    .post {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.post-image-wrapper {
    margin-bottom: 15px;
    text-align: center;
}

.post-image-wrapper img {
    max-width: 100%;
    width: auto;
    height: auto;
    max-height: 320px;          /* ← clave: limita la altura */
    object-fit: cover;
    border: 1px solid #2a2f38;
    border-radius: 2px;         /* opcional, muy sutil */
    background: #0e1116;
}
.post-content {
    flex: 1;
}

.post h2 {
    margin-top: 0;
}

</style>
</head>

<body>

<div id="wrapper">

    <!-- Header superior con logo y tagline -->
    <flux:header container class="flux-header border-b-0">
        <div class="flex flex-col">
            <a href="{{ route('dashboard') }}" class="flux-logo" wire:navigate>Blog</a>
            <div class="flux-tagline">Thoughts, code & digital nostalgia</div>
        </div>

        <flux:spacer />

        <!-- Menú superior (solo desktop por ahora) -->
        <flux:navbar class="flux-navbar max-lg:hidden">
            <flux:navbar.item :href="route('blog.posts.index')" :current="request()->routeIs('blog.posts.index')">
                Home
            </flux:navbar.item>
            <flux:navbar.item :href="route('blog.posts.index')" :current="request()->routeIs('blog.posts.index')">
                Posts
            </flux:navbar.item>
            <flux:navbar.item href="#">About</flux:navbar.item>
            <flux:navbar.item href="#">Blog</flux:navbar.item>
            <flux:navbar.item href="#">Projects</flux:navbar.item>
            <!-- Agrega más según necesites -->
        </flux:navbar>

        <!-- Menú de usuario / auth -->
        <x-desktop-user-menu />
    </flux:header>

    <!-- Sidebar mobile (se activa en pantallas pequeñas) -->
    <flux:sidebar collapsible="mobile" sticky class="lg:hidden flux-sidebar">
        <flux:sidebar.header>
            <a href="{{ route('dashboard') }}" class="flux-logo text-xl" wire:navigate>Blog</a>
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.group :heading="__('Navigation')">
                <flux:sidebar.item :href="route('blog.posts.index')" :current="request()->routeIs('blog.posts.index')">
                    Posts
                </flux:sidebar.item>
                <!-- Agrega más items -->
            </flux:sidebar.group>
        </flux:sidebar.nav>
    </flux:sidebar>

    <!-- Contenido principal con grid 70/30 -->
    <flux:main class="flux-main">
        <div>
            <!-- Aquí van los posts / contenido dinámico -->
            {{ $slot }}
        </div>

        <!-- Sidebar lateral (solo en desktop) -->
        <div class="lg:block hidden">
            <div class="sidebar-box">
                <h3>About Me</h3>
                <p style="font-size:12px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>

            <div class="sidebar-box">
                <h3>Categories</h3>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Retro Tech</a></li>
                    <li><a href="#">Coding</a></li>
                    <li><a href="#">Personal</a></li>
                </ul>
            </div>

            <div class="sidebar-box">
                <h3>Archives</h3>
                <ul>
                    <li><a href="#">March 2026</a></li>
                    <li><a href="#">February 2026</a></li>
                    <li><a href="#">January 2026</a></li>
                </ul>
            </div>
        </div>
    </flux:main>

    <!-- Footer retro -->
    <div id="footer">
        Blog Blog © 2xxx–2xxx • Designed with by lorem ipsum
    </div>

</div> <!-- #wrapper -->

@fluxScripts
@stack('js')

@if(session('swal'))
<script>
    Swal.fire(@json(session('swal')));
</script>
@endif

</body>
</html>