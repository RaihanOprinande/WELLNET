<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LogQuiz::all();

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
         $data = new LogQuiz;

        $rules =[
            'user_id' => 'required',
            'temaquiz_id' => 'required',
            'soalquiz_id' => 'required',
            'jawaban_user' => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal memasukkan data',
                'data' => $validator->errors()
            ],400);
        }

        $data->user_id =$request->user_id;
        $data->temaquiz_id = $request->temaquiz_id;
        $data->soalquiz_id = $request->soalquiz_id;
        $data->jawaban_user = $request->jawaban_user;


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
        $data = LogQuiz::find($id);

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
        $data = LogQuiz::with('user')->where("user_id",$id)->get();

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
