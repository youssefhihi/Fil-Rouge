<x-visitor-layout>
<div class="card w-full p-5 ">
    <div class=" flex rounded-lg justify-center">
        <div class=" hidden lg:block lg:w-1/2 bg-cover"
            style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
        </div>
        <div class="box ">
     
          <form action="{{route('login')}}" method="post" autocomplete="off" id="loginForm" class=" bg-white px-10 py-4 rounded-md z-10 flex gap-8">        
            @csrf
            <p class=" text-black font-semibold text-center text-2xl">Login to your Account</p>

            <a  href="{{route('google-auth')}}" class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black relative">
              <span class="absolute left-4">
                <x-icon name="google"/>
              </span>
              <span>Sign in with Google</span>
            </a>
            <div class="text-xl text-center text-gray-500">
                __ OR __
            </div>
            <div>
            <div class="inputBox relative w-full ">           
              <input type="text"  id="loginEmail" name="email" value="{{old('email')}}" required="required">
              <span>Email</span>
              <i id="emailbox" class=" bg-gray-300 rounded-md"></i>
            </div>
            <x-error-input :messages="$errors->get('email')" class="mt-2" />
              <p id="emailLoginRegex"class="hidden text-red-400 text-sm ">email invalid</p>
            </div>
            <div>
            <div class="inputBox relative w-full ">
              <input type="password" id="loginPassword" name="password" required="required">
              <span>Password</span>
              <i id="passwordbox" class=" bg-gray-300 rounded-md"></i>
            </div>
            <p id="passwordLoginRegex"class="hidden text-red-400 text-sm ">password doesn't match</p>
            <x-error-input :messages="$errors->get('password')" class="mt-2" />
          </div>
            <div class="links flex justify-between ">
              <p class="text-gray-500 text-sm ">You don’t have an account? <a href="#" class=" text-blue-600  hover:text-blue-800">Signup For free</a></p>
              <a href="#" class="text-gray-500 text-sm hover:text-blue-600">Forgot Password ?</a>

            </div>
            <button type="submit" class="px-3 py-1 w-48 text-xl mx-auto bg-black rounded-md  focus:bg-gray-600 text-white ">
                Login
            </button>
            
          </form>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/loginRegex.js') }}"></script>
</x-visitor-layout>
