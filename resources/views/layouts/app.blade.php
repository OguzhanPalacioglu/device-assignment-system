<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


    <title> {{$header}} - Zimmet Sistemi</title>
    <!--<title> {{$header}} - {{ config('app.name','Zimmet Sistemi') }}</title> ->

        <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>

        </header>
        @endif
        <!-- Page Content -->
        <div class="py-6">
            <!-- slot alanı sayfaların görüntüleneceği alan oluyor. -->
             <!-- if ve foreach ise sayfalarda oluşabilecek hataları ve başarılı olan komutları basıyor. -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-2">
                @if($errors->any())
                    <div class="alert alert-danger m-auto py-2">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success m-auto py-2">
                     <li class="fa fa-check"> {{session('success')}} </li>
                    </div>
                @endif
                </div>
               {{-- // Arama sadece kişi ara çalışıypr --}}
                
                  {{-- @include('admin.search') --}}
                
                {{-- // Arama Henüz Çalışmıyor --}}
                {{ $slot }}
                
            </div>
        </div>
    </div>

    @stack('modals')
    @isset($js)
    {{ $js }}
    @endif
    @livewireScripts

   


</body>

</html>
