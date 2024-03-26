// ------------------------------------Sign Up Form-----------------------------------------------
var Registerform = document.getElementById('Registerform');
var fullName = document.getElementById('name');
var email = document.getElementById('email');
var password = document.getElementById('password');
var repeatPassword = document.getElementById('confirmPassword');
var RegisterPasswordBox = document.getElementById('RegisterPasswordbox');
var RegisterEmailBox = document.getElementById('RegisterEmailbox');
var nameBox = document.getElementById('namebox');
var confirmPasswordBox = document.getElementById('confirmPasswordbox');


// error messages variables

var FullNameInputHelp = document.getElementById('nameRegex');
var EmailInputHelp = document.getElementById('emailRegex');
var PasswordInputHelp = document.getElementById('passwordRegex');
var ReapeatPasswordInputHelp = document.getElementById('confirmPasswordRegex');

// Regex values

const NameRegex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;

// Submit only after all values are correct function

Registerform.addEventListener('submit', e => {
  e.preventDefault();
  var passwordValue = password.value;
  if(NameRegex.test(fullName.value) && EmailRegex.test(email.value) && PasswordRegex.test(passwordValue) && (passwordValue === repeatPassword.value)){
    Registerform.submit();
  }
})

// Full Name Error  Check

fullName.addEventListener('input', function(e) { 
  var currentValue = e.target.value;
  var valid = NameRegex.test(currentValue);

  if(!valid){
    FullNameInputHelp.style.display = 'block';
    nameBox.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    FullNameInputHelp.style.display = 'none';
    nameBox.className = "shadow-sm bg-green-200 rounded-md border border-green-700 rounded-lg ";
  }
})

// Email Error Check

email.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailInputHelp.style.display = 'block';
    RegisterEmailBox.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    EmailInputHelp.style.display = 'none';
    RegisterEmailBox.className = "shadow-sm bg-green-200 rounded-md border border-green-700 rounded-lg ";
  }
})

// Password Error Check

password.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordInputHelp.style.display = 'block';
    RegisterPasswordBox.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    PasswordInputHelp.style.display = 'none';
    RegisterPasswordBox.className = "shadow-sm bg-green-200 rounded-md border border-green-700 rounded-lg ";
  }
})

// Password Repeat Match Check

repeatPassword.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var passwordValue = password.value;

  if(!(passwordValue === currentValue)){
    ReapeatPasswordInputHelp.style.display = 'block';
    confirmPasswordBox.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    ReapeatPasswordInputHelp.style.display = 'none';
    confirmPasswordBox.className = "shadow-sm bg-green-200 rounded-md border border-green-700 rounded-lg ";
  }
})


