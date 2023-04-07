<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product.index')
            ->with('products', $products)
            ->with('i', (request()->input('page',1) -1) *5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // REGRA DE VALIDAÇÃO
        $request->validate([
            'name'      => 'required',
            'detail'    => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // ATRIBUINDO OS DADOS A VARIÁVEL INPUT
        $input = $request->all();
        // VERIFICA SE EXISTE O ARQUIVO
        if($image = $request->file('image')) {
            // ATRIBUI O CAMINHO DA PASTA
            $destinationPath = 'images/';
            // ATRIBUI A DATA DE UPLOAD E EXTRAI A EXTENÇÃO DO ARQUIVO
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // REMOVE O ARQUIVO PARA O DIRETÓRIO COM OS DADOS ATRIBUIDOS A VARIÁVEL $profileImage
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('product.index')
            ->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // REGRA DE VALIDAÇÃO
        $request->validate([
            'name'      => 'required',
            'detail'    => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $product->update($input);

        return redirect()->route('product.index')
            ->with('success', 'Product Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return $product;

        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Success', 'Product Deleted Successfully');
    }
}
