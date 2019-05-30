<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Repositories\Addresses;

class AddressController extends Controller
{
    
    protected $books;
    
    
    public function __construct(Addresses $addresses) {
        
        $this->addresses = $addresses;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$addresses = $this->addresses->all();
        
        $user = Auth::guard('web')->user();
        
        $addresses = $this->addresses->allByUser($user->id); //for current user
        
        return view('addresses.index', compact('addresses'));
        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $address = $this->addresses->find($id);
        
        if (!$address) {
            return view('home');
        }
        
        return view('addresses.edit', compact('address'));        
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                        
        return view('addresses.create');
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
        
        $address = array();
        $address['user_id'] = $user->id;
        $address['address'] = Input::get('address');
        $address['code'] = Input::get('code');
        $address['city'] = Input::get('city');
        $address['phone'] = Input::get('phone');
        $address['main'] = Input::get('is_main_address') == 'on';
        
        $this->addresses->add($address);
        
        $addresses = $this->addresses->allByUser($user->id);
        
        if (!$addresses) {
            return view('home');
        }
        
        return view('addresses.index', compact('addresses'));
        
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
        $user = Auth::guard('web')->user();
        
        $id = Input::get('address_id');
        
        $address = array();
        $address['user_id'] = $user->id;
        $address['address'] = Input::get('address');
        $address['code'] = Input::get('code');
        $address['city'] = Input::get('city');
        $address['phone'] = Input::get('phone');
        $address['main'] = Input::get('is_main_address') == 'on';
                
        
        $this->addresses->update($id, $address);
        
        $addresses = $this->addresses->allByUser($user->id);
        
        if (!$addresses) {
            return view('home');
        }
        
        return view('addresses.index', compact('addresses'));        
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $user = Auth::guard('web')->user();
        
        $this->addresses->delete($id);
        
        $addresses = $this->addresses->allByUser($user->id);
        
        if (!$addresses) {
            return view('home');
        }
        
        return view('addresses.index', compact('addresses'));
        
    }
    
    
}
