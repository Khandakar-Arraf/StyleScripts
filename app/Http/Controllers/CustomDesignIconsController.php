<?php

namespace App\Http\Controllers;

use App\Models\CustomDesignIcons;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class CustomDesignIconsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $custom_design_icons = CustomDesignIcons::orderBy('id', 'DESC')->get();
        // dd($custom_design_icons);
        return view('admin.pages.custom_design_icons.index', compact('custom_design_icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.custom_design_icons.create');
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
        $icon = $request->file('icon');
        $iconName = time() . '.' . $icon->extension();

        $img = Image::make($icon->path());
        $img->fit(96, 96); // resize the icon to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert icon to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/icons/') . $iconName);
        $data['icon'] = $iconName;

        $custom_design_icons = CustomDesignIcons::create($data);

        if ($custom_design_icons) {
            return redirect()->route('custom_design_icons.index')->with('success', 'CustomDesignIcons created successfully');
            # code...
        } else {
            return back()->with('error', 'CustomDesignIcons creating showing error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomDesignIcons  $custom_design_icons
     * @return \Illuminate\Http\Response
     */
    public function show(CustomDesignIcons $custom_design_icons)
    {
        return view('admin.pages.custom_design_icons.view', compact('custom_design_icons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomDesignIcons  $custom_design_icons
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomDesignIcons $custom_design_icons)
    {
        return view('admin.pages.custom_design_icons.edit', compact('custom_design_icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomDesignIcons  $custom_design_icons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomDesignIcons $custom_design_icons)
    {
        if ($request->file('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '.' . $icon->extension();

            $img = Image::make($icon->path());
            $img->fit(96, 96); // resize the icon to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 10);
            $img->save(base_path('/uploads/icons/') . $iconName);
            $data['icon'] = $iconName;

            $custom_design_icons = CustomDesignIcons::create($data);
            if ($custom_design_icons) {
                return redirect()->route('custom_design_icons.index')->with('success', 'CustomDesignIcons Updated successfully.');
                # code...
            } else {
                return back()->with('error', 'CustomDesignIcons Update showing error.');
            }
        } else {
            return back()->with('suiccess', 'Nothing to update.');
        }



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomDesignIcons  $custom_design_icons
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomDesignIcons $custom_design_icons)
    {
        // delete the custom_design_icons's image file, if it exists


        // delete the custom_design_icons from the database
        $custom_design_icons->delete();

        return redirect()->route('custom_design_icons.index')->with('success', 'CustomDesignIcons deleted successfully.');
    }



}