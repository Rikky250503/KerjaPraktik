<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Useradmin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class UseradminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $useradmin = Useradmin::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Useradmin Ditemukan',
                'data'  => $useradmin
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
                "username" => "required|string",
                "password" => "required|string",
                "nama" => "required|string",
                "jabatan" => "required|string|email:rfc,dns|unique:users,email"
            ]
        );

        if ($validasi->fails()) {
            return response()->json([
                "message" => "Gagal membuat user baru",
                "error" => $validasi->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $validated = $validasi->validated();
            // Hashing password
            $validated["password"] = bcrypt($validated["password"]);
            try {
                $createdUser = Useradmin::create($validated);
                return response()->json([
                    "message" => "Suskses membuat sebuah user",
                    "data" => $createdUser
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    "message" => "Failed creating a new User",
                    "error" => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_user)
    {
        try {
            $useradmin = Useradmin::findOrFail($id_user);

            return response()->json([
                "message" => "Berhasil ditemukan data admin",
                "data" => $useradmin
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan data admin",
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
    public function destroy(string $id_user)
    {
        $data_user = Useradmin::find($id_user);
        if(empty($data_user))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_user->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}
