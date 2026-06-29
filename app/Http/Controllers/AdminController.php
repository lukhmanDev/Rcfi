<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donor;
use App\Models\Application;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $donorsCount = Donor::count();
        $applicationsCount = Application::count();

        $role = auth()->user()->role;
        
        switch ($role) {
            case 1:
                return view('dashboard.admin', compact('userCount', 'donorsCount', 'applicationsCount'));
            case 2:
                return view('dashboard.coo', compact('donorsCount', 'applicationsCount'));
            case 3:
                return view('dashboard.project_manager', compact('donorsCount', 'applicationsCount'));
            case 4:
                return view('dashboard.hod', compact('donorsCount', 'applicationsCount'));
            default:
                return view('dashboard.others', compact('donorsCount', 'applicationsCount'));
        }
    }
}
