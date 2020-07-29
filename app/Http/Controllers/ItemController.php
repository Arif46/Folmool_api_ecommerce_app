<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Validator;
class ItemController extends Controller
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
            'item_category_id' => 'required|exists:itemcategories,id',
            'details' => 'required|string',
            'old_price'=>'required|integer', 
            'new_price' => 'required|integer',
            'is_avaliable'=>'required|boolean',
            'is_in_stock'=>'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $items = new Item;
        $items->product_id = $request->product_id;
        $items->item_category_id = $request->item_category_id;
        $items->details = $request->details;
        $items->old_price = $request->old_price;
        $items->new_price = $request->new_price;    
        $items->is_avaliable = $request->is_avaliable; 
        $items->is_in_stock = $request->is_in_stock; 
        if($items->save()){
            return response()->json(['success'=>"item created successfully !"], 200);
        }else{
            return response()->json(['error'=>"item creation unsuccessful !"], 400);
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
    public function GetItem( $id)
    {
        $item =item::where('id',$id)->with('products')->with('itemcategories')->get();
        if(sizeof($item)>0){
            return response()->json(['success'=>'true','items' =>$item],200);
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
    public function itemviewedit(Request $request ,$id)
    {
        $validator = Validator:: make($request->all(),[
            'product_id' => 'required|exists:products,id',
            'item_category_id' => 'required|exists:itemcategories,id',
            'details' => 'required|string',
            'old_price'=>'required|integer', 
            'new_price' => 'required|integer',
            'is_avaliable'=>'required|boolean',
            'is_in_stock'=>'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $itemsupdated = new Item;
        $itemsupdated =Item::find($request->id);
        $itemsupdated->product_id = $request->product_id;
        $itemsupdated->item_category_id = $request->item_category_id;
        $itemsupdated->details = $request->details;
        $itemsupdated->old_price = $request->old_price;
        $itemsupdated->new_price = $request->new_price;    
        $itemsupdated->is_avaliable = $request->is_avaliable; 
        $itemsupdated->is_in_stock = $request->is_in_stock; 
        if($itemsupdated->save()){
            return response()->json(['success'=>"item updated successfully !"], 200);
        }else{
            return response()->json(['error'=>"item updated unsuccessful !"], 400);
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Deleteitem($id)
    {
        $deleteitem=Item::where('id',$id)->delete();
        if($deleteitem){
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
