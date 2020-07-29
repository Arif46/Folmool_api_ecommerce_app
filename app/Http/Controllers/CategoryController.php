<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Image;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|string',
            'description' => 'required|string',
            'is_avalible'=>'required|boolean',
            'thumbnail'=>'required|image|mimes:jpg,png,jpeg|max:5000',
        
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }
        
        $category = new Category;
        $imageNames = "";
        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_avalible = $request->is_avalible;

        if($file = $request->file("thumbnail")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'CategoryThumbnail/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('CategoryThumbnail/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('CategoryThumbnail/'.$pathImage.$nameReplacer);
            }         
         $category->thumbnail = $imageNames;
    }  
    


        if($category->save()){
            return response()->json(['success'=>"category created successfully !"], 200);
        }else{
            return response()->json(['error'=>"category creation unsuccessful !"], 400);
        }
    }

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
    public function GetCategory()
    {
        $categories = DB::table('categories')->get();
        if(sizeof($categories)>0){
            return response()->json(['success'=>'Sucessfull','data' =>$categories],200);
        }else{
            return response()->json(['failed'=>'No data found'],400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditCategory(Request $request ,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'is_avalible'=>'required|boolean',
            'thumbnail'=>'required|image|mimes:jpg,png,jpeg|max:5000',
        
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }
        
        $categoryUpdate = new Category;
        $categoryUpdate = Category::find($request->id);
        $imageNames = "";
        $categoryUpdate->name = $request->name;
        $categoryUpdate->description = $request->description;
        $categoryUpdate->is_avalible = $request->is_avalible;

        if($file = $request->file("thumbnail")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'CategoryThumbnail/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('CategoryThumbnail/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('CategoryThumbnail/'.$pathImage.$nameReplacer);
            }         
         $categoryUpdate->thumbnail = $imageNames;
    }  
    


        if($categoryUpdate->save()){
            return response()->json(['success'=>"category updated successfully !"], 200);
        }else{
            return response()->json(['error'=>"category updated unsuccessful !"], 400);
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteCategory($id)
    {
      $categorydelete= Category::where('id',$id)->delete();
      if($categorydelete){
             return response()->json(['success'=>'category deleted sucessfully'],200);
      }else{
          return response()->json(['error'=>'category data already deleted'],400);
      }
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
