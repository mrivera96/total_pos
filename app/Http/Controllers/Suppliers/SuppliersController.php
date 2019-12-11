<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Http\Request;
use App\Supplier;
use Exception;
use Illuminate\Support\Facades\Route;

class SuppliersController extends Controller
{
    /**
     * SuppliersController constructor.
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
        $title = 'Proveedores';
        $suppliers = Supplier::where('status', 1)->get();

        return view('suppliers.index', compact(['title', 'suppliers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo Proveedor';
        $action = route('supplier.store');
        return view('suppliers.create', compact(['title', 'action']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $supplier)
    {
        try{
            Supplier::insert($supplier->all(['name', 'description','phone_number', 'address', 'email']));
            $bg = 'success';
            $alert = 'success';
            $message = __('El proveedor ha sido guardado correctamente.');
            $btn = 'success';
            $route = route('supplier.index');
            $btn_text = __('Aceptar');
            $title = 'Nuevo Proveedor';

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }catch(Exception $exception){
            $bg = 'warning';
            $alert = 'warning';
            $message = __("Ha ocurrido un erro al guardar el proveedor. Intenta de nuevo.\n Detalle técnico: ".$exception->getMessage());
            $btn = 'warning';
            $route = url()->previous();
            $btn_text = __('Regresar');
            $title = 'Nuevo Proveedor';

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $supplier = Supplier::find($id);
        $title = $supplier->name;
        return view('suppliers.show', compact(['title','supplier']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $title = 'Editar Proveedor';
        $action = route('supplier.update', $supplier);
        return view('suppliers.edit', compact(['title', 'supplier', 'action']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $title = 'Editar Proveedor';
        try{
            $supplier->update($request->all());
            $bg = 'success';
            $alert = 'success';
            $message = __('El proveedor ha sido actualizado correctamente.');
            $btn = 'success';
            $route = route('supplier.show', $supplier->id);
            $btn_text = __('Aceptar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }catch (Exception $exception){
            $bg = 'warning';
            $alert = 'warning';
            $message = __('Ha ocurrido un error al actualizar el proveedor. Intenta de nuevo. Detalle técnico: '.$exception->getMessage());
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
    public function destroy(Supplier $supplier)
    {
        $title = 'Eliminar Proveedor';

        try{
            $supplier->update(['status' => 0]);
            $bg = 'success';
            $alert = 'success';
            $message = __('El proveedor ha sido eliminado correctamente.');
            $btn = 'success';
            $route = route('supplier.index');
            $btn_text = __('Aceptar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));
        }catch (Exception $exception){
            $bg = 'warning';
            $alert = 'warning';
            $message = __('Ha ocurrido un error al eliminar el proveedor. Intenta de nuevo. Detalle técnico: '.$exception->getMessage());
            $btn = 'warning';
            $route = route('supplier.show', $supplier->id);
            $btn_text = __('Aceptar');

            return view('messages.messages', compact(['bg','alert','message','btn','route', 'btn_text', 'title']));

        }
    }
}
