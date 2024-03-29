<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $barangmasuk = Barangmasuk::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Barangmasuk Ditemukan',
                'data'  => $barangmasuk
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
        $validasi = Validator::make(
            $request->all(),
            [
                "tanggal_masuk" => "required|Date",
                "nomor_invoice_masuk" => "required|String",
                "total" => "required|Double",
            ]
        );

        if ($validasi->fails()) {
            return response()->json([
                "message" => "Gagal menginput data barang masuk",
                "error" => $validasi->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $validated = $validasi->validated();
            try {
                $bikinbarangmasuk = Barangmasuk::create($validated);
                return response()->json([
                    "message" => "Berhasil menginput data barang masuk",
                    "data" => $bikinbarangmasuk
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    "message" => "Gagal menginput data barang masuk",
                    "error" => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_barang_masuk)
    {
        try {
            $barangmasuk = Barangmasuk::findOrFail($id_barang_masuk);

            return response()->json([
                "message" => "Berhasil ditemukan barang masuk ",
                "data" => $barangmasuk
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan barang masuk",
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
    public function destroy(string $id_barang_masuk)
    {
        $data_barang_masuk = Barangmasuk::find($id_barang_masuk);
        if(empty($data_barang_masuk))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_barang_masuk->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
