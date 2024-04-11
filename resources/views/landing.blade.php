<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


</head>
<body>

        <!-- component -->
<section class="h-screen bg-gray-50 flex items-center">
	<div class="w-full bg-cover bg-center py-32" style="background-image: url('https://source.unsplash.com/random');">
		<div class="container mx-auto text-center text-white">
			<h1 class="text-5xl font-medium font-normal mb-6">Now In Morroco</h1>
			<p class="text-xl mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <button class="relative px-8 py-2 rounded-xl bg-white isolation-auto z-10 border-2 border-red-500 text-red-600 hover:text-white font-normal font-semibold
                    before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-right-full before:hover:right-0 before:rounded-full  before:bg-red-600 before:-z-10  before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700">Join Us</button>                </div>
		</div>
	</div>
</section>
  
<section class="container flex flex-col px-6 py-4 mx-auto space-y-6 md:h-128 md:py-16 md:flex-row md:items-center md:space-x-10">
    <div class="flex items-center justify-center w-full h-96 md:w-1/2">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative animate-bounce h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($books as $book )            
                        <div class=" hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('storage/' . $book->image->path)}}" class="home__image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2  w-60 md:w-full" alt="...">
                        </div>
                        @endforeach      
                    </div>   
                </div>
    </div>
        <div class="max-w-lg md:mx-12 md:order-2">
                <p class="mt-4 text-gray-600 text-xl ">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut quia asperiores alias vero magnam recusandae adipisci ad vitae laudantium quod rem voluptatem eos accusantium cumque.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut quia asperiores alias vero magnam recusandae adipisci ad vitae laudantium quod rem voluptatem eos accusantium cumque.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut quia asperiores alias vero magnam recusandae adipisci ad vitae laudantium quod rem voluptatem eos accusantium cumque.
                </p>
                <div class="mt-6 flex justify-end">
                </div>
                </div>


</section>
   



</body>
</html>