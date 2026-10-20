<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Count all registered patients
        $totalPatients = Patient::count();

        // Get patients and apply search if provided
        $patients = Patient::query()
            ->when($search, function ($query, $search) {
                $query->where('patient_number', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('contact_number', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Send both variables to the Blade view
        return view('patients.index', compact(
            'patients',
            'search',
            'totalPatients'
        ));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_number' => 'required|string|max:50|unique:patients,patient_number',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birth_date' => 'required|date|before_or_equal:today',
            'sex' => 'required|in:Male,Female',
            'contact_number' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:2000',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient registered successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'patient_number' => 'required|string|max:50|unique:patients,patient_number,' . $patient->id,
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birth_date' => 'required|date|before_or_equal:today',
            'sex' => 'required|in:Male,Female',
            'contact_number' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:2000',
        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}
