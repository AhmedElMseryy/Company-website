<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    #=================================== INDEX
    public function index()
    {
        $companies = Company::paginate(config('pagination.count'));
        return view('admin.companies.index', get_defined_vars());
    }

    #=================================== CREATE
    public function create()
    {
        return view('admin.companies.create');
    }

    #=================================== STORE
    public function store(StoreCompanyRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        //1- get image
        $image = $request->image;
        //2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        //3- move image to my project
        $image->storeAs('companies', $newImageName, 'public');
        //4- save new name to database record
        $data['images'] = $newImageName;
        Company::create($data);

        return to_route('admin.companies.index')->with('success', __('keywords.created_successfully'));
    }

    #=================================== SHOW
    public function show(Company $company)
    {
        return view('admin.companies.show', get_defined_vars());
    }

    #=================================== EDIT
    public function edit(Company $company)
    {
        return view('admin.companies.edit', get_defined_vars());
    }

    #=================================== UPDATE
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/companies/$company->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('companies', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }
        $company->update($data);

        return to_route('admin.companies.index')->with('success', __('keywords.updated_successfully'));
    }

    #=================================== DELETE
    public function destroy(Company $company)
    {
        Storage::delete("public/companies/$company->image");
        $company->delete();
        return to_route('admin.companies.index')->with('success', __('keywords.deleted_successfully'));
    }
}
