<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itemcategory;
use Validator;
use DB;
class ItemcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator:: make($request->all(),[
          
            'name'=>'required|unique:itemcategories|string', 

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $itemcategory = new Itemcategory;
        $itemcategory->name = $request->name;
       
        if($itemcategory->save()){
            return response()->json(['success'=>"itemcategory created successfully !"], 200);
        }else{
            return response()->json(['error'=>"itemcategory unsuccessful !"], 400);
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
    public function GetItemcategory()
    {
        $itemcategory = DB::table('itemcategories')->get();
        if(sizeof($itemcategory)>0){
            return response()->json(['itemcategory'=>$itemcategory],200);
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
    public function editItemcategory(Request $request ,$id)
    {
        $validator = Validator:: make($request->all(),[
          
            'name'=>'required|string', 

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $itemcategoryupdated = new Itemcategory;
        $itemcategoryupdated =Itemcategory::find($request->id);
        $itemcategoryupdated->name = $request->name;
       
        if($itemcategoryupdated->save()){
            return response()->json(['success'=>"itemcategory updated successfully !"], 200);
        }else{
            return response()->json(['error'=>"updated !"], 400);
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Deleteitemcategory($id)
    {
       $deleteitemcategory=Itemcategory::where('id',$id)->delete();
       if($deleteitemcategory){
           return response()->json(['message'=>'sucessfully deleted'],200);
       }else{
           return response()->json(['message'=>'data all ready deleted'],400);
       }
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
