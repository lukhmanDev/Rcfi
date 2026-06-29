@extends('layouts.admin')

@section('title', 'Staff Dashboard')

@section('content')

    <!-- Welcoming Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="color: #ffffff; font-size: 1.75rem; font-weight: 700; margin: 0;">Welcome, {{ Auth::user()->name }}!</h1>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 0.25rem;">Role assigned: 
            <span style="color: var(--text-muted); font-weight: 600;">Team Member</span>
        </p>
    </div>

    <!-- Stats overview grid -->
    <div class="stats-grid" style="margin-bottom: 2.5rem;">
        <!-- Registered Donors / Partners Card -->
        <div class="stat-card">
            <div class="stat-details">
                <h3>Registered Partners</h3>
                <p>{{ $donorsCount }}</p>
            </div>
            <div class="stat-icon purple">
                <i class="bx bxs-business"></i>
            </div>
        </div>

        <!-- Total Applications Card -->
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

    <!-- General Staff specific shortcuts -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
        <div class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><i class="bx bxs-group" style="vertical-align: middle; margin-right: 0.5rem; color: var(--accent-cyan);"></i> Partner Organizations</h2>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">
                Browse registered corporate donors, individual contributors, and general support organizations.
            </p>
            <a href="{{ route('donors.index') }}" class="btn-custom" style="display: inline-block; text-align: center; text-decoration: none;">
                View Partners List
            </a>
        </div>

        <div class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><i class="bx bxs-folder" style="vertical-align: middle; margin-right: 0.5rem; color: var(--accent-green);"></i> Application Entries</h2>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">
                Browse application submissions across active categories (Education, Water, Family Aid, house builds).
            </p>
            <a href="{{ route('applications.index') }}" class="btn-custom" style="display: inline-block; text-align: center; text-decoration: none; background: linear-gradient(135deg, var(--accent-purple), #4f46e5);">
                View Applications Grid
            </a>
        </div>
    </div>

@endsection
