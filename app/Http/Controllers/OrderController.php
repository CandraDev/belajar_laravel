<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('product', 'customer')->get();

        // $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all(); // Ambil semua produk
        $customers = Customer::all(); // Ambil semua pelanggan
        return view('order.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_product' => 'required|exists:products,id',
            'id_customer' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
            'order_date' => 'required|date',
        ]);

        // Simpan data ke dalam tabel 'orders'
        Order::create($validated);

        // Menampilkan pesan sukses dengan SweetAlert
        Alert::success('Success', 'Order created successfully');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all(); // Ambil semua produk dari database
        $customers = Customer::all(); // Ambil semua customer dari database, jika perlu
        return view('order.show', compact('order', 'products', 'customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all(); // Ambil semua produk
        $customers = Customer::all(); // Ambil semua pelanggan
        return view('order.edit', compact('order', 'products', 'customers'));
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
        $validated = $request->validate([
            'id_product' => 'required|exists:products,id',
            'id_customer' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
            'order_date' => 'required|date',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        // Menampilkan pesan sukses dengan SweetAlert
        Alert::success('Success', 'Order updated successfully');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mencari order berdasarkan ID
        $order = Order::findOrFail($id);

        // Menghapus order
        $order->delete();

        // Menampilkan pesan sukses dengan SweetAlert
        Alert::success('Success', 'Order deleted successfully');
        return redirect()->route('orders.index');
    }
}
