<div class="d-flex flex-column-fluid" wire:ignore>
    <!--begin::Container-->
    @if(Session::has('message'))
        <div class="alert alert-success text-danger font-bold" role="dialog">{{Session::get('message')}}</div>
    @endif
    <div class="container-fluid">

        <form wire:submit.prevent="updateVendor">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Account Full
                            Name</label>
                        <input type="text" name="name" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:model="name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Account User
                            Name</label>
                        <input type="text" name="username" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:model="username">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="text" name="email" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:model="email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-6">

                        <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300"
                            for="user_avatar">Upload file</label>
                        <input id="large-input"
                            class="block w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" type="file" name="new" wire:model="new">
                        <div class="mt-1 text-lg text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                            picture is useful to confirm your are logged into your account</div>
                                     @if($new)
                                       <img src="{{$new->temporaryurl()}}" width="120"/>

                                       @else
                                       <img src="{{asset('assets/images/vendor')}}/{{$profile}}" width="120"/>
                                       @endif


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Contact
                            Number</label>
                        <input type="text" name="mobile" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:model="mobile">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Map Location
                            Link</label>
                        <input type="text" name="map" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="map">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Facebook Profile
                            Link</label>
                        <input type="text" name="facebook" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="facebook">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Instagram Profile
                            Link</label>
                        <input type="text" name="instagram" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="instagram">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">TikTok Link</label>
                        <input type="text" name="tiktok" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="tiktok">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Youtube Link</label>
                        <input type="text" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="youtube">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-6">
                        <label for="large-input"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Whatsapp</label>
                        <input type="text" name="whatsapp" id="large-input"
                            class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="whatsapp">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-6">

                        <label for="message"
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Address</label>
                        <textarea id="message" name="address" rows="4"
                            class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="your Address, cit, state, country ..." wire:model="address"></textarea>

                    </div>
                </div>
            </div>


            <button type="submit" 
                class="text-white btn-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                Profile</button>
        </form>


    </div>

</div>
