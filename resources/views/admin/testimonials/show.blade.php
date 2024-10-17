@extends('admin.master')

@section('title', __('keywords.show_testimonials'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_testimonials') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-5">
                                <label for="name">{{ __('keywords.name') }}</label>
                                <p class="form-control">{{ $testimonial->name }}</p>
                            </div>

                            <!-- Position -->
                            <div class="col-md-5">
                                <label for="position">{{ __('keywords.position') }}</label>
                                <p class="form-control">{{ $testimonial->position }}</p>
                            </div>

                            <!-- image -->
                            <div class="col-md-2">
                                <label for="image">{{ __('keywords.image') }}</label>
                                <div>
                                    <img src="{{ asset("storage/testimonials/$testimonial->image") }}" alt="#"
                                        width="35px">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mt-2">
                                <label for="description">{{ __('keywords.description') }}</label>
                                <p class="form-control">{{ $testimonial->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
