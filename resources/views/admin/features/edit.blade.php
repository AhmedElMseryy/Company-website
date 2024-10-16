@extends('admin.master')

@section('title', __('keywords.edit_feature'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_feature') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--**** Start FORM ****-->
                        <form action="{{ route('admin.features.update', ['feature' => $feature]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-6">
                                    <x-form-label title="title"></x-form-label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="{{ __('keywords.title') }}" value="{{ $feature->title }}">

                                    <x-validation-error field="title"></x-validation-error>
                                </div>

                                <!-- Icon -->
                                <div class="col-md-6">
                                    <x-form-label title="icon"></x-form-label>
                                    <input type="text" name="icon" class="form-control"
                                        placeholder="{{ __('keywords.icon') }}" value="{{ $feature->icon }}">

                                    <x-validation-error field="icon"></x-validation-error>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mt-2">
                                    <x-form-label title="description"></x-form-label>
                                    <textarea name="description" class="form-control" placeholder="{{ __('keywords.description') }}">{{ $feature->description }}</textarea>

                                    <x-validation-error field="description"></x-validation-error>
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
