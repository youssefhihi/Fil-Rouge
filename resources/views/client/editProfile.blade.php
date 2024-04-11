
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
<body class="bg-[#FFE7C6]" >


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
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
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
                            <form method="POST" action="{{route('updateImage')}}" enctype="multipart/form-data">
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
                                <button type="submit">okkk</button>
                            </form>
                                
                            @else
                            <form method="POST" action="{{route('uploadImage')}}" enctype="multipart/form-data">
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
                                <button type="submit">ooook</button>
                            </form>
                            @endif
                            <form action="{{ route('deleteImage') }}" method="post" onsubmit="return confirm('Are you sure you want to delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-xl">Delete</button>
                            </form>

                            </div> 
                            </div>
                            <hr class="border-light m-0">
                            <form method="POST" action="{{route('profile.update')}}"  class="card-body">
                            @csrf
                            @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control mb-1" value="{{Auth::user()->username}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="{{Auth::user()->email}}">
                                </div>
                                <div class="flex justify-end w-full">
                                <button type="submit"class="cursor-pointer  mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" value="Company Ltd.">
                                </div> -->
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <form method="post" action="{{ route('password') }}" class="card-body pb-2">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input name="current_password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input name="password_confirmation" type="password" class="form-control">
                                </div>
                                <div class="flex justify-end w-full">
                                <button type="submit"class="cursor-pointer  mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
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
                        
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
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
    
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/client.js') }}"></script>

</body>
</html>