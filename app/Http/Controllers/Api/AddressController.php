<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();
        $code = $addresses ? 200 : 404;
        
        return response()->json($addresses, $code);        
    }
    
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->main == true) {
            DB::table('addresses')->update(array('main' => 0));
        }
        $address = Address::create($request->all());
        
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        $code = $address ? 200 : 200;
        
        return response()->json($address, $code);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        if($request->main == true) {
            DB::table('addresses')->update(array('main' => 0));
        }
        $address->update($request->all());
        
        return response()->json($address, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {

        $address->delete();
        
        return response()->json(null, 204);
    }
    
    
    /**
     * Create a search and display a listing of the resource for that search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query_data = $request->all();
        unset($query_data['api_token']);
        
        $match = [];
        foreach ($query_data as $field => $value) {
            array_push($match, [$field, "=", "{$value}"]);
        }
                
        $addresses = Address::where($match)->get();
        $code = $addresses ? 200 : 404;
        
        return response()->json($addresses, $code);
        
    }
    
}
