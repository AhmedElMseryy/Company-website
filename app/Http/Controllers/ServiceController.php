<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    #==================================== INDEX
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', get_defined_vars());
    }

    #==================================== CREATE
    public function create()
    {
        return view('admin.services.create');
    }

    #==================================== STORE
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        Service::create($data);

        return to_route('admin.services.index')->with('success', __('keywords.created_successfully'));
    }

    #==================================== SHOW
    public function show(Service $service)
    {
        return view('admin.services.show', get_defined_vars());
    }

    #==================================== EDIT
    public function edit(Service $service)
    {
        return view('admin.services.edit', get_defined_vars());
    }

    #==================================== UPDATE
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);
        return to_route('admin.services.index')->with('success', __('keywords.updated_successfully'));
    }

    #==================================== DELETE
    public function destroy(Service $service)
    {
        $service->delete();
        return to_route('admin.services.index')->with('success', __('keywords.deleted_successfully'));
    }
}
