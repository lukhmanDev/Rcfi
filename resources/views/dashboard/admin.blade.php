@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

    <!-- Welcoming Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="color: #ffffff; font-size: 1.75rem; font-weight: 700; margin: 0;">Welcome, {{ Auth::user()->name }}!</h1>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 0.25rem;">Role assigned: 
            <span style="color: var(--accent-purple); font-weight: 600;">System Administrator</span>
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid" style="margin-bottom: 2.5rem;">
        <!-- Registered Users -->
        <div class="stat-card">
            <div class="stat-details">
                <h3>Total Registered Users</h3>
                <p>{{ $userCount }}</p>
            </div>
            <div class="stat-icon cyan">
                <i class="bx bxs-group"></i>
            </div>
        </div>
        
        <!-- Registered Donors / Partners -->
        <div class="stat-card">
            <div class="stat-details">
                <h3>Registered Partners</h3>
                <p>{{ $donorsCount }}</p>
            </div>
            <div class="stat-icon purple">
                <i class="bx bxs-business"></i>
            </div>
        </div>

        <!-- Total Applications -->
        <div class="stat-card">
            <div class="stat-details">
                <h3>Total Applications</h3>
                <p>{{ $applicationsCount }}</p>
            </div>
            <div class="stat-icon green">
                <i class="bx bxs-file-doc"></i>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Panels -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
        <!-- Admin Management Panel -->
        <div class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><i class="bx bxs-user-account" style="vertical-align: middle; margin-right: 0.5rem; color: var(--accent-cyan);"></i> User Management</h2>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">
                Administrate registered user accounts, assign roles (COO, PM, HOD, Others), edit profile credentials, or register new administrators.
            </p>
            <a href="{{ route('users') }}" class="btn-custom" style="display: inline-block; text-align: center; text-decoration: none;">
                Open User Settings
            </a>
        </div>

        <!-- Donors Browse Panel -->
        <div class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><i class="bx bxs-book-reader" style="vertical-align: middle; margin-right: 0.5rem; color: var(--accent-purple);"></i> Partners Registry</h2>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">
                Browse the complete index of donor organizations, financial partners, contact details, support initiation dates, and official websites.
            </p>
            <a href="{{ route('donors.index') }}" class="btn-custom" style="display: inline-block; text-align: center; text-decoration: none;">
                Open Registry List
            </a>
        </div>
    </div>

@endsection
