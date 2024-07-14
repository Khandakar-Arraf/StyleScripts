<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class CustomerController extends Controller
{
    public function inbox()
    {

        $orders = Order::where('type', 1)->where('user_id', Auth::user()->id)->distinct()->get();
        $course = false;
        return view('web.pages.chat.customer', compact('orders', 'course'));
    }
    public function chat($course)
    {
        $chats = Chat::Where('course_id', $course)->get();
        $orders = Order::where('type', 1)->where('user_id', Auth::user()->id)->get();
        $course = Course::find($course);
        // dd($course);
        return view('web.pages.chat.customer', compact('orders', 'chats', 'course'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required',
            'file' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'current_class' => 'required',
            'current_school' => 'required',
        ]);
        // dd($data);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(200, 200);
        $img->encode('jpg', 80);
        $img->save(base_path('/uploads/customers/') . $imageName);
        $data['image'] = $imageName;



        $file = $request->file('file');
        $fileName = time() . '_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/customers/'), $fileName);
        $data['file'] = $fileName;

        $data['user_id'] = Auth::user()->id;

        $userData['complete'] = 1;
        $user = User::find(Auth::user()->id);
        $updateUser = $user->update($userData);
        $customer = Customer::create($data);

        if ($customer && $updateUser) {
            // dd('success');
            return redirect()->route('index')->with('success', 'Customer profile completed successfully, Plz Wait for confirmation');
        } else {

            return back()->with('error', 'Customer creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'birthday' => 'required',
            'current_class' => 'required',
            'current_school' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/customers/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/customers/'), $fileName);
            $data['file'] = $fileName;
        }

        $customer = $customer->update($data);

        if ($customer) {
            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        } else {
            return back()->with('error', 'Customer update showing error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
