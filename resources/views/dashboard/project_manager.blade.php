@extends('layouts.admin')

@section('title', 'Project Manager Dashboard')

@section('content')

    <!-- Welcoming Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="color: #ffffff; font-size: 1.75rem; font-weight: 700; margin: 0;">Welcome, {{ Auth::user()->name }}!</h1>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 0.25rem;">Role assigned: 
            <span style="color: var(--accent-green); font-weight: 600;">Project Manager</span>
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

    <!-- Project Manager specific shortcuts -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
        <div class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><i class="bx bxs-briefcase-alt-2" style="vertical-align: middle; margin-right: 0.5rem; color: var(--accent-green);"></i> Project Partnerships</h2>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">
                View donor groups and local partnerships supporting active projects, water groups, houses, and general programs.
            </p>
            <a href="{{ route('donors.index') }}" class="btn-custom" style="display: inline-block; text-align: center; text-decoration: none; background: transparent; border: 1px solid var(--accent-cyan); color: var(--accent-cyan);">
                Browse Partners
            </a>
        </div>

        <div class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><i class="bx bxs-pie-chart-alt" style="vertical-align: middle; margin-right: 0.5rem; color: var(--accent-cyan);"></i> Application Submissions</h2>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem;">
                Access the 11 project category dashboards to track, edit, and approve funding requests submitted by applicants.
            </p>
            <a href="{{ route('applications.index') }}" class="btn-custom" style="display: inline-block; text-align: center; text-decoration: none;">
                Open Applications Center
            </a>
        </div>
    </div>

@endsection
