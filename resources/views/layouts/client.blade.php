
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hhh</title>
    <!-- links -->
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- scripts -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body class="bg-[#FFE7C6]" >


    
    <header>
        @yield('header')
    </header>
    
    <!-- Main content -->
    <main class="w-11/12 m-auto mt-20 flex justify-evenly" >
        {{ $slot }}
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/client.js') }}"></script>
</body>
</html>

