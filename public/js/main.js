const sidebar = document.querySelector("aside");
const maxSidebar = document.querySelector(".max")
const miniSidebar = document.querySelector(".mini")
const roundout = document.querySelector(".roundout")
const maxToolbar = document.querySelector(".max-toolbar")
const logo = document.querySelector('.logo')
const content = document.querySelector('.content')
const moon = document.querySelector(".moon")
const sun = document.querySelector(".sun")

function setDark(val){
    if(val === "dark"){
        document.documentElement.classList.add('dark')
        moon.classList.add("hidden")
        sun.classList.remove("hidden")
    }else{
        document.documentElement.classList.remove('dark')
        sun.classList.add("hidden")
        moon.classList.remove("hidden")
    }
}

function openNav() {
    if(sidebar.classList.contains('-translate-x-48')){
        // max sidebar 
        sidebar.classList.remove("-translate-x-48")
        sidebar.classList.add("translate-x-none")
        maxSidebar.classList.remove("hidden")
        maxSidebar.classList.add("flex")
        miniSidebar.classList.remove("flex")
        miniSidebar.classList.add("hidden")
        maxToolbar.classList.add("translate-x-0")
        maxToolbar.classList.remove("translate-x-24","scale-x-0")
        logo.classList.remove("ml-12")
        content.classList.remove("ml-12")
        content.classList.add("ml-12","md:ml-60")
    }else{
        // mini sidebar
        sidebar.classList.add("-translate-x-48")
        sidebar.classList.remove("translate-x-none")
        maxSidebar.classList.add("hidden")
        maxSidebar.classList.remove("flex")
        miniSidebar.classList.add("flex")
        miniSidebar.classList.remove("hidden")
        maxToolbar.classList.add("translate-x-24","scale-x-0")
        maxToolbar.classList.remove("translate-x-0")
        logo.classList.add('ml-12')
        content.classList.remove("ml-12","md:ml-60")
        content.classList.add("ml-12")

    }

}



// const uploadInput = document.getElementById('upload');
// const filenameLabel = document.getElementById('filename');
// const imagePreview = document.getElementById('image-preview');

// // Check if the event listener has been added before
// let isEventListenerAdded = false;

// uploadInput.addEventListener('change', (event) => {
//   const file = event.target.files[0];

//   if (file) {
//     filenameLabel.textContent = file.name;

//     const reader = new FileReader();
//     reader.onload = (e) => {
//       imagePreview.innerHTML =
//         `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
//       imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

//       // Add event listener for image preview only once
//       if (!isEventListenerAdded) {
//         imagePreview.addEventListener('click', () => {
//           uploadInput.click();
//         });

//         isEventListenerAdded = true;
//       }
//     };
//     reader.readAsDataURL(file);
//   } else {
//     filenameLabel.textContent = '';
//     imagePreview.innerHTML =
//       `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
//     imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

//     // Remove the event listener when there's no image
//     imagePreview.removeEventListener('click', () => {
//       uploadInput.click();
//     });

//     isEventListenerAdded = false;
//   }
// });

// uploadInput.addEventListener('click', (event) => {
//   event.stopPropagation();
// });
{/* <div id="image-preview" class="w-1/2 p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                        <input id="upload" type="file" name="image" class="hidden" />
                        <label for="upload" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG and PNG</b> format.</p>
                                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                            </label>
                        </div>     */}

var loadFile = function(event) {
            
  var input = event.target;
  var file = input.files[0];
  var type = file.type;

 var output = document.getElementById('preview_img');


  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
  }
};




document.querySelectorAll('.deleteButtonAuthor').forEach(button => {
  button.addEventListener('click', function() {
      console.log("Delete button clicked!");
      const authorID = this.getAttribute('data-index');
      if (confirm("Are you sure you want to delete this item? ")) {
          document.getElementById('deleteFormAuthor' + authorID).submit();
      }
  });
});

//  regex for author input to add new author
var authorForm = document.getElementById('authorForm');
var authorInput = document.getElementById('author');
var messageError = document.getElementById('messageError');

const authorRegex = /^[A-Za-z\s-]+$/;
authorForm.addEventListener('submit', e => {
  e.preventDefault();
  if (authorRegex.test(authorInput.value)) {
    authorForm.submit();
  }
});

//  Name Error Check for author
authorInput.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = authorRegex.test(currentValue);
  
  if(!valid){
    messageError.style.display = 'block';
    authorInput.className = "border border-black dark:bg-red-50 dark:text-black focus:border-red-500 dark:focus:border-red-600 focus:border-red-500 dark:focus:border-red-600 px-3 py-2 rounded-md shadow-sm focus:outline-none";
  } else {
    messageError.style.display = 'none';
    authorInput.className = " border border-black dark:bg-green-50 dark:text-black focus:border-green-500 dark:focus:border-green-600 focus:border-green-500 dark:focus:border-green-600 px-3 py-2 rounded-md shadow-sm focus:outline-none ";
  }
})
