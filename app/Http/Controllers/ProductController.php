<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $diskLocal = Storage::disk('local');

        $file = $request->file('imagem');

        Product::create([
            'name' => $request->input('name'),
            'Unitprice' => $request->input('Unitprice'),
            'PriceOneHundred' => $request->input('PriceOneHundred'),
            'imageName' => $request->file('imagem')->getClientOriginalName(),
            'imagePath' => 'app/products/'
        ]);

        $diskLocal->putFileAs("products", $file, $file->getClientOriginalName());


        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $product = Product::find($id);

         return view('products.update', compact('product'));
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

        $row = Product::where('id', $id)->update($request->except('_token'));

        if($row > 0 )
        {
            $messege = 'Produto editado com sucesso !' ;

        }else
        {
            $messege = "Erro ao editar produto";
        }

        return redirect()->route('product.list')->with($messege);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Product::find($id);
        $imageName = $produto->imageName;

        $row = $produto->delete();

        if($row > 0)
        {
            Storage::delete("products/" . $imageName);

        }

        $product_list = Product::all();
        return view('products.productlist',compact('product_list'));
    }

    public function productList($parameters = [])
    {
        $product_list = Product::all();

        return view('products.productlist', compact('product_list'));
    }

    public function getImageProduct($filename)
    {
        $file = Storage::disk('local')->get("products/".$filename);

        return new Response($file, 200);
    }

}
