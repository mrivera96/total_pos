<?php

namespace App\Http\Controllers\Customers;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('status', 1)->get();
        $title = __('Clientes');
        return view('customers.index', compact(['customers', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('Nuevo Cliente');
        return view('customers.create', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     *
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            Customer::insert($request->all());
            return response()->json([
                    'err' => 0,
                    'message' => 'El cliente ha sido guardado con correctamente.']
                , 200);
        } catch (Exception $exception) {
            return response()->json([
                    'err' => 1,
                    'error' => $exception->getMessage()]
                , 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
