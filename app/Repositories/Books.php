<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;


class Books 
{
    
    protected $base_uri = "http://127.0.0.1:8080";
    
    function all() {
        
        
        $response = $this->callApi("GET", "api/books");
        
        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
    }

    function find($id) {
                        
        $response = $this->callApi("GET", "api/books/{$id}");

        if(!$response) return;
        
        return json_decode($response->getBody()->getContents());
        
        
    }

    function search($title, $author) {
        
        $params = [];
        $fields = [];
        
        if($title) {
            $fields['title'] = $title;
        }
        
        if($author) {
            $fields['author'] = $author;
        }
        
        $params['form_params'] = $fields;
        
        $response = $this->callApi("POST", "api/books/search", $params);
        
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
