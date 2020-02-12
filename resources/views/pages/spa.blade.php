<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('meta-title', config('app.name') . " | blog")</title>
    <meta name="description" content="@yield('meta-description', 'Blog Zendero')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <style>
        .fade-enter-active, .fade-leave-active {
          transition: opacity .5s;
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
          opacity: 0;
        }
        .slide-fade-enter-active {
          transition: all .3s ease;
        }
        .slide-fade-leave-active {
          transition: all .3s cubic-bezier(.17, .67, .83, .67);
        }
        .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
          transform: translateY(800px);
          opacity: 0;
        }
    </style>
</head>
<body>

    <div id="app">
        <div class="preload"></div>
        <header class="space-inter">
            <div class="container container-flex space-between">
                <figure class="logo">
                    <img src="/img/logo.png" alt="">
                </figure>
                {{-- @include('navbar') --}}
                <nav-bar></nav-bar>
            </div>
        </header>

        <div style="min-height: 100vh">
            <transition name="slide-fade" mode="out-in">
                <router-view :key="$route.fullPath"></router-view>
            </transition>
        </div>

        <section class="footer">
            <footer>
                <div class="container">
                    <figure class="logo"><img src="/img/logo.png" alt=""></figure>
                    <nav>
                        <ul class="container-flex space-center list-unstyled">
                            <li><a href="index.html" class="text-uppercase c-white">home</a></li>
                            <li><a href="about.html" class="text-uppercase c-white">about</a></li>
                            <li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
                            <li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
                        </ul>
                    </nav>
                    <div class="divider-2"></div>
                    <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
                    <div class="divider-2" style="width: 80%;"></div>
                    <p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
                    <ul class="social-media-footer list-unstyled">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="tw"></a></li>
                        <li><a href="#" class="in"></a></li>
                        <li><a href="#" class="pn"></a></li>
                    </ul>
                </div>
            </footer>
        </section>
    </div>

{{--     <script>
        (function (window, document) {
        var menu = document.getElementById('menu'),
                WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';
        function toggleHorizontal() {
                [].forEach.call(
                        document.getElementById('menu').querySelectorAll('.custom-can-transform'),
                        function(el){
                                el.classList.toggle('pure-menu-horizontal');
                        }
                );
        };
        function toggleMenu() {
                // set timeout so that the panel has a chance to roll up
                // before the menu switches states
                if (menu.classList.contains('open')) {
                        setTimeout(toggleHorizontal, 500);
                }
                else {
                        toggleHorizontal();
                }
                menu.classList.toggle('open');
                document.getElementById('toggle').classList.toggle('x');
        };
        function closeMenu() {
                if (menu.classList.contains('open')) {
                        toggleMenu();
                }
        }
        document.getElementById('toggle').addEventListener('click', function (e) {
                toggleMenu();
                e.preventDefault();
        });
        window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
        })(this, this.document);
    </script> --}}

    <script src="{{ mix('js/app.js')}}"></script>

    @stack('scripts')
</body>
</html>
