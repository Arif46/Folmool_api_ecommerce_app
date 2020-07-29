<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use DB;
use Validator;
class OrderController extends Controller
{
    public function create(Request $request)
    {
        $validatorOrder = Validator::make($request->all(), [
            'customer_id' => 'required|exists:users,id',
            'payment_id' => 'required|exists:payments,id',
            'sub_total' => 'required|integer',
            'vat' => 'required|integer',
            'referral_code' => 'required|integer',
            'promo_code' => 'required|integer',
            'discount' => 'required|integer',
            'shipping_charge' => 'required|integer',
            'total' => 'required|integer',
            'delivery_man_id' => 'required|exists:users,id',
            'notes' => 'required',
            'shipping_id' => 'required|exists:shipments,id',
            'shipping_date' => 'required|date_format:Y-m-d',
            'delivery_date' => 'required|date_format:Y-m-d',
            'status' => 'required|string',
            'date_time' => 'required|date_format:Y-m-d H:i:s',
        ]);
        $validatorOrderitem = Validator::make($request->all(), [
            'item_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if ($validatorOrder->fails()) {
           return response()->json([$validatorOrder ->errors()],400);
        }

        if ($validatorOrderitem->fails()) {
            return response()->json([$validatorOrderitem ->errors()],400);
         }



        $order=New Order;

        $order->customer_id=$request->customer_id;
        $order->payment_id=$request->payment_id;
        $order->sub_total=$request->sub_total;
        $order->vat=$request->vat;
        $order->referral_code=$request->referral_code;
        $order->promo_code=$request->promo_code;
        $order->discount=$request->discount;
        $order->shipping_charge=$request->shipping_charge;
        $order->total=$request->total;
        $order->delivery_man_id=$request->delivery_man_id;
        $order->notes=$request->notes;
        $order->shipping_id=$request->shipping_id;
        $order->shipping_date=$request->shipping_date;
        $order->delivery_date=$request->delivery_date;
        $order->status=$request->status;
        $order->date_time=$request->date_time;
        $order->save();

        $Items = explode(',', $request->item_id);
        $Quantity = explode(',', $request->quantity);

        for($i = 0; $i < count($Items); $i++) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->item_id = $Items[$i];
            $orderItem->quantity = $Quantity[$i];
            $orderItem->save();
        }
            return response()->json(['message'=>'data is successfully uploaded']);

    }

    public function GetOrder($id)
    {

         $pending_order=Order::where('delivery_man_id','=',$id)->where('status','=',0)->with('orderitem')->with('user')->with('payment')->with('delivery_man')->with('shipment')->get();
         if(sizeof($pending_order)>0){
             return response()->json(['order'=>$pending_order],200);
         }else{
             return response()->json(['errors'=>'data not found'],404);
         }
    }
    public function GetCompleteOrder($id)
    {
    $complete_order = Order::where('delivery_man_id', '=', $id)->where('status', '=', 1)->with('orderitem')->with('user')->with('payment')->with('delivery_man')->with('shipment')->get();
    if (sizeof($complete_order) > 0) {
      return response()->json(['order' => $complete_order], 200);
    } else {
      return response()->json(['errors' => 'data not found'], 404);
    }
    }

  public function GetTotalDelivery($delivery_man_id)
  {


    $total_delivery=Order::where('delivery_man_id',$delivery_man_id)->where('status',1)->count();
    $Address = Address::where('user_id', $delivery_man_id)->count('postal_code');
 $total_cash_collect = Order::where('delivery_man_id', $delivery_man_id)->where('status',1)->sum('total');

    return response()->json([
    'deliveries'=> $total_delivery,
    'Areas'=> $Address,
    'Cash_to_collect'=> $total_cash_collect
    ] ,200);
  }

  public function GetDeliveryDateOrder($id)
  {
    $delivery_date=Order::where('delivery_date','=',$id)->with('orderitem')->with('user')->with('payment')->with('delivery_man')->with('shipment')->get();
     if(sizeof($delivery_date)>0){
      return response()->json(['delivery_date' => $delivery_date],200);
     }else{
      return response()->json(['error' => 'No data Found'],404);
     }
  }

  public function GetDeliveryDateCollection($id){

    $collection=Order::Where('delivery_man_id','=',$id)->select('total','delivery_date')->get();
     if(sizeof($collection) > 0){
             return response()->json(['Cash_collection' => $collection],200);
     }else{
        return response()->json(['message'=> 'No user found'],404);
     }

  }


 public function GettestQuery()
 {
  $sizes = DB::table('users')
  ->crossJoin('orders')
  ->get();
         return response()->json(['price'=>$sizes],200);
 }



}
