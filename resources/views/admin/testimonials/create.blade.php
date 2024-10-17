@extends('admin.master')

@section('title', __('keywords.add_new_testimonials'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.add_new_testimonials') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- ****** Start Form ****** -->
                        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <x-form-label title="name"></x-form-label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('keywords.name') }}">

                                    <x-validation-error field="name"></x-validation-error>
                                </div>

                                <!-- Position -->
                                <div class="col-md-6">
                                    <x-form-label title="position"></x-form-label>
                                    <input type="text" name="position" class="form-control"
                                        placeholder="{{ __('keywords.position') }}">

                                    <x-validation-error field="position"></x-validation-error>
                                </div>

                                <!-- Image -->
                                <div class="col-md-12 mt-2 ">
                                    <x-form-label title="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file">

                                    <x-validation-error field="image"></x-validation-error>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mt-2">
                                    <x-form-label title="description"></x-form-label>
                                    <textarea name="description" class="form-control" placeholder="{{ __('keywords.description') }}"></textarea>

                                    <x-validation-error field="description"></x-validation-error>
                                </div>
                            </div>

                            <x-submit-button></x-submit-button>
                        </form>
                        <!-- ****** End Form ****** -->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
