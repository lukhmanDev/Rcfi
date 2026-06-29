@extends('layouts.admin')

@section('title', 'Drinking Water - Group Level Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Drinking Water - Group Level',
        'categorySlug' => 'drinking-water-group-level'
    ])
@endsection
