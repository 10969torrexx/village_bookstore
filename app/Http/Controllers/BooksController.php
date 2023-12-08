<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function getGenre() {
        return [
            'Horror',
            'Sci-fi',
            'Love Story',
            'Drama'
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return $books;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $response = Books::where('id', $request->id)
        ->first();

        if ($response) {
            return [
                'status' => 200,
                'data' => $response
            ];
        }

        return [
            'status' => 400,
            'message' => 'Book not found!' 
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
