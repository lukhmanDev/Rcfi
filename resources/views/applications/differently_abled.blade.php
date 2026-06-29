@extends('layouts.admin')

@section('title', 'Differently Abled Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Differently Abled',
        'categorySlug' => 'differently-abled'
    ])
@endsection
