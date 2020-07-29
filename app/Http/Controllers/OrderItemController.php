<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use Validator;
class OrderItemController extends Controller
{
  public function create(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'order_id' => 'required|exists:orders,id',
        'item_id' => 'required|exists:items,id',
        'quantity' => 'required|integer',
    ]);
    if ($validator->fails()) {
       return response()->json([$validator->errors()],400);
    }

    $orderitem= New OrderItem;
    $orderitem->order_id=$request->order_id;
    $orderitem->item_id=$request->item_id;
    $orderitem->quantity=$request->quantity;


    if($orderitem->save()){
        
        return response()->json(['message'=>"order item data  succesfully uploaded"],200);
    }else{
        return response()->json(['message'=>'order item data create unsuccessful'],400);
    }
  }
  public function GetOrderItem($id)
  {
      $orderitem=OrderItem::where('id',$id)->with('orders')->with('items')->get();
      if(sizeof($orderitem)>0){
        return response()->json(['order_item_list'=>$orderitem],200);

    }else{
        return response()->json(['errors'=>'data not found'],404);
    }
  }
}
