@extends('admin.master')

@section('title', __('keywords.edit_companies'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_companies') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--************* Start FORM ****-->
                        <form action="{{ route('admin.companies.update', ['company' => $company]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">

                                <!-- Image -->
                                <div class="col-md-12 mt-2">
                                    <x-form-label title="image"></x-form-label>
                                    <input type="file" name="image" class="form-control-file">

                                    <x-validation-error field="image"></x-validation-error>
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
