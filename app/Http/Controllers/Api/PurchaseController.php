<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases =  Purchase::orderBy('created_at', 'desc')->get();
        
        $code = $purchases ? 200 : 404;
        
        return response()->json($purchases, $code);
        
        
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $purchase = Purchase::create($request->all());
        
        return response()->json($purchase, 201);
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {

        $code = $purchase ? 200 : 404;
        
        return response()->json($purchase, $code);
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->update($request->all());
        
        return response()->json($purchase, 200);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        
        $purchase->delete();
        
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
        
        $purchases = Purchase::where($match)->get();
        
        $code = $purchases ? 200 : 404;
        
        return response()->json($purchases, $code);
        
        
    }
    
}
