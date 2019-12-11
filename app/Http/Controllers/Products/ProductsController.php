<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        $title = 'Nuevo Producto';
        $action=route('product.store');
        $suppliers=Supplier::where('status',1)->get();
        $categories=ProductCategory::where('status',1)->get();

        return view('products.create', compact(['title', 'action', 'suppliers', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(StoreProductRequest $product)
    {
        $title = 'Nuevo producto';

        $newproduct = new Product();
        if(isset($product->image) && $product->image!=null){
            $imageName = time().'.'.$product->image->getClientOriginalExtension();
            $product->image->move(public_path('img'), $imageName);
            $newproduct->image      =     $imageName;
        }

        $newproduct->name = $product->name;
        $newproduct->description = $product->description;
        $newproduct->barcode = $product->barcode;
        $newproduct->cost = $product->cost;
        $newproduct->sale_price = $product->sale_price;
        $newproduct->in_stock = $product->in_stock;
        $newproduct->brand = $product->brand;
        $newproduct->supplier_id = $product->supplier_id;
        $newproduct->product_category_id = $product->product_category_id;

        try{
            $newproduct->save();
            $bg = 'success';
            $alert = 'success';
            $message = __('El producto ha sido guardado correctamente.');
            $btn = 'success';
            $route = route('product.index');
            $btn_text = __('Aceptar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }catch(Exception $exception){
            $bg = 'warning';
            $alert = 'warning';
            $message = __("Ha ocurrido un erro al guardar el peoducto. Intenta de nuevo.\n Detalle técnico: ".$exception->getMessage());
            $btn = 'warning';
            $route = url()->previous();
            $btn_text = __('Regresar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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


    public function update(UpdateProductRequest $request, Product $product)
    {
        $title = 'Editar Producto';
        if(isset($request->image) && $request->image!=null){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'), $imageName);
            $product->image      =     $imageName;
        }
        try{
            $product->update($request->all());
            $bg = 'success';
            $alert = 'success';
            $message = __('El producto ha sido actualizado correctamente.');
            $btn = 'success';
            $route = route('product.show', $product->id);
            $btn_text = __('Aceptar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }catch (Exception $exception){
            $bg = 'warning';
            $alert = 'warning';
            $message = __('Ha ocurrido un error al actualizar el producto. Intenta de nuevo. Detalle técnico: '.$exception->getMessage());
            $btn = 'warning';
            $route = route(url()->previous());
            $btn_text = __('Regresar');
        }
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
