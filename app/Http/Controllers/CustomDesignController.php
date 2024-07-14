<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CustomDesign;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CustomDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcatalog($id)
    {
        $catalogs = Catalog::where('custom_design_id', $id)->get();

        return response()->json($catalogs);
    }
    public function index()
    {
        $custom_designs = CustomDesign::with('catalogs')->get();
        // dd($custom_designs);
        return view('admin.pages.custom-design.index', compact('custom_designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.custom-design.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'catalog_names.*' => 'required|string|max:255',
            'catalog_fronts.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'catalog_backs.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $mi = $request->file('image');
            $miName = time() . '.' . $mi->extension();

            $img = Image::make($mi->path());
            $img->fit(530, 630); // resize the fi to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert fi to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('uploads/catalogs/') . $miName);
            $mainImagePath = $miName;
        }
        // Create a new custom design
        $customDesign = new CustomDesign([
            'title' => $request->input('title'),
            'image' => $mainImagePath,
            // Store the image
        ]);

        $customDesign->save(); // Save the custom design to the database

        // Create catalogs associated with the custom design
        $catalogData = [];

        foreach ($request->input('catalog_names') as $index => $catalogName) {
            $frontImage = $request->file('catalog_fronts')[$index];
            $backImage = $request->file('catalog_backs')[$index];


            $fi = $frontImage;
            $fiName = time() . '.' . $fi->extension();

            $img = Image::make($fi->path());
            $img->fit(530, 630); // resize the fi to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert fi to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('uploads/catalogs/fronts/') . $fiName);
            $frontImagePath = $fiName;

            $bi = $backImage;
            $biName = time() . '.' . $bi->extension();

            $img = Image::make($bi->path());
            $img->fit(530, 630); // resize the fi to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert fi to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('uploads/catalogs/backs/') . $biName);
            $backImagePath = $biName;






            // $frontImagePath = $frontImage->store('catalogs/fronts', 'public');
            // $backImagePath = $backImage->store('catalogs/backs', 'public');

            $catalogData[] = [
                'name' => $catalogName,
                'front_image' => $frontImagePath,
                'back_image' => $backImagePath,
            ];
        }

        // Associate catalogs with the custom design and save them to the database
        $customDesign->catalogs()->createMany($catalogData);

        return redirect()->route('custom_designs.index')
            ->with('success', 'Custom design and catalogs created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomDesign  $customDesign
     * @return \Illuminate\Http\Response
     */
    public function show(CustomDesign $customDesign)
    {
        return view('admin.pages.custom-design.view', compact($customDesign));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomDesign  $customDesign
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomDesign $customDesign)
    {
        // dd($customDesign);
        return view('admin.pages.custom-design.edit', compact('customDesign'));
    }



    public function update(Request $request, CustomDesign $customDesign)
    {
        $customDesign->update([
            'title' => $request->input('title'),
        ]);

        // Handle the custom design image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $this->uploadImage($image, 'uploads/catalogs/');
            $customDesign->image = $imagePath;
            $customDesign->save();
        }

        // Loop through the catalogs and update them
        $catalogData = $request->only('catalog_ids', 'catalog_names', 'catalog_fronts', 'catalog_backs');
        $this->updateCatalogs($catalogData);

        return redirect()->route('custom_designs.index')->with('success', 'Custom Design updated successfully');
    }

    private function uploadImage($file, $uploadPath)
    {
        $imageName = time() . '.' . $file->extension();
        $image = Image::make($file->path());
        $image->fit(530, 630);
        $image->encode('jpg', 80);
        $image->save(base_path($uploadPath) . $imageName);
        return $imageName;
    }
    private function updateCatalogs($data)
    {
        foreach ($data['catalog_ids'] as $key => $catalogId) {
            $catalog = Catalog::find($catalogId);
            $catalog->name = $data['catalog_names'][$key];

            if (isset($data['catalog_fronts'][$key]) && $data['catalog_fronts'][$key]) {
                $frontImage = $this->uploadImage($data['catalog_fronts'][$key], 'uploads/catalogs/fronts/');
                $catalog->front_image = $frontImage;
            }

            if (isset($data['catalog_backs'][$key]) && $data['catalog_backs'][$key]) {
                $backImage = $this->uploadImage($data['catalog_backs'][$key], 'uploads/catalogs/backs/');
                $catalog->back_image = $backImage;
            }

            $catalog->save();
        }
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomDesign  $customDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomDesign $customDesign)
    {
        $customDesign->delete();
        return back()->with('success', 'Custom Design deleted successfully');

    }
    public function Active(CustomDesign $customDesign)
    {

        $customDesign->status = '1';
        if ($customDesign->save()) {
            return back()->with('success', 'Custom Design Activated successfully.');
        } else {
            return back()->with('error', 'Custom Design Activation Unsuccessfull');
        }
    }

    public function Inactive(CustomDesign $customDesign)
    {
        // dd($customDesign->status);
        $customDesign->status = '0';
        if ($customDesign->save()) {
            return back()->with('success', 'Custom Design Deactivated successfully.');
        } else {
            return back()->with('error', 'Custom Design Dactivation Unsuccessfull.');
        }
    }

}
