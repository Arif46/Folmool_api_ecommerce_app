<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use Validator;
use DB;
use App\Order;
use App\OrderItem;
use App\Address;
use App\Product;
use Illuminate\Support\Facades\DB as FacadesDB;

class ShipmentController extends Controller
{
  public function create(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'order_id' => 'required|exists:order_items,order_id',
      'name' => 'required|string',
      'address' => 'required|string',
      'phone' => 'required',
      'email' => 'required|email',
    ]);

    if ($validator->fails()) {
      return response()->json([$validator->errors()], 400);
    }

    $shipment = new Shipment;

    $shipment->order_id = $request->order_id;
    $shipment->name = $request->name;
    $shipment->address = $request->address;
    $shipment->phone = $request->phone;
    $shipment->email = $request->email;

    if ($shipment->save()) {
      return response()->json(['message' => 'data sucessfull added'], 200);
    } else {
      return response()->json(['error' => 'data unsuessfull added'], 400);
    }
  }
  public function GetShipment($id)
  {
    // $shipment=Shipment::where('id',$id)->get();
    $shipment = DB::table('shipments')
      ->orderBy('name', 'desc')
      ->get();
    if (sizeof($shipment) > 0) {
      return response()->json(['shipment' => $shipment], 200);
    } else {
      return response()->json(['errors' => 'data not found'], 404);
    }
  }



  public function PendingOrders($id)
  {
    $Orders = DB::table('orders')
      ->where('status', '=', 0)
      ->where('delivery_man_id', '=', $id)
      ->get();

    foreach ($Orders as $Order) {
      $OrderedItem = OrderItem::where('order_id', $Order->id)->get()[0];
      $OrderedItemName = Product::find($OrderedItem->item_id)->name;
      $shipmentDetails = Shipment::find($Order->shipping_id);
      $address = $shipmentDetails->address;
      $phone = $shipmentDetails->phone;
      $name = $shipmentDetails->name;
      $total = $Order->total;
      $data[] = [
        'address' => $address,
        'phone' => $phone,
        'name' => $name,
        'product_name' => $OrderedItemName,
        'total' => $Order->total,
      ];

      // $OrderItems[] = OrderItem::where('order_id', $Order->id)->get();
    }

    return  $data;
  }

  public function GetTotalDelivery($id)
  {
      $TotalCashCollect = 0;
      $Orders = Order::where('delivery_man_id', $id)->where('status', 1)->get();
      $total_deliveries = $Orders->count();

      foreach ($Orders as $Order) {
        $Address = Address::where('user_id', $Order->delivery_man_id)->get();
        foreach ($Address as $item) {
          $Areas[] = $item->postal_code;
        }

        $TotalCashCollect += (int) $Order->total;
      }

      return response()->json([
        'cash_to_collect' => $TotalCashCollect,
        'toal_deliveries' => $total_deliveries,
        'areas' => count(array_unique($Areas))
      ]);
    }

}
