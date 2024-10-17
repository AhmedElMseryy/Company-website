@extends('admin.master')

@section('title', __('keywords.settings'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.settings') }}</h2>

                <x-success-alert></x-success-alert>
                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--**** Start FORM ****-->
                        <form action="{{ route('admin.settings.update', ['setting' => $setting]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Address -->
                                <div class="col-md-6">
                                    <x-form-label title="address"></x-form-label>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="{{ __('keywords.address') }}" value="{{ $setting->address }}">

                                    <x-validation-error field="address"></x-validation-error>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <x-form-label title="phone"></x-form-label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ __('keywords.phone') }}" value="{{ $setting->phone }}">

                                    <x-validation-error field="phone"></x-validation-error>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="email"></x-form-label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="{{ __('keywords.email') }}" value="{{ $setting->email }}">

                                    <x-validation-error field="email"></x-validation-error>
                                </div>

                                <!-- Facebook -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="facebook"></x-form-label>
                                    <input type="url" name="facebook" class="form-control"
                                        placeholder="{{ __('keywords.facebook') }}" value="{{ $setting->facebook }}">

                                    <x-validation-error field="facebook"></x-validation-error>
                                </div>

                                <!-- Youtube -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="youtube"></x-form-label>
                                    <input type="url" name="youtube" class="form-control"
                                        placeholder="{{ __('keywords.youtube') }}" value="{{ $setting->youtube }}">

                                    <x-validation-error field="youtube"></x-validation-error>
                                </div>

                                <!-- Twitter -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="twitter"></x-form-label>
                                    <input type="url" name="twitter" class="form-control"
                                        placeholder="{{ __('keywords.twitter') }}" value="{{ $setting->twitter }}">

                                    <x-validation-error field="twitter"></x-validation-error>
                                </div>

                                <!-- Linkedin -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="linkedin"></x-form-label>
                                    <input type="url" name="linkedin" class="form-control"
                                        placeholder="{{ __('keywords.linkedin') }}" value="{{ $setting->linkedin }}">

                                    <x-validation-error field="linkedin"></x-validation-error>
                                </div>

                                <!-- Instagram -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="instagram"></x-form-label>
                                    <input type="url" name="instagram" class="form-control"
                                        placeholder="{{ __('keywords.instagram') }}" value="{{ $setting->instagram }}">

                                    <x-validation-error field="instagram"></x-validation-error>
                                </div>


                            </div>

                            <x-submit-button></x-submit-button>
                        </form>
                        <!--**** End FORM ****-->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
