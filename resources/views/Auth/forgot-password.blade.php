<x-visitor-layout>
<div class="p-5 mb-8 mt-20">
    <div class=" flex rounded-lg justify-center ">
        <!-- <div class=" hidden lg:block lg:w-1/2 bg-cover "
            style="background-image:url('{{asset('imgs/register.jpeg')}}')">
        </div> -->
        <div class="box " style="height: 350px;">
     
          <form action="{{route('forgetPassword')}}" method="post" autocomplete="off"  class=" bg-white px-10 py-4 rounded-md z-10 flex gap-8">        
            @csrf
            <p class=" text-black font-semibold text-center text-2xl">reset your password</p>
            <div>
            <div class="inputBox relative w-full ">           
              <input type="text" name="email" value="{{old('email')}}" required="required">
              <span>Email</span>
              <i class=" bg-gray-300 rounded-md"></i>
            </div>
            <x-error-input :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="links flex justify-between ">
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Remember your password?
                <a class="text-blue-600 decoration-2 hover:underline font-medium" href="/login">
                Login here
                </a>
            </div>
            <button type="submit" class="px-3 py-1 w-48 text-xl mx-auto bg-black rounded-md  focus:bg-gray-600 text-white ">
                Reset Password
            </button>
            
          </form>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/loginRegex.js') }}"></script>
</x-visitor-layout>
