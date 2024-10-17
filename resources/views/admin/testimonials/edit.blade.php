@extends('admin.master')

@section('title', __('keywords.edit_testimonials'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_testimonials') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--************* Start FORM ****-->
                        <form action="{{ route('admin.testimonials.update', ['testimonial' => $testimonial]) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <x-form-label title="name"></x-form-label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('keywords.name') }}" value="{{ $testimonial->name }}">

                                    <x-validation-error field="name"></x-validation-error>
                                </div>

                                <!-- Position -->
                                <div class="col-md-6">
                                    <x-form-label title="position"></x-form-label>
                                    <input type="text" name="position" class="form-control"
                                        placeholder="{{ __('keywords.position') }}" value="{{ $testimonial->position }}">

                                    <x-validation-error field="position"></x-validation-error>
                                </div>

                                <!-- Image -->
                                <div class="col-md-12 mt-2">
                                    <x-form-label title="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file">

                                    <x-validation-error field="image"></x-validation-error>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mt-2">
                                    <x-form-label title="description"></x-form-label>
                                    <textarea name="description" class="form-control" placeholder="{{ __('keywords.description') }}">{{ $testimonial->description }}</textarea>

                                    <x-validation-error field="description"></x-validation-error>
                                </div>
                            </div>

                            <x-submit-button></x-submit-button>
                        </form>
                        <!--************* End FORM ****-->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
