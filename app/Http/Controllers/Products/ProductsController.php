<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\Supplier;
use Illuminate\Http\Request;
use Exception;

class ProductsController extends Controller
{
    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Productos';
        $products = Product::where('status', 1)->get();

        return view('products.index', compact(['title', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $title = $product->name;

        return view('products.show', compact(['title', 'product']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $title = $product->name;
        $action=route('product.update', $id);
        $suppliers=Supplier::where('status',1)->get();
        $categories=ProductCategory::where('status',1)->get();

        return view('products.edit', compact(['title', 'product', 'action', 'suppliers', 'categories']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = __('Eliminar producto');
        try{
            $product = Product::find($id);
            $product->update(['status' => 0]);
            $bg = 'success';
            $alert = 'success';
            $message = __('El producto ha sido eliminado correctamente.');
            $btn = 'success';
            $route = route('product.index');
            $btn_text = __('Aceptar');
            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));
        }catch (Exception $exception){
            $bg = 'warning';
            $alert = 'warning';
            $message = __("Ha ocurrido un erro al eliminar el producto. Intenta de nuevo.\n Detalle técnico: ".$exception->getMessage());
            $btn = 'warning';
            $route = url()->previous();
            $btn_text = __('Regresar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));
        }
    }
}
