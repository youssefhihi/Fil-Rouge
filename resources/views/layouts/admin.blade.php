
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hhh</title>
    <!-- links -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- scripts -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script> 
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-admin.sideBar /> 
    
    <!-- Main content -->
    <main class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        {{ $slot }}
    </main>
    
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

