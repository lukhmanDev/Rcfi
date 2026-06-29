<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private $categories = [
        'education-center' => [
            'name' => 'Education Center',
            'view' => 'applications.education_center'
        ],
        'cultural-center' => [
            'name' => 'Cultural Center',
            'view' => 'applications.cultural_center'
        ],
        'hospital-or-clinics' => [
            'name' => 'Hospital or Clinics',
            'view' => 'applications.hospital_clinics'
        ],
        'shops-and-others' => [
            'name' => 'Shops and Others',
            'view' => 'applications.shops_others'
        ],
        'house' => [
            'name' => 'House',
            'view' => 'applications.house'
        ],
        'drinking-water-group-level' => [
            'name' => 'Drinking Water - Group Level',
            'view' => 'applications.drinking_water_group'
        ],
        'drinking-water-individual-level' => [
            'name' => 'Drinking Water - Individual Level',
            'view' => 'applications.drinking_water_individual'
        ],
        'orphan-care' => [
            'name' => 'Orphan Care',
            'view' => 'applications.orphan_care'
        ],
        'differently-abled' => [
            'name' => 'Differently Abled',
            'view' => 'applications.differently_abled'
        ],
        'family-aid' => [
            'name' => 'Family Aid',
            'view' => 'applications.family_aid'
        ],
        'general' => [
            'name' => 'General',
            'view' => 'applications.general'
        ]
    ];

    public function index()
    {
        // Get count of applications grouped by category
        $applications = Application::all();
        
        $counts = [];
        foreach ($this->categories as $slug => $config) {
            $counts[$config['name']] = $applications->where('category', $config['name'])->count();
        }

        return view('admin.applications', compact('counts'));
    }

    public function showCategory($slug)
    {
        if (!array_key_exists($slug, $this->categories)) {
            abort(404);
        }

        $config = $this->categories[$slug];
        $categoryName = $config['name'];
        $categorySlug = $slug;

        // Retrieve only applications in this category
        $applications = Application::where('category', $categoryName)
            ->orderBy('created_at', 'desc')
            ->get();

        return view($config['view'], compact('applications', 'categoryName', 'categorySlug'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'applicant_name' => ['required', 'string', 'min:2', 'max:255'],
            'category' => ['required', 'string'],
            'amount_requested' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'string', 'in:Pending,Approved,Rejected'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'details' => ['nullable', 'string'],
            'meta' => ['nullable', 'array'],
        ]);

        Application::create($data);

        $redirectCategory = $request->input('redirect_category');
        if ($redirectCategory && array_key_exists($redirectCategory, $this->categories)) {
            return redirect()->route('applications.category', $redirectCategory)->with('success', 'Application registered successfully!');
        }

        return redirect()->route('applications.index')->with('success', 'Application registered successfully!');
    }

    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $data = $request->validate([
            'applicant_name' => ['required', 'string', 'min:2', 'max:255'],
            'category' => ['required', 'string'],
            'amount_requested' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'string', 'in:Pending,Approved,Rejected'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'details' => ['nullable', 'string'],
            'meta' => ['nullable', 'array'],
        ]);

        $application->update($data);

        $redirectCategory = $request->input('redirect_category');
        if ($redirectCategory && array_key_exists($redirectCategory, $this->categories)) {
            return redirect()->route('applications.category', $redirectCategory)->with('success', 'Application details updated successfully!');
        }

        return redirect()->route('applications.index')->with('success', 'Application updated successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        $redirectCategory = $request->input('redirect_category');
        if ($redirectCategory && array_key_exists($redirectCategory, $this->categories)) {
            return redirect()->route('applications.category', $redirectCategory)->with('success', 'Application record deleted successfully.');
        }

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
