<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $barangkeluar = Barangkeluar::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Barang Keluar Ditemukan',
                'data'  => $barangkeluar
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
        // untuk validasi sesuai type data
        $validasi = Validator::make(
            $request->all(),
            [
                "tanggal_keluar" => "required|Date",
                "nomor_invoice_keluar" => "required|String",
                "total" => "required|Double",
                "nama_pemesan" => "required|String",
                "alamat_pemesanan" => "required|String",
                "no_hp_pemesan" => "required|String",
            ]
        );

        if ($validasi->fails()) {
            return response()->json([
                "message" => "Gagal menginput data barang keluar",
                "error" => $validasi->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $validated = $validasi->validated();
            try {
                $bikinbarangkeluar = Barangkeluar::create($validated);
                return response()->json([
                    "message" => "Berhasil menginput data barang keluar",
                    "data" => $bikinbarangkeluar
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    "message" => "Gagal menginput data barang keluar",
                    "error" => $e->getMessage()
                ]);
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id_barang_keluar)
    {
        try {
            $barangkeluar = Barangkeluar::findOrFail($id_barang_keluar);

            return response()->json([
                "message" => "Berhasil ditemukan data barang keluar",
                "data" => $barangkeluar
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data barang keluar",
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
    public function destroy(string $id_barang_keluar)
    {
        $data_barangkeluar = Barangkeluar::find($id_barang_keluar);
        if(empty($data_barangkeluar))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_barangkeluar->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
