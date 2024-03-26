// ------------------------------------Login Form-----------------------------------------------

var loginForm = document.getElementById('loginForm');
var loginEmail = document.getElementById('loginEmail');
var loginPassword = document.getElementById('loginPassword');
var passwordBox = document.getElementById('passwordbox');
var emailBox = document.getElementById('emailbox');

// error messages variables
var EmailLoginHelp = document.getElementById('emailLoginRegex');
var PasswordLoginHelp = document.getElementById('passwordLoginRegex');

const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;
// Login Form Submit function
loginForm.addEventListener('submit', e => {
  e.preventDefault();
  console.log("hi");
  var passwordLoginValue = loginPassword.value;
  if (EmailRegex.test(loginEmail.value) && PasswordRegex.test(passwordLoginValue)) {
    loginForm.submit();
  }
});


// Email Error Check for Login
loginEmail.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailLoginHelp.style.display = 'block';
    emailBox.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    EmailLoginHelp.style.display = 'none';
    emailBox.className = "shadow-sm bg-green-200 rounded-md border border-green-700 rounded-lg ";
  }
})

// Password Error Check for Login
loginPassword.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordLoginHelp.style.display = 'block';
    passwordBox.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    PasswordLoginHelp.style.display = 'none';
    passwordBox.className = "shadow-sm bg-green-200 rounded-md border border-green-700 rounded-lg ";
  }
})
