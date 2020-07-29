<?php

namespace App\Http\Controllers;
use App\Address;
use Validator;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //dependency injection
    public function create(Request $request)
    {
        $validator = Validator:: make($request->all(),[
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string',
            'city'=>'required|string',
            'postal_code' => 'required|integer',
            'zone'=>'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }

        $addresses = new Address;
        $addresses->user_id = $request->user_id;
        $addresses->address = $request->address;
        $addresses->city = $request->city;
        $addresses->postal_code = $request->postal_code;
        $addresses->zone = $request->zone;

        if($addresses->save()){
            return response()->json(['success'=>"address created successfully !"], 200);
        }else{
            return response()->json(['error'=>"address creation unsuccessful !"], 400);
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
    public function GetAddress($id)
    {
        $address_list = address::where('user_id',$id)->with('users')->get();
        if(sizeof($address_list)>0){
            return response()->json(['success'=>'Sucessfully data listed','data' =>$address_list],200);
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
