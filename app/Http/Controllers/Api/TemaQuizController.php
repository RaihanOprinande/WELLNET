<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TemaQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemaQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TemaQuiz::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new TemaQuiz;

        $rules =[
            'title' => 'required',
            'topik' => 'required',
            'materi_relevan' => 'nullable',
            'image' => 'nullable',
            'description' => 'nullable',
            'week' => 'nullable',
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal memasukkan data',
                'data' => $validator->errors()
            ],400);
        }

        $data->title =$request->title;
        $data->topik = $request->topik;
        $data->materi_relevan = $request->materi_relevan;
        $data->image = $request->image;
        $data->description = $request->description;
        $data->week = $request->week;


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
        $data = TemaQuiz::find($id);

        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditampilkan',
                'data' => $data
            ],200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TemaQuiz::find($id);
        if (empty($data) ) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        $rules =[
            'title' => 'required',
            'topik' => 'required',
            'materi_relevan' => 'nullable',
            'image' => 'nullable',
            'description' => 'nullable',
            'week' => 'nullable',
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal melakukan update data',
                'data' => $validator->errors()
            ],400);
        }

        $data->title =$request->title;
        $data->topik = $request->topik;
        $data->materi_relevan = $request->materi_relevan;
        $data->image = $request->image;
        $data->description = $request->description;
        $data->week = $request->week;


        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
