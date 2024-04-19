  //  show Popup for add Post
  function openAddPost(){
    document.getElementById('addPost').classList.remove('hidden');
  }
    //  close Popup for add Post
  function closeAddPost(){
    document.getElementById('addPost').classList.add('hidden');
  }



  function openSearch(){
    document.getElementById('SearchInput').classList.remove('hidden');
  }

  function closeSearch(){
    document.getElementById('SearchInput').classList.add('hidden');
  }



  

  document.querySelectorAll('.deletePostButton').forEach(button => {
    button.addEventListener('click', function() {
              const postID = this.getAttribute('data-index');
              if (confirm("Are you sure you want to delete this item? ")) {
                  document.getElementById('deletePost' + postID).submit();
              }
          });
      });
   // Define the function to toggle dropdown
   function toggleDropDown(id) {
          var dropdown = document.getElementById(`dropdownMenu${id}`);
          dropdown.classList.toggle('hidden');
  
          // Add event listeners to all dropdown buttons to close dropdowns when another button is clicked
          var buttons = document.querySelectorAll('.dots');
          buttons.forEach(function(button) {
              if (button.getAttribute('data-index') != id) {
                  button.addEventListener('click', function() {
                      dropdown.classList.add('hidden');
                  });
              }
          });
      }
      
