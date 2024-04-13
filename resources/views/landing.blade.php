<x-visitor-layout>
      
        <!-- component -->
<section id="home" class="h-screen  flex items-center mt-5">
	<div class="w-full bg-cover bg-center py-32" style="background-image: url('{{asset('imgs/background.jpeg')}}');">
		<div class="container mx-auto text-center text-white">
			<h1 class="text-5xl font-medium font-normal mb-6">Now In Morroco</h1>
			<p class="text-xl mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <button class="relative px-8 py-2 rounded-xl backdrop-filter backdrop-blur-md isolation-auto z-10 border-2 border-red-500 text-red-600 hover:text-white font-normal font-semibold
                    before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-right-full before:hover:right-0 before:rounded-full  before:bg-red-600 before:-z-10  before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700">Join Us</button>                </div>
		</div>
	</div>
</section>
  

<section id="about" class="2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4 ">
            <div class="flex flex-col lg:flex-row justify-between gap-8">
                <div class="w-full lg:w-5/12 flex flex-col justify-center">
                    <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-red-600 pb-4">About Us</h1>
                    <p class="font-normal  text-white leading-6 text-lg  ">At our library, we're more than just a collection of books and shelves. We're a dynamic center of knowledge, innovation, and community engagement. With a diverse range of resources, from traditional printed materials to cutting-edge digital content, we cater to the needs and interests of all our patrons. Our passionate staff members are dedicated to providing personalized assistance and fostering a welcoming environment where curiosity thrives. From educational programs and workshops to cultural events and discussions. Join us on a journey of exploration and discovery as we celebrate the joy of lifelong learning together.</p>
                    <div class="flex justify-start mt-5">
                        <button
                            class="inline-block py-2 px-6 rounded-l-xl rounded-t-xl bg-red-600 hover:bg-white hover:text-red-600 focus:text-red-600 focus:bg-red-300 text-white font-bold leading-loose transition duration-200"
                            >
                            read More
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-7/12 p-10 ">
                    <img class="w-full h-[27rem] rounded-2xl" src="{{asset('imgs/aboutUs.jpeg')}}" alt="A group of People" />
                </div>
            </div>
    
        
</section>

<section id="service" class="  py-10 ">
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-2xl text-red-600 font-bold leading-tight text-gray-900 sm:text-4xl xl:text-5xl">
        Our Service </h2>
      <p class="mt-4 text-base leading-7 text-white sm:mt-8">
        At [Library Name], we offer a wide range of services designed to meet the diverse needs of our community.
      </p>
    </div>
    <div
      class="grid grid-cols-1 text-center sm:mt-16 sm:grid-cols-2 sm:gap-x-12 gap-y-12 md:grid-cols-3 md:gap-0 ">
      <!-- Feature 1 -->
      <div class="md:p-8 lg:p-10 flex flex-col justify-center items-center">
        <div class="w-10 h-10 rounded-full bg-purple-200 flex justify-center items-center">
          <i class="fa-solid fa-chart-column text-3xl text-gray-900"></i>
        </div>
        <h3 class="mt-8 text-xl font-bold text-gray-900">Online Book Catalog</h3>
        <p class="mt-5 text-base text-gray-600">Access to an extensive collection of books, including fiction, non-fiction, academic, and reference materials, with easy search and filter options to find desired books quickly.</p>
      </div>

      <!-- Feature 2 -->
      <div class="md:p-8 lg:p-10 md:border-l md:border-red-300 flex flex-col justify-center items-center">
        <div class="w-10 h-10 rounded-full bg-teal-200 flex justify-center items-center">
          <i class="fa-solid fa-truck-fast text-3xl text-gray-900"></i>
        </div>
        <h3 class="mt-8 text-xl font-bold text-gray-900">E-Lending Services</h3>
        <p class="mt-5 text-base text-gray-600">Explore our vast collection of books covering a variety of topics and genres. From fiction to non-fiction, scholarly articles to popular magazines, there's something for every interest and age group.</p>
      </div>

      <!-- Feature 3 -->
      <div class="md:p-8 lg:p-10 md:border-l md:border-red-300 flex flex-col justify-center items-center">
        <div class="w-10 h-10 rounded-full bg-yellow-200 flex justify-center items-center">
          <i class="fa-solid fa-shield text-3xl text-gray-900"></i>
        </div>
        <h3 class="mt-8 text-xl font-bold text-gray-900">Security First</h3>
        <p class="mt-5 text-base text-gray-600">Ensure the safety of your data with top-notch security features. Your
          privacy is our priority.</p>
      </div>

      <!-- Feature 4 -->
      <div class="md:p-8 lg:p-10 md:border-t md:border-red-300 flex flex-col justify-center items-center">
        <div class="w-10 h-10 rounded-full bg-red-200 flex justify-center items-center">
          <i class="fa-solid fa-cloud text-3xl text-gray-900"></i>
        </div>
        <h3 class="mt-8 text-xl font-bold text-gray-900">Cloud Integration</h3>
        <p class="mt-5 text-base text-gray-600">Access your data from anywhere with seamless cloud integration. Work
          without boundaries.</p>
      </div>

      <!-- Feature 5 -->
      <div class="md:p-8 lg:p-10 md:border-l md:border-red-300 md:border-t flex flex-col justify-center items-center">
        <div class="w-10 h-10 rounded-full bg-green-200 flex justify-center items-center">
          <i class="fa-solid fa-pen-nib text-3xl text-gray-900"></i>
        </div>
        <h3 class="mt-8 text-xl font-bold text-gray-900">Task Management</h3>
        <p class="mt-5 text-base text-gray-600">Organize your workflow with efficient task management features. Stay on
          top of your projects effortlessly.</p>
      </div>

      <!-- Feature 6 -->
      <div class="md:p-8 lg:p-10 md:border-l md:border-red-300 md:border-t flex flex-col justify-center items-center">
        <div class="w-10 h-10 rounded-full bg-orange-200 flex justify-center items-center">
          <i class="fa-solid fa-bolt text-3xl text-gray-900"></i>
        </div>
        <h3 class="mt-8 text-xl font-bold text-gray-900">Performance Metrics</h3>
        <p class="mt-5 text-base text-gray-600">Monitor and measure your performance with comprehensive metrics.
          Optimize your processes for maximum efficiency.</p>
      </div>
    </div>
  </div>
