<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $supplier = Supplier::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Supplier Ditemukan',
                'data'  => $supplier
            ],Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
        }
            return response()->json([
                'status'=> false,
                'message'=> 'Internal Server Error'
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_supplier)
    {
        try {
            $supplier = Supplier::findOrFail($id_supplier);

            return response()->json([
                "message" => "Berhasil ditemukan data supplier",
                "data" => $supplier
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data supplier",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_supplier)
    {
        $data_supplier = Supplier::find($id_supplier);
        if(empty($data_supplier))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_supplier->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
