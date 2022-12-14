<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

          <!-- Fonts -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

          <!-- Styles -->
          <link rel="stylesheet" href="{{ asset('css/app.css') }}">
          <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
          <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
          <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
          <!-- Scripts -->
          <script src="{{ asset('js/app.js') }}" defer></script>
          <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
          <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
          <link rel="icon" href="{{URL::asset('icon.jpg')}}">
          {{-- Chart JS --}}
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<style>
    
    .select2-selection__rendered {
      line-height: 36px !important;
    }
    .select2-container .select2-selection--single {
      height: 40px !important;
    }
    .select2-selection__arrow {
      height: 39px !important;
    }
    .swal2-popup {
      font-size: 0.8rem !important;
      font-family: Georgia, serif;
    }
    .toast-message {
      font-size: 12px;
    }
    .dataTables_filter{
      margin-bottom:20px
    }
    .dataTables_length{
      margin-bottom:20px
    }
    .open\:bg-green-200[open] {
      --tw-bg-opacity: 1;
      background-color: rgb(187 247 208 / var(--tw-bg-opacity));
    }
    .open\:bg-red-600[open] {
      --tw-bg-opacity: 1;
      background-color: rgb(220 38 38 / var(--tw-bg-opacity));
    }
    .open\:bg-red-200[open] {
      --tw-bg-opacity: 1;
      background-color: rgb(254 202 202 / var(--tw-bg-opacity));
    
    }
    .open\:bg-amber-200[open] {
      --tw-bg-opacity: 1;
      background-color: rgb(253 230 138 / var(--tw-bg-opacity));
    }
    
    table.dataTable thead tr {
      background-color: #E0144C;
      color: white;
    }
    </style>
    <script>
        function SwalLoading(html = 'Loading ...', title = '') {
           return Swal.fire({
               title: title,
               html: html,
         customClass: 'swal-wide',
               timerProgressBar: true,
               allowOutsideClick: false,
               didOpen: () => {
                   Swal.showLoading()
               }
           });
       }
    </script>    