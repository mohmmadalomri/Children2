{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-profile-information-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-password-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.delete-user-form')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

@extends('dashboard');
@section('body')
    <!-- profile -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Profile Details</h4>
        </div>
        <div class="card-body py-2 my-25">
            <!-- header section -->
            {{--        <div class="d-flex">--}}
            {{--            <a href="#" class="me-25">--}}
            {{--                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />--}}
            {{--            </a>--}}
            {{--            <!-- upload and reset button -->--}}
            {{--            <div class="d-flex align-items-end mt-75 ms-1">--}}
            {{--                <div>--}}
            {{--                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>--}}
            {{--                    <input type="file" id="account-upload" hidden accept="image/*" />--}}
            {{--                    <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>--}}
            {{--                    <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!--/ upload and reset button -->--}}
            {{--        </div>--}}
            <!--/ header section -->

            <!-- form -->
            <form class="validate-form mt-2 pt-50" method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountFirstName"> Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                               data-msg="Please enter first name"/>
                    </div>

                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountEmail">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                               value="{{$user->email}}"/>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>


    <!--/ profile -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Change Password</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-old-password">Current password</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="password" class="form-control" id="account-old-password"
                                   name="current_password" placeholder="Enter current password"
                                   data-msg="Please current password"/>
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-new-password">New Password</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="Enter new password"/>
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" placeholder="Confirm your new password"/>
                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="fw-bolder">Password requirements:</p>
                        <ul class="ps-1 ms-25">
                            <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-50">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
    <!-- deactivate account  -->
{{--    <div class="card">--}}
{{--        <div class="card-header border-bottom">--}}
{{--            <h4 class="card-title">Delete Account</h4>--}}
{{--        </div>--}}
{{--        <div class="card-body py-2 my-25">--}}
{{--            <div class="alert alert-warning">--}}
{{--                <h4 class="alert-heading">Are you sure you want to delete your account?</h4>--}}
{{--                <div class="alert-body fw-normal">--}}
{{--                    Once you delete your account, there is no going back. Please be certain.--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <form id="formAccountDeactivation" class="validate-form"--}}
{{--                  onsubmit="return false" method="post" action="{{ route('profile.destroy') }}">--}}
{{--                @csrf--}}
{{--                @method('delete')--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation"--}}
{{--                           data-msg="Please confirm you want to delete account"/>--}}
{{--                    <label class="form-check-label font-small-3" for="accountActivation">--}}
{{--                        I confirm my account deactivation--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate Account</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
