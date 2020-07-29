<?php

namespace App\Http\Controllers;
use App\Referral;
use Validator;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'amount' => 'required|integer',
            'code' => 'required|integer',
            'user_id_from' => 'required|string',
            'user_id_to' => 'required|string',
            'is_valid' => 'required|boolean',
            
        ]);
        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }

        $referral= New Referral;
        $referral->title=$request->title;
        $referral->amount=$request->amount;
        $referral->code=$request->code;
        $referral->user_id_from=$request->user_id_from;
        $referral->user_id_to=$request->user_id_to;
        $referral->is_valid=$request->is_valid;
        if($referral->save()){
           return response()->json(['message'=>"referral data create succesfully"],200);
        }else{
            return response()->json(['message'=>'referal data create unsuccessful'],400);
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
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetReferal($id)
    {
        $referral=Referral::where('id',$id)->get();
        if(sizeof($referral)>0){
            return response()->json(['data',$referral],200);
        }else{
            return response()->json(['errors'=>'data not found'],404);
        }
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
