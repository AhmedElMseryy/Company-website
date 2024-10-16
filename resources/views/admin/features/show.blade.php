@extends('admin.master')

@section('title', __('keywords.show_feature'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_feature') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">{{ __('keywords.title') }}</label>
                                <p class="form-control">{{ $feature->title }}</p>
                            </div>

                            <div class="col-md-6">
                                <label for="icon">{{ __('keywords.icon') }}</label>
                                <div class="mt-2">
                                    <i class="{{ $feature->icon }} fa-2x"></i>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="description">{{ __('keywords.description') }}</label>
                                <p class="form-control">{{ $feature->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
