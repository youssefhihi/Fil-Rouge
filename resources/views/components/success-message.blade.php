
@if (session('success'))
    
<div {!! $attributes->merge(['class' => 'bg-green-100 text-green-800 pl-4 text-center pr-10 py-4 rounded relative']) !!} role="alert">
        <div class="inline-block max-sm:mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-green-500 inline mr-4" viewBox="0 0 512 512">
            <ellipse cx="256" cy="256" fill="#32bea6" data-original="#32bea6" rx="256" ry="255.832" />
            <path fill="#fff" d="m235.472 392.08-121.04-94.296 34.416-44.168 74.328 57.904 122.672-177.016 46.032 31.888z"
              data-original="#ffffff" />
          </svg>
          <strong class="font-bold text-base">Success!</strong>
        </div>
        <span class="block sm:inline text-sm mx-4 max-sm:ml-0 max-sm:mt-1">{{session('success')}}</span>
        
    </div>
@endif