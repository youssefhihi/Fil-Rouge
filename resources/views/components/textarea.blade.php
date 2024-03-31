@props(["name", "label"])

<div class="col-span-2">
    <label for="{{ $name }}" class="block capitalize mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <textarea id="{{ $name }}" rows="6" name="{{ $name }}"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
              placeholder="enter {{ $name }} here" >{{ old($name) }}</textarea>
</div>


<!-- 
<div class="bg-white p-4 rounded-lg">
    <div class="relative bg-inherit">
        <input type="text" id="username" name="username" class="peer bg-transparent h-10 w-72 rounded-lg text-gray-200 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Type inside me"/><label for="username" class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Type inside me</label>
    </div>
</div> -->