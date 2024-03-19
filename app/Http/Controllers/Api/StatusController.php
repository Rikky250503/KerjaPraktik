<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        try
        {
            $status = Status::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Status Ditemukan',
                'data'  => $status
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_status)
    {
        try {
            $status = Status::findOrFail($id_status);

            return response()->json([
                "message" => "Berhasil ditemukan data status",
                "data" => $status
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data status",
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
    public function destroy(string $id_status)
    {
        $data_status = Status::find($id_status);
        if(empty($data_status))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_status->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
