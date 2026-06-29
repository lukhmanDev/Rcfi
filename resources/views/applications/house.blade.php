@extends('layouts.admin')

@section('title', 'House Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'House',
        'categorySlug' => 'house'
    ])
@endsection
