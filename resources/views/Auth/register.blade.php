<x-visitor-layout>
<div class=" w-full p-5 ">
    <div class=" flex rounded-lg justify-center ">
        <div class=" hidden lg:block lg:w-1/2 bg-cover"
            style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
        </div>
        <div class="Registerbox ">
     
          <form action="{{route('register')}}" method="post"  autocomplete="off" id="Registerform" class=" bg-white px-10 py-4 rounded-md z-10 flex gap-7">        
            @csrf
            @method('POST')
            <p class=" text-black font-semibold text-center text-2xl">Create Your Free Account</p>

            <button class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black relative">
              <span class="absolute left-4">
                <x-icon name="google"/>
              </span>
              <span>Sign in with Google</span>
            </button>
            <div class="text-xl text-center text-gray-500">
                __ OR __
            </div>
            <div>
            <div class="inputBox relative w-full ">                 
              <input type="text"  id="name" name="name"  required="required">
              <span>Full Name</span>
              <i id="namebox" class=" bg-gray-300 rounded-md"></i>
            </div>
            <x-error-input :messages="$errors->get('name')" class="mt-2" />
            <p id="nameRegex"class="hidden text-red-400 text-sm ">Invalid name (Stephen Gardner)</p>
            </div>
            <div class="">
              <div class="inputBox relative w-full "> 
                  <input type="text"  id="email" name="email"  required="required">
                  <span>Email</span>
                  <i id="RegisterEmailbox" class=" bg-gray-300 rounded-md"></i>
              </div>
              <x-error-input :messages="$errors->get('email')" class="mt-2" />
              <p id="emailRegex"class="hidden text-red-400 text-sm ">Invalid email (name@example.com)</p>
            </div>
            <div>
              <div class="inputBox relative w-full ">
                <input type="password" id="password" name="password" required="required">
                <span>Password</span>
                <i id="RegisterPasswordbox" class=" bg-gray-300 rounded-md"></i>
              </div>
              <x-error-input :messages="$errors->get('password')" class="mt-2" />
              <p id="passwordRegex"class="hidden text-red-400 text-sm "> the password must be at least 4 caracteres</p>
            </div>
            <div>
            <div class="inputBox relative w-full ">
              <input type="password" id="confirmPassword" name="password_confirmation" required="required">
              <span>Confirm Password</span>
              <i id="confirmPasswordbox" class=" bg-gray-300 rounded-md"></i>
            </div>
            <x-error-input :messages="$errors->get('password_confirmation')" class="mt-2" />
            <p id="confirmPasswordRegex"class="hidden text-red-400 text-sm ">password doesn't match</p>
            </div>
            <!-- <p id="passwordLoginRegex" class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">Invalid password format</p> -->
            <div class="links flex justify-between ">
              <p class="text-gray-500 text-sm ">Already have a account?<a href="#" class=" text-blue-600  hover:text-blue-800"> Log in</a></p>
            </div>
            <button type="submit" class="px-3 py-1 w-48 text-xl mx-auto bg-black rounded-md  focus:bg-gray-600 text-white ">
                Create Account
            </button>
            
          </form>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/signupRegex.js') }}"></script>

</x-visitor-layout>
