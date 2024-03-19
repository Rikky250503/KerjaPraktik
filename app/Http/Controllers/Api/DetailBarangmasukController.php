<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailBarangKeluar;
use App\Models\DetailBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetailBarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $detailbarangmasuk = DetailBarangMasuk::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Detail barang masuk ditemukan',
                'data'  => $detailbarangmasuk
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
    public function show(string $id_detail_barang_masuk)
    {
        try {
            $detailbarangmasuk = DetailBarangMasuk::findOrFail($id_detail_barang_masuk);

            return response()->json([
                "message" => "Berhasil ditemukan data detail barang masuk",
                "data" => $detailbarangmasuk
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data detail barang masuk",
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
    public function destroy(string $id_detail_barang_masuk)
    {
        $data_detail_barang_masuk = DetailBarangMasuk::find($id_detail_barang_masuk);
        if(empty($data_detail_barang_masuk))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_detail_barang_masuk->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
