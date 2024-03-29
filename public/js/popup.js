var GenreForm = document.getElementById('genreForm');
var PutGenreForm = document.getElementById(`putGenreForm${id}`);
var PutGenre = document.getElementById(`putGenre${id}`);
var GenrePopup = document.getElementById('addGenre');
var GenreInput = document.getElementById('genre');
var DeleteGenreForm = document.getElementById('deleteForm');


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

  PutGenreForm.addEventListener('submit', e => {
    OpenUpdateGenre(id);
    e.preventDefault();
    if (genreRegex.test(PutGenre.value)) {
      PutGenreForm.submit();
    }
  });

  //  Name Error Check for Genre
  PutGenre.addEventListener('input', function(e) {
    var currentValue = e.target.value;
    console.log("Input value:", currentValue);
    var valid = genreRegex.test(currentValue);
  
    if(!valid){
      PutGenre.className = "border border-black dark:bg-red-50 dark:text-black focus:border-red-500 dark:focus:border-red-600 focus:border-red-500 dark:focus:border-red-600 px-3 py-2 rounded-md shadow-sm focus:outline-none";
    } else {
      PutGenre.className = " border border-black dark:bg-green-50 dark:text-black focus:border-green-500 dark:focus:border-green-600 focus:border-green-500 dark:focus:border-green-600 px-3 py-2 rounded-md shadow-sm focus:outline-none ";
    }
  })



 

    document.querySelectorAll('.deleteButton').forEach(button => {
        button.addEventListener('click', function() {
            const genreID = this.getAttribute('data-index');
            if (confirm("Are you sure you want to delete this item? ")) {
                document.getElementById('deleteForm' + genreID).submit();
            }
        });
    });







    function OpenUpdateGenre(id) {
      document.getElementById(`updateGenre${id}`).classList.remove('hidden');
      }
      
      function CloseUpdateGenre(id) {
      document.getElementById(`updateGenre${id}`).classList.add('hidden');
      }