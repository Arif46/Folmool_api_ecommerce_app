<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_image;
use Validator;
use Image;
class ProductimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator:: make($request->all(),[
            'product_id' => 'required|exists:products,id',
            'image'=>'required|image|mimes:jpg,png,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }
         
        $productimages = new Product_image;
        $imageNames = "";
        $productimages->product_id = $request->product_id;

        if($file = $request->file("image")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'ProductImages/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductImages/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductImages/'.$pathImage.$nameReplacer);
            }         
         $productimages->image = $imageNames;
    }  
    


        if($productimages->save()){
            return response()->json(['success'=>"productimage created successfully !"], 200);
        }else{
            return response()->json(['error'=>"productimage creation unsuccessful !"], 400);
        }

       
 
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
        //
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
