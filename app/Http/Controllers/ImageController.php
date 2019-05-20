<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Images;
use Image;

class ImageController extends Controller
{
  public function __construct(){
    $this->model = new Images;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $images = Images::all();
      return view(
        'image_gallery',[
          'images'=> $images
        ]
      );
    }

    public function viewImage($fileImage){
      $filePath = public_path(env('PATH_IMAGE').$fileImage);
      return Image::make($filePath)->respose();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('image_insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $file = $request->file('image_src');
      $ext = $file->getClientOriginalExtension();

      $dateTime = date('Ymd_his');
      $newName = 'image_'.$dateTime.'.'.$ext;

      $file->move(public_path(env('PATH_IMAGE')),$newName);

      $images = new images;
      $images->image_title = $request->image_title;
      $images->image_desc = $request->image_desc;
      $images->image_src = $newName;

      $images->save();

      return redirect()->route('image.index')->with('success','Image have been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
