<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('status', '=', 'Pedido feito')->get();

        return view('orders.listagem', compact('orders'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $product = Product::find($id);
        $precoEncomenda = null;

        return view('orders.create', compact('product','precoEncomenda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $ChangeDelimiter = str_replace('/','-', $request->input('deliveryDate'));

        $explodeDate = explode('-',$ChangeDelimiter);

        $deliverydate =  $explodeDate[2] . '-' . $explodeDate[1] . '-' . $explodeDate[0];

        Order::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'idProdutos' => $id,
            'deliveryDate' => $deliverydate
        ]);

        return view('orders.orderok', ['phone' => $request->input('phone')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Order::find($id);

        return view('orders.show', compact('order'));

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
    public function update($id)
    {

       Order::find($id)->update(['status' => 'Entregue']);

       $orders = Order::where('status', 'Pedido feito')->get();

       return view('orders.listagem', compact('orders'));

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
