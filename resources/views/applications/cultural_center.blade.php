@extends('layouts.admin')

@section('title', 'Cultural Center Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Cultural Center',
        'categorySlug' => 'cultural-center'
    ])
@endsection
