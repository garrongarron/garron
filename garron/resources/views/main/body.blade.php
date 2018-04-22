@extends('main.layout')

@section('content')

 @include('main.header')
 @include('main.slider')
 @include('main.about')
 @include('main.service')
 @include('main.team')
 {{-- @include('main.project')
 @include('main.testimonial')
 @include('main.location')
 @include('main.blog') --}}
 @include('main.contact')
 @include('main.client')
 
 @include('main.footer')

		
@endsection