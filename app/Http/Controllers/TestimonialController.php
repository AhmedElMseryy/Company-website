<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialController extends Controller
{
    #======================================== INDEX
    public function index()
    {
        $testimonials = Testimonial::paginate(config('pagination.count'));
        return view('admin.testimonials.index', get_defined_vars());
    }

    #======================================== CREATE
    public function create()
    {
        return view('admin.testimonials.create');
    }

    #======================================== STORE
    public function store(StoreTestimonialRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        //1- get image
        $image = $request->image;
        //2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        //3- move image to my project
        $image->storeAs('testimonials', $newImageName, 'public');
        //4- save new name to database record
        $data['images'] = $newImageName;
        Testimonial::create($data);

        return to_route('admin.testimonials.index')->with('success', __('keywords.created_successfully'));
    }

    #======================================== SHOW
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', get_defined_vars());
    }

    #======================================== EDIT
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', get_defined_vars());
    }

    #======================================== UPDATE
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // image uploading 
            // 0- delete old image
            Storage::delete("public/testimonials/$testimonial->image");
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('testimonials', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }
        $testimonial->update($data);

        return to_route('admin.testimonials.index')->with('success', __('keywords.updated_successfully'));
    }

    #======================================== DELETE
    public function destroy(Testimonial $testimonial)
    {
        Storage::delete("public/testimonials/$testimonial->image");
        $testimonial->delete();
        return to_route('admin.testimonials.index')->with('success', __('keywords.deleted_successfully'));
    }
}
