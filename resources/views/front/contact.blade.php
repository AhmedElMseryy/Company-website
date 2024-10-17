@extends('front.master')

@section('title', 'Contact')
@section('contact-active', 'active')

@section('hero')
    <x-hero-section title="Contact Us" subtitle="Contact"></x-hero-section>
@endsection

@section('content')

    <!-- Contact Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Contact Us</div>
                <h2 class="mb-5">If You Have Any Query, Please Feel Free Contact Us</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="text-center mb-4">The contact form is currently inactive. Get a functional and working contact
                        form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're
                        done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <div>
                        @if (session('contact_success_msg'))
                            <div class="alert alert-success">
                                {{ session('contact_success_msg') }}
                            </div>
                        @endif
                    </div>
                    <!-- ****************** Start Form **************** -->
                    <form action="{{ route('front.contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                                <x-validation-error field="name"></x-validation-error>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                                <x-validation-error field="email"></x-validation-error>
                            </div>

                            <!-- Subject -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                                <x-validation-error field="subject"></x-validation-error>
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                                <x-validation-error field="message"></x-validation-error>
                            </div>
                            <!-- Button Submit -->
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <!-- ****************** End Form **************** -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
