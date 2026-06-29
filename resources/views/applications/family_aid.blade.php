@extends('layouts.admin')

@section('title', 'Family Aid Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Family Aid',
        'categorySlug' => 'family-aid'
    ])
@endsection
