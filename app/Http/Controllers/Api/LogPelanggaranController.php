<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LogPelanggaran::with('setting')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new LogPelanggaran;

        $rules =[
            'setting_id' => 'required|integer|exists:user_setting,id',
            'pelanggaran' => 'required|string'


        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal memasukkan data',
                'data' => $validator->errors()
            ],400);
        }

        $data->setting_id = $request->setting_id;
        $data->pelanggaran = $request->pelanggaran;


        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            // 'data' => $data
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = LogPelanggaran::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }

        public function showuser(string $id){

        $data = LogPelanggaran::with('setting')->where("setting_id",$id)->get();

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => null
            ],404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);


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
    public function destroy(string $id)
    {
        //
    }
}
