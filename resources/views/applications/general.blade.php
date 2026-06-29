@extends('layouts.admin')

@section('title', 'General Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'General',
        'categorySlug' => 'general'
    ])
@endsection
