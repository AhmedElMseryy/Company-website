@extends('admin.master')

@section('title', __('keywords.show_companies'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_companies') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <!-- image -->
                            <div class="col-md-2">
                                <label for="image">{{ __('keywords.image') }}</label>
                                <div>
                                    <img src="{{ asset("storage/companies/$company->image") }}" alt="#"
                                        width="35px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
