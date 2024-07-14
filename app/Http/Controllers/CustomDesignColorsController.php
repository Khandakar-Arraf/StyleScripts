<?php

namespace App\Http\Controllers;

use App\Models\CustomDesignColors;
use Illuminate\Http\Request;

// namespace Intervention\Image\Facades;


class CustomDesignColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $custom_design_colors = CustomDesignColors::orderBy('id', 'DESC')->get();
        // dd($custom_design_colors);
        return view('admin.pages.custom_design_colors.index', compact('custom_design_colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
            'color' => 'required',

        ]);

        $custom_design_colors = CustomDesignColors::create($data);

        if ($custom_design_colors) {
            return redirect()->route('custom_design_colors.index')->with('success', 'CustomDesignColors created successfully');
            # code...
        } else {
            return back()->with('error', 'CustomDesignColors creating showing error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomDesignColors  $custom_design_colors
     * @return \Illuminate\Http\Response
     */
    public function show(CustomDesignColors $custom_design_colors)
    {
        return view('admin.pages.custom_design_colors.view', compact('custom_design_colors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomDesignColors  $custom_design_colors
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomDesignColors $custom_design_colors)
    {
        return view('admin.pages.custom_design_colors.edit', compact('custom_design_colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomDesignColors  $custom_design_colors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomDesignColors $custom_design_colors)
    {
        $data = $request->validate([
            'color' => 'required',
        ]);
        $custom_design_colors = $custom_design_colors->update($data);



        if ($custom_design_colors) {
            return redirect()->route('custom_design_colors.index')->with('success', 'CustomDesignColors Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'CustomDesignColors Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomDesignColors  $custom_design_colors
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomDesignColors $custom_design_colors)
    {
        // delete the custom_design_colors's image file, if it exists


        // delete the custom_design_colors from the database
        $custom_design_colors->delete();

        return redirect()->route('custom_design_colors.index')->with('success', 'CustomDesignColors deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomDesignColors  $custom_design_colors
     * @return \Illuminate\Http\Response
     */
    public function Active(CustomDesignColors $custom_design_colors)
    {

        $custom_design_colors->status = '1';
        if ($custom_design_colors->save()) {
            return redirect()->route('custom_design_colors.index')->with('success', 'custom_design_colors Activated successfully.');
        } else {
            return back()->with('error', 'custom_design_colors Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestservice
     * @param  \App\Models\CustomDesignColors  $custom_design_colors
     * @return \Illuminate\Http\Response
     */
    public function Inactive(CustomDesignColors $custom_design_colors)
    {
        // dd($custom_design_colors->status);
        $custom_design_colors->status = '0';
        if ($custom_design_colors->save()) {
            return redirect()->route('custom_design_colors.index')->with('success', 'custom_design_colors Deactivated successfully.');
        } else {
            return back()->with('error', 'custom_design_colors Dactivation Unsuccessfull.');
        }
    }
}
