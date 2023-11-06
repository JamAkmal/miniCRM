<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCompanyNotification;

class Company extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = \App\Models\Company::paginate(10);
        return view('Company.viewAllCompanies',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Company.addCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|nullable',
            'website' => 'url|nullable',
        ]);
        // Create a new company instance
        $company = new \App\Models\Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/company_logos');
            $company->logo = str_replace('public/', '', $logoPath);
        }
        $company->website = $request->input('website');
        $company->save();
        $lastInsertedId = $company->id;
        $user = \App\Models\Company::find($lastInsertedId);
        // Notify the User via Email
        Notification::send($user,new NewCompanyNotification($company));
        return redirect()->route('company.index')->with('success', 'Company  Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = \App\Models\Company::find($id);
        return view('Company.editCompany',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|nullable',
            'website' => 'url|nullable',
        ]);
        $company = \App\Models\Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::delete('public/' . $company->logo);
            }
            $logoPath = $request->file('logo')->store('public/company_logos');
            $company->logo = str_replace('public/', '', $logoPath);
        }
        $company->website = $request->input('website');
        $company->save();
        return redirect()->route('company.index')->with('success', 'Company Has Been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = \App\Models\Company::find($id);
        $company->delete();
        return redirect()->route('company.index')->with('success','Company Has Been Deleted Successfully...');
    }
}
