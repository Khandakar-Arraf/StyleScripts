<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subject;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $subjects = Subject::orderBy('id', 'DESC')->get();
        // dd($subjects);
        return view('admin.pages.subject.index', compact('subjects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd(public_path());
        return view('admin.pages.subject.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(340, 440); // resize the image to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/subjects/') . $imageName);
        $data['image'] = $imageName;
        $lastSubject = Subject::orderByDesc('order')->first();
        if ($lastSubject) {
            $data['order'] = $lastSubject->order + 1;
        } else {
            $data['order'] = 1;
        }
        $subject = Subject::create($data);

        if ($subject) {
            return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
            # code...
        } else {
            return back()->with('error', 'Subject creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('admin.pages.subject.view', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $categories = Category::all();
        return view('admin.pages.subject.edit', compact('subject', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'title' => 'required',
            'order' => 'required',
            'category_id' => 'required',
            'description' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(340, 440); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/subjects/') . $imageName);

            $data['image'] = $imageName;
        }

        $subject = $subject->update($data);



        if ($subject) {
            return redirect()->route('subjects.index')->with('success', 'Subject Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Subject Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        // delete the subject's image file, if it exists

        if ($subject->image && file_exists(asset('uploads/subjects/' . $subject->image))) {
            unlink(asset('uploads/subjects/' . $subject->image));
        }

        // delete the subject from the database
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function Active(Subject $subject)
    {

        $subject->status = '1';
        if ($subject->save()) {
            return redirect()->route('subjects.index')->with('success', 'subject Activated successfully.');
        } else {
            return back()->with('error', 'subject Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Subject $subject)

    {
        // dd($subject->status);
        $subject->status = '0';
        if ($subject->save()) {
            return redirect()->route('subjects.index')->with('success', 'subject Deactivated successfully.');
        } else {
            return back()->with('error', 'subject Dactivation Unsuccessfull.');
        }
    }
}
