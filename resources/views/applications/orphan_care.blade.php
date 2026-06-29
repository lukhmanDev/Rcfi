@extends('layouts.admin')

@section('title', 'Orphan Care Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Orphan Care',
        'categorySlug' => 'orphan-care'
    ])
@endsection
