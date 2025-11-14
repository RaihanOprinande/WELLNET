<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OpsiSoal;
use Illuminate\Http\Request;

class OpsiQuizController extends Controller
{
    public function index(){
        $data = OpsiSoal::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);

    }

    public function show(string $id){
        $data = OpsiSoal::with('soal')->find($id);

        if(!$data){
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }

    public function showcustom(string $id){
        $data = OpsiSoal::with('soal')->where('soalquiz_id',$id)->get();

        if($data->isEmpty()){
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }
}
