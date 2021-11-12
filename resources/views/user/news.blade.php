@extends('user.layouts.app')

@section('main-content')
    <div class="row">
        @include('user.layouts.partials.news-main')
        @include('user.layouts.partials.news-sidebar')
    </div>
    @include('user.layouts.partials.banner')
@endsection