</section>

<section>
<div class="2xl:mx-auto 2xl:container mx-4 py-16">
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
  <div class="w-full relative flex items-center justify-center">
    <img src="{{asset('imgs/background.jpg')}}" alt="dining" class="w-full h-full absolute z-0 hidden sm:block" />
    <img src="{{asset('imgs/contact.jpeg')}}" alt="dining" class="w-full h-full absolute z-0 sm:hidden" />
    <form class="bg-black bg-opacity-35 rounded-xl md:my-16 lg:py-16 py-10 w-full md:mx-24 md:px-12 px-4 flex flex-col items-center justify-center relative z-10">
      <h1 class="text-4xl font-semibold leading-9 text-white text-center">Don’t miss out!</h1>
      <p class="text-base leading-normal text-center text-white mt-6">
        Subscribe to your newsletter to stay in the loop. Our newsletter is sent once in <br />
        a week on every friday so subscribe to get latest news and updates.
      </p>
      <div class="sm:border border-white rounded-xl flex-col sm:flex-row flex items-center lg:w-5/12 w-full mt-12 space-y-4 sm:space-y-0">
        <input class="border border-white sm:border-transparent text-base w-full font-medium leading-none text-white p-4 focus:outline-none bg-transparent placeholder-white" placeholder="Email Address" />
        <button class="focus:outline-none md:rounded-r-xl focus:ring-offset-2 focus:ring border border-white sm:border-transparent w-full sm:w-auto bg-white py-4 px-6 hover:bg-opacity-75">Subscribe</button>
      </div>
    </form>
  </div>
</div>
</section>

<div class="max-w-screen-xl  px-16  min-h-sceen mb-16">
	<div class="flex flex-col items-right">
		<h2 class="font-bold underline text-red-600 text-5xl mt-5 tracking-tight">
			FAQ
		</h2>
		<p class="text-white text-xl mt-3">
			Frequenty asked questions
		</p>
	</div>
	<div class="grid divide-y divide-neutral-200 max-w-xl mt-8">	
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> Can I try this platform for free?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					We offers a free trial of its  platform for a limited time. During the trial period,
					you will have access to a limited set of features and functionality, but you will not be charged.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> How do I access   documentation?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					  Documentation is available on the company's website and can be accessed by
					logging in to your account. The documentation provides detailed information on how to use the ,
					as well as code examples and other resources.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> How do I contact support?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					If you need help with the platform or have any other questions, you can contact the
					company's support team by submitting a support request through the website or by emailing
					support@We.com.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> Do you offer any discounts or promotions?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					We may offer discounts or promotions from time to time. To stay up-to-date on the latest
					deals and special offers, you can sign up for the company's newsletter or follow it on social media.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> How do we compare to other similar services?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					 This platform is a highly reliable and feature-rich service that offers a wide range
					of tools and functionality. It is competitively priced and offers a variety of billing options to
					suit different needs and budgets.
				</p>
			</details>
		</div>
	</div>
</div>


</x-visitor-layout>
