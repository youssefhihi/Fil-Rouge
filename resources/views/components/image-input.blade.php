

@props(['path'])


<div class="flex items-center mx-auto space-x-6">
    <div class="shrink-0">
        <img id='preview_img' src="{{$path}}" alt="image" {!! $attributes->merge(['class' => '']) !!}  />
    </div>
    <label class="block">
        <span class="sr-only">Choose profile photo</span>
        <input type="file" onchange="loadFile(event)" name="image" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-gray-200 file:text-black
                                    hover:file:bg-gray-300
                                "/>
    </label>
</div> 