<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Hello Chat' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/css/crop/crop.css') }}">

    <style>
        .cropper-view-box,
        .cropper-face {
            border-radius: 50%;
        }

        .cropper-view-box {
            outline: 0;
            box-shadow: 0 0 0 1px white;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{ darkModeStore: null }" x-init="darkModeStore = initializeDarkMode()">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <aside class="fixed lg:w-96 w-screen h-screen" x-data="{
            SystemSettingScreen: false,
            ProfileSettingScreen: false
        }">
            <div class="h-full  overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <div x-show="!SystemSettingScreen && !ProfileSettingScreen" x-transition x-cloak>
                    <div>
                        @livewire('navigation.profile-navigation')
                        <x-input.search-input type="text" placeholder="search chatting"
                            wire:model.live="search_chat" />
                        <div class="">
                            <img src="{{ asset('/assets/img/notfound.svg') }}" alt=""
                                class="w-72 lg:mt-32 lg:ml-10">

                            <p class="text-center text-gray-500 text-xl font-semibold mt-5">Tidak ada yang ngechat nih
                                wkwkw
                            </p>
                        </div>
                    </div>
                </div>

                <div x-show="SystemSettingScreen && !ProfileSettingScreen" x-transition x-cloak>
                    @livewire('settings.system-settings')
                </div>

                <div x-show="ProfileSettingScreen" x-transition x-cloak>
                    <div class="">
                        @livewire('settings.profile-settings')
                    </div>
                </div>
            </div>
        </aside>
        <div class="sm:ml-[24rem]">
            <div class="">
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
    <x-livewire-alert::scripts />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/custom-function.js') }}"></script>
    <script src="{{ asset('/assets/js/crop/crop.js') }}"></script>
    <script>
        function initializeDarkMode() {
            Alpine.store('darkMode', {
                dark: false,

                init() {
                    const storedDarkMode = localStorage.getItem('darkMode');
                    if (storedDarkMode !== null) {
                        this.dark = JSON.parse(storedDarkMode);
                    }

                    this.updateTheme();
                },

                toggle() {
                    this.dark = !this.dark;
                    localStorage.setItem('darkMode', this.dark);
                    this.updateTheme();
                },

                updateTheme() {
                    if (this.dark) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });
        }
    </script>
    @stack('scripts')

</body>

</html>
