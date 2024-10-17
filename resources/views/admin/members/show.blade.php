@extends('admin.master')

@section('title', __('keywords.show_member'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_member') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-5">
                                <label for="name">{{ __('keywords.name') }}</label>
                                <p class="form-control">{{ $member->name }}</p>
                            </div>

                            <!-- Position -->
                            <div class="col-md-5">
                                <label for="position">{{ __('keywords.position') }}</label>
                                <p class="form-control">{{ $member->position }}</p>
                            </div>

                            <!-- image -->
                            <div class="col-md-2">
                                <label for="image">{{ __('keywords.image') }}</label>
                                <div>
                                    <img src="{{ asset("storage/members/$member->image") }}" alt="#" width="35px">
                                </div>
                            </div>

                            <!-- Facebook -->
                            <div class="col-md-6 mt-2">
                                <label for="facebook">{{ __('keywords.facebook') }}</label>
                                <p class="form-control">{{ $member->facebook }}</p>
                            </div>

                            <!-- Twitter -->
                            <div class="col-md-6 mt-2">
                                <label for="twitter">{{ __('keywords.twitter') }}</label>
                                <p class="form-control">{{ $member->twitter }}</p>
                            </div>

                            <!-- Linkedin -->
                            <div class="col-md-6 mt-2">
                                <label for="linkedin">{{ __('keywords.linkedin') }}</label>
                                <p class="form-control">{{ $member->linkedin }}</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
