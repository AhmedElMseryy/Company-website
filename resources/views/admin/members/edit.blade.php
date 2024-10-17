@extends('admin.master')

@section('title', __('keywords.edit_member'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_member') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--**** Start FORM ****-->
                        <form action="{{ route('admin.members.update', ['member' => $member]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <x-form-label title="name"></x-form-label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('keywords.name') }}" value="{{ $member->name }}">

                                    <x-validation-error field="name"></x-validation-error>
                                </div>

                                <!-- Position -->
                                <div class="col-md-6">
                                    <x-form-label title="position"></x-form-label>
                                    <input type="text" name="position" class="form-control"
                                        placeholder="{{ __('keywords.position') }}" value="{{ $member->position }}">

                                    <x-validation-error field="position"></x-validation-error>
                                </div>

                                <!-- Image -->
                                <div class="col-md-12 mt-2">
                                    <x-form-label title="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file">

                                    <x-validation-error field="image"></x-validation-error>
                                </div>

                                <!-- Facebook -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="facebook"></x-form-label>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="{{ __('keywords.facebook') }}" value="{{ $member->facebook }}">

                                    <x-validation-error field="facebook"></x-validation-error>
                                </div>

                                <!-- Twitter -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="twitter"></x-form-label>
                                    <input type="text" name="twitter" class="form-control"
                                        placeholder="{{ __('keywords.twitter') }}" value="{{ $member->twitter }}">

                                    <x-validation-error field="twitter"></x-validation-error>
                                </div>

                                <!-- Linkedin -->
                                <div class="col-md-6 mt-2">
                                    <x-form-label title="linkedin"></x-form-label>
                                    <input type="text" name="linkedin" class="form-control"
                                        placeholder="{{ __('keywords.linkedin') }}" value="{{ $member->linkedin }}">

                                    <x-validation-error field="linkedin"></x-validation-error>
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
