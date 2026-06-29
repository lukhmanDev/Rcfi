@extends('layouts.admin')

@section('title', 'Shops and Others Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Shops and Others',
        'categorySlug' => 'shops-and-others'
    ])
@endsection
