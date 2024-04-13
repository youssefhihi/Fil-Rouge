
var editProfile = document.getElementById('editProfile');
var username = document.getElementById('username');
var fullName = document.getElementById('fullname');
var email = document.getElementById('email');
var usernameInputHelp = document.getElementById('usernameRegex');
var nameInputHelp = document.getElementById('nameRegex');
var emailInputHelp = document.getElementById('emailRegex');
const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
const nameRegex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

editProfile.addEventListener('submit', e => {
    e.preventDefault();
    if (nameRegex.test(fullName.value) && emailRegex.test(email.value) && usernameRegex.test(username.value)) {
        editProfile.submit();
    }
});

fullName.addEventListener('input', function (e) {
    var currentValue = e.target.value;
    var valid = nameRegex.test(currentValue);

    if (!valid) {
        nameInputHelp.style.display = 'block';
        fullName.className = "focus:outline-none bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
    } else {
        nameInputHelp.style.display = 'none';
        fullName.className = "border  focus:outline-none  bg-green-100 border border-green-800 text-gray-700 placeholder-green-700 text-sm rounded-lg   block w-full p-2.5 ";
    }
});

username.addEventListener('input', function (e) {
    var currentValue = e.target.value;
    var valid = usernameRegex.test(currentValue);
  
    if (!valid) {
        usernameInputHelp.style.display = 'block';
        username.className = "focus:outline-none bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
    } else {
        usernameInputHelp.style.display = 'none';
        username.className = " border  focus:outline-none  bg-green-100 border border-green-800 text-gray-700 placeholder-green-700 text-sm rounded-lg   block w-full p-2.5 ";
    }
});

email.addEventListener('input', function (e) {
    var currentValue = e.target.value;
    var valid = emailRegex.test(currentValue);

    if (!valid) {
        emailInputHelp.style.display = 'block';
        email.className = "focus:outline-none bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
    } else {
        emailInputHelp.style.display = 'none';
        email.className = "border  focus:outline-none  bg-green-100 border border-green-800 text-gray-700 placeholder-green-700 text-sm rounded-lg   block w-full p-2.5  ";
    }
});

