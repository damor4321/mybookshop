<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books =  Book::all();
        
        $code = $books ? 200 : 404;
        
        return response()->json($books, $code);
        
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
            array_push($match, [$field, "LIKE", "%{$value}%"]);             
        }
                
        $books = Book::where($match)->get();
                
        $code = $books ? 200 : 404;
        
        return response()->json($books, $code);
        
    }
    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        $book = Book::create($request->all());
        
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $code = $book ? 200 : 404;
        
        return response()->json($book, $code);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        
        return response()->json(null, 204);
    }
}
