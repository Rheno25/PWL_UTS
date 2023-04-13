<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class firstController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $rows = 10;
        if(strlen($keyword)){
            $data = barang::where('stock_code', 'like', "%$keyword%")
                ->orWhere('stock_name', 'like', "%$keyword%")
                ->orWhere('stock_category', 'like', "%$keyword%")
                ->paginate($rows);
        }else{
            $data = barang::orderBy('id_stock', 'asc')->paginate($rows);
        }
        return view('barang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stock_code' => 'required',
            'stock_name' => 'required',
            'stock_category' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);
        $data = [
            'stock_code' => $request->stock_code,
            'stock_name' => $request->stock_name,
            'stock_category' => $request->stock_category,
            'price' => $request->price,
            'qty' => $request->qty,
        ];
        barang::create($data);
        return redirect()->to('main')->with('success', 'Data added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = barang::where('id_stock', $id)->first();
        return view('barang.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'stock_code' => 'required',
            'stock_name' => 'required',
            'stock_category' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);
        $data = [
            'stock_code' => $request->stock_code,
            'stock_name' => $request->stock_name,
            'stock_category' => $request->stock_category,
            'price' => $request->price,
            'qty' => $request->qty,
        ];
        barang::where('id_stock', $id)->update($data);
        return redirect()->to('main')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        barang::where('id_stock', $id)->delete();
        return redirect()->to('main')->with('success', 'Data deleted successfully.');
    }
}
