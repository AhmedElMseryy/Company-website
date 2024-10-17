<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    #=================================== INDEX
    public function index()
    {
        $members = Member::paginate(config('pagination.count'));
        return view('admin.members.index', get_defined_vars());
    }

    #=================================== CREATE
    public function create()
    {
        return view('admin.members.create');
    }

    #=================================== STORE
    public function store(StoreMemberRequest $request)
    {

        // dd($request->all());
        $data = $request->validated();
        //1- get image
        $image = $request->image;
        //2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        //3- move image to my project
        $image->storeAs('members', $newImageName, 'public');
        //4- save new name to database record
        $data['images'] = $newImageName;
        Member::create($data);

        return to_route('admin.members.index')->with('success', __('keywords.created_successfully'));
    }

    #=================================== SHOW
    public function show(Member $member)
    {
        return view('admin.members.show', get_defined_vars());
    }

    #=================================== EDIT
    public function edit(Member $member)
    {
        return view('admin.members.edit', get_defined_vars());
    }

    #=================================== UPDATE
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/members/$member->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('members', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }
        $member->update($data);
        return to_route('admin.members.index')->with('success', __('keywords.updated_successfully'));
    }

    #=================================== DELETE
    public function destroy(Member $member)
    {
        Storage::delete("public/members/$member->image");
        $member->delete();
        return to_route('admin.members.index')->with('success', __('keywords.deleted_successfully'));
    }
}
