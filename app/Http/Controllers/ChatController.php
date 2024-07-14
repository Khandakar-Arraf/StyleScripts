<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Course;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::query()->where('status', 1)->get();
        $chats = false;
        $activechat = null;
        return view('admin.pages.chats.index', compact('courses', 'chats', 'activechat'));
    }
    public function chat($courseid)
    {
        $courses = Course::query()->where('status', 1)->get();
        $course = Course::find($courseid);
        $chats = Chat::query()->where('course_id', $courseid)->get();
        $activechat = $courseid;
        return view('admin.pages.chats.index', compact('courses', 'course', 'chats', 'activechat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sender_id' => 'required',
            'course_id' => 'required',
            'sender_role' => 'required',
            'text' => 'required',
        ]);

        $chat = Chat::create($validatedData);

        if ($chat) {
            return redirect()->back()->with('success', 'Text Message sent SuccessFully');
        } else {
            return redirect()->back()->with('error', ' try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
