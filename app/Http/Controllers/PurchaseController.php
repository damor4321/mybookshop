<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Repositories\Books;
use App\Repositories\Addresses;
use App\Repositories\Purchases;


class PurchaseController extends Controller
{

    protected $books;
    
    
    public function __construct(
        Books $books, 
        Addresses $addresses,
        Purchases $purchases) {
        
        $this->books = $books;
        $this->addresses = $addresses;
        $this->purchases = $purchases;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$purchases = $this->purchases->all();
        $user = Auth::guard('web')->user();
        
        $purchases = $this->purchases->allByUser($user->id); //always by user...
        
        return view('purchases.index', compact('purchases'));        
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::guard('web')->user();
        
        $id = Input::get('book_id');
        $copies = Input::get('copies');
        
        $book = $this->books->find($id);        
        if (!$book) {
            return view('home');
        }

        $addresses = $this->addresses->searchMain($user->id);
        if(!$addresses) {
            
            return redirect()->route('addresses')
            ->with('info','Please you need add you main address before create orders');
        }
                
        $address = $addresses[0];        
        return view('purchases.create', compact('book', 'address', 'copies'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        
        $user = Auth::guard('web')->user();
        
        $purchase = array();
        $purchase['user_id'] = $user->id;
        $purchase['book_id'] = Input::get('book_id');
        $purchase['title'] = Input::get('title');
        $purchase['author'] = Input::get('author');
        $purchase['editor'] = Input::get('editor');
        $purchase['price'] = Input::get('price');
        $purchase['quantity'] = Input::get('copies');
        $purchase['total'] = Input::get('total');
        
        $this->purchases->add($purchase);
        
        $purchases = $this->purchases->allByUser($user->id);
        return view('purchases.index', compact('purchases'));
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = $this->purchases->find($id);
        
        if (!$purchase) {
            return view('home');
        }
        
        return view('purchases.show', compact('purchase'));
        
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
