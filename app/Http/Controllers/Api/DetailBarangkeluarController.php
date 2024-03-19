<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailBarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetailBarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $detailbarangkeluar = DetailBarangKeluar::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Detail barang keluar ditemukan',
                'data'  => $detailbarangkeluar
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
    public function show(string $id_detail_barang_keluar)
    {
        try {
            $detailbarangkeluar = DetailBarangKeluar::findOrFail($id_detail_barang_keluar);

            return response()->json([
                "message" => "Berhasil ditemukan data detail barang keluar",
                "data" => $detailbarangkeluar
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data detail barang keluar",
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
    public function destroy(string $id_detail_barang_keluar)
    {
        $data_detail_barang_keluar = DetailBarangKeluar::find($id_detail_barang_keluar);
        if(empty($data_detail_barang_keluar))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_detail_barang_keluar->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
