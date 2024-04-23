
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hhh</title>
    <!-- links -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- scripts -->
    <script src="https://kit.fontawesome.com/7d35781f0a.js" crossorigin="anonymous"></script> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    

</head>
<body class="bg-gray-200" >


    <x-client.navbar page="profile" /> 
<div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">             
                            <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                @if (Auth::user()->client->image)
                                        <img id='preview_img' class="h-28 w-28 rounded-full" src="{{ asset('storage/'. Auth::user()->client->image->path) }}" alt="">                                                
                                @else
                                    @if (Auth::user()->client->gender === 'female')
                                        <img id='preview_img' class="h-28 w-28 rounded-full" src="{{ asset('imgs/profileFemale.png') }}" alt="">                                                
                                    @else                                 
                                        <img id='preview_img' class="h-28 w-28 rounded-full" src="{{ asset('imgs/profileMale.png') }}" alt="">                                                
                                    @endif
                                @endif                             
                            </div>
                            @if (Auth::user()->client->image)
                            <form  method="POST" action="{{route('updateImage')}}" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" onchange="loadFile(event)" name="image"  class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-gray-200 file:text-black
                                    hover:file:bg-gray-300
                                "/>
                                </label>
                                <x-error-input class="mt-2" :messages="$errors->get('image')" />
                                <button type="submit" class="bg-black w-full mt-4  text-white px-3 rounded-xl">save</button>
                            </form>
                            <form action="{{ route('deleteImage') }}" method="post" onsubmit="return confirm('Are you sure you want to delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-xl">Delete</button>
                            </form>
                            @else
                            <form method="POST" action="{{route('uploadImage')}}" enctype="multipart/form-data" class="flex space-x-10 ">
                                @csrf
                                @method('POST')
                                <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" onchange="loadFile(event)" name="image"  class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-gray-200 file:text-black
                                    hover:file:bg-gray-300
                                "/>
                                </label>
                                <x-error-input class="mt-2" :messages="$errors->get('image')" />
                                <button type="submit" class="bg-black text-white px-3 rounded-xl">save</button>
                            </form>
                            @endif
                           

                            </div> 
                            </div>
                            <hr class="border-light m-0">
                            <form id="editProfile" method="POST" action="{{route('profile.update')}}"  class="card-body">
                            @csrf
                            @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input id="username" type="text" name="username" class="form-control focus:outline-none" value="{{Auth::user()->username}}">
                                    <p id="usernameRegex" class="hidden text-red-400 border-b-2 border-red-500 font-mono pl-3">Invalid username format</p>
                                    <x-error-input :messages="$errors->get('username')" class="mt-2" />
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input id="fullname" type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                    <p id="nameRegex" class="hidden text-red-400 text-sm">Invalid name (Stephen Gardner)</p>
                                    <x-error-input :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input id="email" type="text" name="email" class="form-control mb-1" value="{{Auth::user()->email}}">
                                    <p id="emailRegex" class="hidden text-red-400 text-sm">Invalid email (name@example.com)</p>
                                    <x-error-input :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="flex justify-end w-full">
                                <button type="submit"class="cursor-pointer  mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                </div>
                               
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            
                        <div id="msgError" class=" hidden flex m-5 bg-red-100 text-red-800 pl-4 text-center pr-10 py-4 rounded relative" role="alert">
                            <div class="inline-block max-sm:mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 inline mr-4" viewBox="0 0 32 32">
                                <path
                                d="M16 1a15 15 0 1 0 15 15A15 15 0 0 0 16 1zm6.36 20L21 22.36l-5-4.95-4.95 4.95L9.64 21l4.95-5-4.95-4.95 1.41-1.41L16 14.59l5-4.95 1.41 1.41-5 4.95z"
                                data-original="#ea2d3f" />
                            </svg>
                            <strong class="font-bold text-base">Error!</strong>
                            </div>
                            <span id="error" class="block sm:inline text-sm mx-4 max-sm:ml-0 max-sm:mt-1"></span>                         
                        </div>
                        <div id="msg" class = " hidden flex bg-green-100 m-5 text-green-800 pl-4 text-center pr-10 py-4 rounded relative" role="alert">
                            <div class="inline-block max-sm:mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-green-500 inline mr-4" viewBox="0 0 512 512">
                                <ellipse cx="256" cy="256" fill="#32bea6" data-original="#32bea6" rx="256" ry="255.832" />
                                <path fill="#fff" d="m235.472 392.08-121.04-94.296 34.416-44.168 74.328 57.904 122.672-177.016 46.032 31.888z"
                                data-original="#ffffff" />
                            </svg>
                            <strong class="font-bold text-base">Success!</strong>
                            </div>
                            <span id="success" class="block sm:inline text-sm mx-4 max-sm:ml-0 max-sm:mt-1"></span>
                            
                        </div>
                            <form id="changePassword" method="post"  class="card-body pb-2">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input name="current_password" type="password" class="form-control">
                                    <x-error-input :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input id="newPassword" name="password" type="password" class="form-control">
                                    <p id="newPasswordRegex" class="hidden text-red-400 text-sm">Password must contain at least 8 characters, including uppercase letters, lowercase letters, numbers, and special characters.</p>
                                    <x-error-input :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input id="reapetPassword" name="password_confirmation" type="password" class="form-control">
                                    <p id="reapetPasswordRegex" class="hidden text-red-400 text-sm">Passwords do not match.</p>
                                    <x-error-input :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex justify-end w-full">
                                <button type="submit" onclick="changePassword(this)" class="cursor-pointer  mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                </div>
                            </form >
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <form method="POST" action="{{route('profile.updateInf')}}" class="card-body pb-2">
                                @csrf
                                @method('PATCH')
                                <div class="col-span-2">
                                    <label for="bio" class="block capitalize mb-2 text-sm font-medium text-gray-900">Bio</label>
                                    <textarea id="bio" rows="6" name="bio"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="enter bio here" >{{Auth::user()->client->bio}}</textarea>
                                </div>
                                <x-error-input class="mt-2" :messages="$errors->get('bio')" />
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="custom-select">
                                        <option value="male" {{Auth::user()->client->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female"  {{Auth::user()->client->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <x-error-input class="mt-2" :messages="$errors->get('gender')" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="date" name="birthday" class="form-control" value="{{Auth::user()->client->birthday}}">
                                    <x-error-input class="mt-2" :messages="$errors->get('birthady')" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <select name="city" class="custom-select">
                                        <option value="safi">Safi</option>
                                        <option >marrackech</option>
                                        <option>Rabat</option>
                                        <option>casa</option>
                                        <option>tangier</option>
                                    </select>
                                    <x-error-input class="mt-2" :messages="$errors->get('city')" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" name="phone" class="form-control" value="{{Auth::user()->client->phone}}">
                                    <x-error-input class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                                <div class="flex justify-end w-full">
                                <button type="submit"class="cursor-pointer  mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <form   method="POST" action="{{route('socialeMedia')}}"  class="card-body pb-2">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label">X</label>
                                    <input type="url" name="X" class="form-control" value="{{Auth::user()->client->X}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="url" name="facebook" class="form-control" value="{{Auth::user()->client->facebook}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="url" name="linkedIn" class="form-control" value="{{Auth::user()->client->linkedIn}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="url" name="instagram" class="form-control" value="{{Auth::user()->client->instagram}}">
                                </div>
                                <div class="flex justify-end w-full">
                                <button type="submit"class="cursor-pointer  mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                </div>
                            </form>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <style>
        body {
    background: #f5f5f5;
    margin-top: 20px;
}

.ui-w-80 {
    width : 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24, 28, 33, 0.1);
    background  : rgba(0, 0, 0, 0);
    color       : #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background  : transparent;
    color       : #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0, 0, 0, 0);
    background  : #3B5998;
    color       : #fff;
}

.btn-instagram {
    border-color: rgba(0, 0, 0, 0);
    background  : #000;
    color       : #fff;
}

.card {
    background-clip: padding-box;
    box-shadow     : 0 1px 4px rgba(24, 28, 33, 0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position  : absolute;
    visibility: hidden;
    width     : 1px;
    height    : 1px;
    opacity   : 0;
}

.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}

html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}

.account-settings-multiselect~.select2-container {
    width: 100% !important;
}

.light-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.material-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.dark-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}

.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}

.light-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
    </style>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset('js/editProfileRegex.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/changePasswordRegex.js') }}"></script>

  
    <script>
function changePassword(button) {
    var form = $(button).closest('form');
    $.ajax({
        url: "{{ route('password') }}",
        method: 'PATCH',
        data: form.serialize(), 
        success: function (result) {
            $('#msg').removeClass('hidden')
            $('#success').css('display','block');
            jQuery('#success').html(result.success);
            jQuery(form)[0].reset();  
        },
        error: function (xhr, status, error) {
            $('#msgError').removeClass('hidden')
            $('#error').css('display','block');
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                var errorsHtml = '<ul>';
                $.each(xhr.responseJSON.errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul>';
                jQuery('#error').html(errorsHtml);
            } else {
                jQuery('#error').html('An error occurred. Please try again later.');
            }         
            jQuery(form)[0].reset();  
        }
    });
}

</script>
</body>
</html>