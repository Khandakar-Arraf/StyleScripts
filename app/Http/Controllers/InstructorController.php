<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class InstructorController extends Controller
{

    public function inbox()
    {

        $customerIds = Chat::Where('sender_id', Auth::user()->id)->where('sender_role', Auth::user()->role)
            ->pluck('sender_id')
            ->unique()
            ->toArray();
        $users = User::whereIn('id', $customerIds)->get();
        $instructorCourses = Course::where('creator_id', Auth::user()->id)->where('status', 1)->get();
        // dd($instructorCourses);
        $customer = false;
        $chats = false;
        $course = false;
        return view('web.pages.chat.instructor', compact('course', 'customer', 'users', 'instructorCourses', 'chats'));
    }
    public function chat($courseId)
    {
        // dd($courseId);
        $chats = Chat::Where('course_id', $courseId)->get();

        $course = Course::find($courseId);
        // dd($course);

        $instructorCourses = Course::where('creator_id', Auth::user()->id)->where('status', 1)->get();

        // dd($chats);
        return view('web.pages.chat.instructor', compact('chats', 'instructorCourses', 'course'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'image' => 'required',
            'file' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'profession' => 'required',
            'subject' => 'required',
        ]);
        // dd($data);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/instructors/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/instructors/'), $fileName);
            $data['file'] = $fileName;
        }
        $data['user_id'] = Auth::user()->id;

        $userData['complete'] = 1;
        $user = User::find(Auth::user()->id);
        $updateUser = $user->update($userData);
        $instructor = Instructor::create($data);

        if ($instructor && $updateUser) {
            // dd('success');
            return redirect()->route('index')->with('success', 'Instructor profile completed successfully, Plz Wait for confirmation');
        } else {

            return back()->with('error', 'Instructor creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        return view('instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required', 'birthday' => 'required',
            'profession' => 'required',
            'subject' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/instructors/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/instructors/'), $fileName);
            $data['file'] = $fileName;
        }

        $instructor = $instructor->update($data);

        if ($instructor) {
            return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully.');
        } else {
            return back()->with('error', 'Instructor update showing error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully.');
    }
}
