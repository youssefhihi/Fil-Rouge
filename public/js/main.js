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

function updateCurrentTime() {
  var now = new Date();
  
  var formattedDate = ('0' + now.getDate()).slice(-2) + '/' + ('0' + (now.getMonth() + 1)).slice(-2) + '/' + now.getFullYear();
  var formattedTime = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
  
  document.getElementById('current-time').textContent = formattedDate + ' ' + formattedTime;
}
setInterval(updateCurrentTime, 1000);
updateCurrentTime();


