@extends('layouts.admin')

@section('title', 'Hospital or Clinics Applications')

@section('content')
    @include('applications.base_table', [
        'categoryName' => 'Hospital or Clinics',
        'categorySlug' => 'hospital-or-clinics'
    ])
@endsection
