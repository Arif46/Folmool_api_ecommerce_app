<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_method' => 'required|max:255',
            'payment_status' => 'required|max:255',
            'payment_time' => 'required|date_format:H:i',
        ]);
        if ($validator->fails()) {
          return response()->json([$validator->errors()],400);
        }

        $payment = New Payment;
        $payment->payment_method=$request->payment_method;
        $payment->payment_status=$request->payment_status;
        $payment->payment_time=$request->payment_time;
        if($payment->save()){
            return response()->json(['message'=>'data successful added']);
        }else{
            return response()->json(['errors'=>'data unsuccessful added']);
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
    public function GetPayment( $id)
    {
        $payment=Payment::where('id',$id)->get();
        if(sizeof($payment)>0){
            return response()->json(['data'=>$payment],200);
        }else{
            return response()->json(['erros'=>'data not found'],404);
        }
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
