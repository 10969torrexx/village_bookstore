<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Purchase::join('books', 'purchases.book_id', 'books.id')
        ->select(
            'books.title', 
            'books.price', 
            'books.genre', 
            'purchases.id',
            'purchases.*'
        )
        ->where('purchases.user_id',  Auth::user()->id)
        ->orderBy('purchases.id', 'desc')
        ->get();

        return view('pages.purchase-list', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_price' => ($request->totalPrice),
            'payment' => doubleval($request->payment),
            'change' => doubleval(substr($request->change, 1)) ,
        ];
        
        Purchase::create($data);

        return redirect(route('purchase-list'))->with('success', 'Book Succesfully Bought!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
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
