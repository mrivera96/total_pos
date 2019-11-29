<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Http\Request;
use App\Supplier;
use Exception;

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
        //
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
        $status = 0;
        if($supplier->update($request->all())){
            $status = 1;
        }

        $title='Editar Proveedor';

        return view('messages.supplierEdit', compact(['status', 'title']));
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
            $status=1;
            return view('messages.supplierDelete', compact(['title', 'status']));
        }catch (Exception $exception){
            $status = 0;
            return view('messages.supplierDelete', compact(['title', 'status']));
        }
    }
}
