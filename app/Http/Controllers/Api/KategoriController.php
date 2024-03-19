<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $response['success'] = true;
        // $response['message'] = 'Berhasil di temukan';
        // $response['data'] = $kategori;

        // return response()->json($response, Response::HTTP_OK);
        try
        {
            $kategori = Kategori::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Kategori Ditemukan',
                'data'  => $kategori
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
    public function show(string $id_kategori)
    {
        try {
            $kategori = Kategori::findOrFail($id_kategori);

            return response()->json([
                "message" => "Berhasil ditemukan data kategori",
                "data" => $kategori
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data kategori",
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
    public function destroy(string $id_kategori)
    {
        $data_kategori = Kategori::find($id_kategori);
        if(empty($data_kategori))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_kategori->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
