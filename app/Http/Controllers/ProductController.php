<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_class;
use App\Category;
use App\Product;
use Validator;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator:: make($request->all(),[
            'category_id' => 'required|exists:categories,id',
            'name'=>'required|unique:products_classes|string', 
            'description' => 'required|string',
            'is_avalible'=>'required|boolean',
            'is_in_stock'=>'required|boolean',
            'thumbnail'=>'required|image|mimes:jpg,png,jpeg|max:5000',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $products_classes = new Product_class;
        $imageNames = "";
        $products_classes->category_id = $request->category_id;
        $products_classes->name = $request->name;
        $products_classes->description = $request->description;
        $products_classes->is_avalible = $request->is_avalible;
        $products_classes->is_in_stock = $request->is_in_stock;

        if($file = $request->file("thumbnail")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'ProductThumnail/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }         
         $products_classes->thumbnail = $imageNames;
    }  
    


        if($products_classes->save()){
            return response()->json(['success'=>"product class created successfully !"], 200);
        }else{
            return response()->json(['error'=>"product class creation unsuccessful !"], 400);
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProductclass($id)
    {
        $productclasses = product_class::where('id',$id)->with('categories')->get();
        if(sizeof($productclasses)>0){
            return response()->json(['success'=>'true','product_class' =>$productclasses],200);
        }else{
            return response()->json(['failed'=>'No data found'],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditProductclass(Request $request,$id)
    {
        $validator = Validator:: make($request->all(),[
            'category_id' => 'required|exists:categories,id',
            'name'=>'required|string', 
            'description' => 'required|string',
            'is_avalible'=>'required|boolean',
            'is_in_stock'=>'required|boolean',
            'thumbnail'=>'required|image|mimes:jpg,png,jpeg|max:5000',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $productclassUpdate = new Product_class;
        $productclassUpdate =Product_class::find($request->id);
        $imageNames = "";
        $productclassUpdate->category_id = $request->category_id;
        $productclassUpdate->name = $request->name;
        $productclassUpdate->description = $request->description;
        $productclassUpdate->is_avalible = $request->is_avalible;
        $productclassUpdate->is_in_stock = $request->is_in_stock;

        if($file = $request->file("thumbnail")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'ProductThumnail/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }         
         $productclassUpdate->thumbnail = $imageNames;
    }  
    
        if($productclassUpdate->save()){
            return response()->json(['success'=>"product updated successfully !"], 200);
        }else{
            return response()->json(['error'=>"product updated unsuccessful !"], 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteProductclass($id)
    {
        $delete=Product_class::where('id',$id)->delete();
        if($delete){
         return response()->json(['message'=>'sucessfully deleted'],200);
        }else{
            return response()->json(['message'=>'All ready data deleted!'],400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $validator = Validator:: make($request->all(),[
            'product_class_id' => 'required|exists:products_classes,id',
            'name'=>'required|unique:products|string', 
            'description' => 'required|string',
            'is_avalible'=>'required|boolean',
            'is_in_stock'=>'required|boolean',
            'avalible_stock'=>'required|boolean',
            'thumbnail'=>'required|image|mimes:jpg,png,jpeg|max:5000',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $products = new Product;
        $imageNames = "";
        $products->product_class_id = $request->product_class_id;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->is_avalible = $request->is_avalible;
        $products->is_in_stock = $request->is_in_stock;
        $products->avalible_stock = $request->avalible_stock;
        if($file = $request->file("thumbnail")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'ProductThumnail/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }         
         $products->thumbnail = $imageNames;
    }  
    


        if($products->save()){
            return response()->json(['success'=>"product created successfully !"], 200);
        }else{
            return response()->json(['error'=>"product creation unsuccessful !"], 400);
        }
  
    }
    public function GetProduct($id){
        $products = product::where('id',$id)->with('products')->get();
        if(sizeof($products)>0){
            return response()->json(['success'=>'true','product' =>$products],200);
        }else{
            return response()->json(['failed'=>'No data found'],400);
        }
    }
    public function EditProduct(Request $request ,$id)
    {
        $validator = Validator:: make($request->all(),[
            'product_class_id' => 'required|exists:product_classes,id',
            'name'=>'required|string', 
            'description' => 'required|string',
            'is_avalible'=>'required|boolean',
            'is_in_stock'=>'required|boolean',
            'avalible_stock'=>'required|boolean',
            'thumbnail'=>'required|image|mimes:jpg,png,jpeg|max:5000',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $productupdated = new Product;
        $productUpdate =Product::find($request->id);

        $imageNames = "";
        $productUpdate->product_class_id = $request->product_class_id;
        $productUpdate->name = $request->name;
        $productUpdate->description = $request->description;
        $productUpdate->is_avalible = $request->is_avalible;
        $productUpdate->is_in_stock = $request->is_in_stock;
        $productUpdate->avalible_stock = $request->avalible_stock;
        if($file = $request->file("thumbnail")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'ProductThumnail/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('ProductThumnail/'.$pathImage.$nameReplacer);
            }         
         $productUpdate->thumbnail = $imageNames;
    }  
    


        if($productUpdate->save()){
            return response()->json(['success'=>"product updated successfully !"], 200);
        }else{
            return response()->json(['error'=>"product updated unsuccessful !"], 400);
        }
    
    }
    public function DeleteProduct($id)
    {
        $productdelete= Product::where('id',$id)->delete();
        if($productdelete){

            
            return response()->json(['message'=>'sucessfully deleted'],200);
           }else{
               return response()->json(['message'=>'All ready data deleted!'],400);
           }
    }
 
}

