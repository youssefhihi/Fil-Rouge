var GenreForm = document.getElementById('genreForm');
var GenrePopup = document.getElementById('addGenre');
var GenreInput = document.getElementById('genre');

function openAddGenre(){
  GenrePopup.classList.remove('hidden');
}

function closeAddGenre(){
  GenrePopup.classList.add('hidden');
}

const genreRegex = /^[A-Za-z\s-]+$/;
  GenreForm.addEventListener('submit', e => {
    e.preventDefault();
    if (genreRegex.test(GenreInput.value)) {
        GenreForm.submit();
    }
  });

  //  Name Error Check for Genre
GenreInput.addEventListener('input', function(e) {
    var currentValue = e.target.value;
    var valid = genreRegex.test(currentValue);
  
    if(!valid){
      GenreInput.className = "border border-black dark:bg-red-50 dark:text-black focus:border-red-500 dark:focus:border-red-600 focus:border-red-500 dark:focus:border-red-600 px-3 py-2 rounded-md shadow-sm focus:outline-none";
    } else {
      GenreInput.className = " border border-black dark:bg-green-50 dark:text-black focus:border-green-500 dark:focus:border-green-600 focus:border-green-500 dark:focus:border-green-600 px-3 py-2 rounded-md shadow-sm focus:outline-none ";
    }
  })