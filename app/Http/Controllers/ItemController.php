<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use View;

class ItemController extends Controller
{

    public function getItem()
    {
        return View::make('item.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
        $items = Item::orderBy('item_id','DESC')->get();
        return response()->json($items);
        }
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
        $items = Item::create($request->all());
        return response()->json($items);

            // $input = $request->all();

            // if($file = $request->hasFile('image')) 
            // {
            // $file = $request->file('image') ;
            // $fileName = uniqid().'_'.$file->getClientOriginalName();
            // $destinationPath = public_path().'/images';
            // $input['img_path'] = $fileName;
            // $file->move($destinationPath,$fileName);
            // }
            // $items = Item::create($input);
            // return response()->json(["success" => "Image successfully.","status" => 200]);

                // $path = 'public/';
                // $file = $request->file('img_path');
                // $fileName = time().'_'.$file->getClientOriginalName($file);
                // $upload = $file->storeAs($path, $fileName);
                // return response()->json(["success" => "Image successfully.","status" => 200]);
                
           
        // if($file = $request->hasFile('image')) {
        //     $file = $request->file('image') ;

        //     $fileName = uniqid().'_'.$file->extension();

        //     $destinationPath = public_path().'/images';
           
        //     $input['img_path'] = $fileName;
            
        //     $file->move($destinationPath,$fileName);
        // }
       
        // Item::create($request->all());
        // return response()->json(["success" => "Image successfully.","status" => 200]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        return response()->json($items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $items = Item::find($id);
        $items = $items->update($request->all());
        return response()->json($items);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();
        return response()->json(["success" => "Item deleted successfully.","status" => 200]);
    }
}
