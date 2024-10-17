@extends('front.master')

@section('title', 'Service')
@section('service-active', 'active')

@section('hero')
    <x-hero-section title="Services" subtitle="Services"></x-hero-section>
@endsection

@section('content')

    <x-front-services-component></x-front-services-component>

    <x-front-testimonials-component></x-front-testimonials-component>

@endsection
