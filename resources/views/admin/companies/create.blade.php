@extends('admin.master')

@section('title', __('keywords.add_new_companies'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.add_new_companies') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- ****** Start Form ****** -->
                        <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <!-- Image -->
                                <div class="col-md-12 mt-2 ">
                                    <x-form-label title="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file">

                                    <x-validation-error field="image"></x-validation-error>
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
