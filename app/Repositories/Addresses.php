<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class Addresses 
{
    
    protected $base_uri = "http://127.0.0.1:8080";
    
    function all() {
        
        
        $response = $this->callApi("GET", "api/addresses");
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
    }

    function find($id) {
                        
        $response = $this->callApi("GET", "api/addresses/{$id}");
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
        
    }


    function add($address) {
        
        $params = array();
        $params['form_params'] = $address;
        
        $response = $this->callApi("POST", "api/addresses", $params);
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
                
    }
    
    
    function update($id, $address) {
        
        $params = array();
        $params['form_params'] = $address;
        
        $response = $this->callApi("PUT", "api/addresses/{$id}", $params);
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
    }
    
    
    function delete($id) {
                
        
        $response = $this->callApi("DELETE", "api/addresses/{$id}");
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
        
    }    


    
    function allByUser($user_id) {
        
        $params = array();
        $params['form_params'] = ['user_id' => $user_id ];
        
        $response = $this->callApi("POST", "api/addresses/search", $params);
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
    }
    
    
    
    function searchMain($user_id) {
        
        $params = array();
        $params['form_params'] = ['user_id' => $user_id , 'main' => 1 ];
        
        $response = $this->callApi("POST", "api/addresses/search", $params);
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());        
        
    }
    
    
    protected function callApi($method, $uri, $params = []) {
    
        $user = Auth::guard('web')->user();
        
        
        if (!$user->api_token) {
            return;
        }
        
        
        $params['query'] = ['api_token' => $user->api_token];

        $client = new Client([
            'base_uri' => $this->base_uri,
            'timeout'  => 2.0,
        ]);
        
        //print_r("$method $uri");
        //dd($params);
        $response = null;
        try {
            $response = $client->request($method, $uri, $params);
        }
        catch (RequestException $e){
            echo "REQUEST: " . Psr7\str($e->getRequest()) ."<br/>";
            if ($e->hasResponse()) {
                echo "RESPONSE: ";
                echo Psr7\str($e->getResponse());
            }
        }
        //dd($response);        
        return $response;
    }
    

}
