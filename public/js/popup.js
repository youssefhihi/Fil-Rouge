  //  show Popup for add genre
function openAddGenre(){
  GenrePopup.classList.remove('hidden');
}
  //  close Popup for add genre
function closeAddGenre(){
  GenrePopup.classList.add('hidden');
}

//  regex for genre input to add new genre
var GenreForm = document.getElementById('genreForm');
var GenrePopup = document.getElementById('addGenre');
var GenreInput = document.getElementById('genre');
var messageError = document.getElementById('messageError');

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
    messageError.style.display = 'block';
    GenreInput.className = "border border-black dark:bg-red-50 dark:text-black focus:border-red-500 dark:focus:border-red-600 focus:border-red-500 dark:focus:border-red-600 px-3 py-2 rounded-md shadow-sm focus:outline-none";
  } else {
    messageError.style.display = 'none';
    GenreInput.className = " border border-black dark:bg-green-50 dark:text-black focus:border-green-500 dark:focus:border-green-600 focus:border-green-500 dark:focus:border-green-600 px-3 py-2 rounded-md shadow-sm focus:outline-none ";
  }
})

//  regex for genre input to update new genre

document.querySelectorAll('[id^="putGenreForm"]').forEach(form => {
  form.addEventListener('submit', function(event) {
    const genreID = this.getAttribute('id').replace('putGenreForm', '');
    OpenUpdateGenre(genreID);
    event.preventDefault();
    const putGenreInput = document.getElementById(`putGenre${genreID}`);
    if (genreRegex.test(putGenreInput.value)) {
      this.submit();
    }
  });
});

document.querySelectorAll('[id^="putGenre"]').forEach(input => {
  input.addEventListener('input', function(event) {
      var currentValue = this.value;
      var valid = genreRegex.test(currentValue);
      var errorMessage = document.getElementById('putMessageError' + this.dataset.genreId); // Use dataset.genreId instead of dataset.genreID
      if (!valid) {
          errorMessage.style.display = 'block'; // Show error message
          this.classList.remove('dark:bg-green-50', 'dark:text-black', 'focus:border-green-500', 'dark:focus:border-green-600', 'focus:border-green-500', 'dark:focus:border-green-600', 'px-3', 'py-2', 'rounded-md', 'shadow-sm', 'focus:outline-none');
          this.classList.add('border-red-500', 'dark:bg-red-50', 'dark:text-black', 'focus:border-red-500', 'dark:focus:border-red-600', 'focus:border-red-500', 'dark:focus:border-red-600', 'px-3', 'py-2', 'rounded-md', 'shadow-sm', 'focus:outline-none');
      } else {
          errorMessage.style.display = 'none'; // Hide error message
          this.classList.remove('border-red-500', 'dark:bg-red-50', 'dark:text-black', 'focus:border-red-500', 'dark:focus:border-red-600', 'focus:border-red-500', 'dark:focus:border-red-600', 'px-3', 'py-2', 'rounded-md', 'shadow-sm', 'focus:outline-none');
          this.classList.add('dark:bg-green-50', 'dark:text-black', 'focus:border-green-500', 'dark:focus:border-green-600', 'focus:border-green-500', 'dark:focus:border-green-600', 'px-3', 'py-2', 'rounded-md', 'shadow-sm', 'focus:outline-none');
      }
  });
});








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