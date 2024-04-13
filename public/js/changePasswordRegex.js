var changePassword = document.getElementById('changePassword');
var newPassword = document.getElementById('newPassword'); // Corrected ID
var repeatPassword = document.getElementById('reapetPassword'); // Corrected ID
var newPasswordHelp = document.getElementById('newPasswordRegex');
var repeatPasswordHelp = document.getElementById('reapetPasswordRegex');

const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

changePassword.addEventListener('submit', e => {
e.preventDefault();
var newPasswordValue = newPassword.value; // Corrected variable name
if (passwordRegex.test(newPasswordValue) && (newPasswordValue === repeatPassword.value)) {
    changePassword.submit();
}
});

repeatPassword.addEventListener('input', function(e) {
var currentValue = e.target.value;
var newPasswordValue = newPassword.value;

if(!(newPasswordValue === currentValue)){
    repeatPasswordHelp.style.display = 'block';
    repeatPassword.className = "focus:outline-none  bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
} else {
    repeatPasswordHelp.style.display = 'none';
    repeatPassword.className = "border  focus:outline-none  bg-green-100 border border-green-800 text-gray-700 placeholder-green-700 text-sm rounded-lg   block w-full p-2.5  ";
}
});

newPassword.addEventListener('input', function(e) {
var currentValue = e.target.value;
var valid = passwordRegex.test(currentValue);

if(!valid){
    newPasswordHelp.style.display = 'block';
    newPassword.className = "focus:outline-none  bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
} else {
    newPasswordHelp.style.display = 'none';
    newPassword.className = "border  focus:outline-none  bg-green-100 border border-green-800 text-gray-700 placeholder-green-700 text-sm rounded-lg   block w-full p-2.5  ";
}
});
