@extends('layouts.admin')

@section('title', 'Drinking Water - Individual Level Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Drinking Water - Individual Level',
        'categorySlug' => 'drinking-water-individual-level'
    ])
@endsection
