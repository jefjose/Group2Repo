<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">


    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<style>
    .alert-container.success {
        background-color: #00ff08;
    }

    .alert-container.success p,
    .alert-container.success li {
        color: #000;
    }

    /* Error alert style */
    .alert-container.error {
        background-color: #ff2600;
    }

    .alert-container.error p,
    .alert-container.error li {
        color: #fff;
    }

    .alert-container {
        position: fixed;
        top: 125px !important;
        right: 20px;
        z-index: 1000;
        width: 400px;
        height: auto;
    }

    .alert {
        border: 1px solid #ccc;
        padding: 8px;
        font-size: 14px;
    }

    @media screen and (max-width: 767px) {
        .alert-container {
            top: 130px !important;
            right: 10px;
            width: 80%;
            max-width: 200px;
        }

        .alert {

            font-size: 12px;
            padding: 6px;
            max-height: none;
        }
    }

    .alert p,
    .alert ul {
        margin: 0;
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: 15px;
        line-height: 1.5;
    }

    .close-btn {
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        @if (session('success'))
            <div class="alert-container success">
                <div class="alert alert-success" id="success-alert">
                    <span class="close-btn" onclick="closeAlert('success-alert')">&times;</span>
                    @if (is_array(session('success')))
                        <ul>
                            @foreach (session('success') as $message)
                                <li><b>{{ $message }}</b></li>
                            @endforeach
                        </ul>
                    @else
                        <p><b>{{ session('success') }}</b></p>
                    @endif
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert-container error">
                <div class="alert alert-danger" id="error-alert">
                    <span class="close-btn" onclick="closeAlert('error-alert')">&times;</span>
                    @if (is_array(session('error')))
                        <ul>
                            @foreach (session('error') as $message)
                                <li><b>{{ $message }}</b></li>
                            @endforeach
                        </ul>
                    @else
                        <p><b>{{ session('error') }}</b></p>
                    @endif
                </div>
            </div>
        @endif

        <script>
            function closeAlert(alertId) {
                $('#' + alertId).remove();
            }

            setTimeout(function() {
                closeAlert('success-alert');
            }, 3000);

            setTimeout(function() {
                closeAlert('error-alert');
            }, 3000);
        </script>

        <main class="background">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
