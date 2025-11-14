<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserSetting::all();

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
        $data = new UserSetting;

        $rules =[
            'user_id' => 'required|integer|exists:users,id',
            'child_id' => 'nullable|integer|exists:user_children,id',
            'jenis_kelamin' => 'nullable|string',
            'umur' => 'nullable|integer',
            'skor' => 'required|integer',
            'lencana' => 'required|string',
            'downtime' => 'nullable',
            'sleep_schedule_start' => 'nullable|date_format:H:i:s',
            'sleep_schedule_end' => 'nullable|date_format:H:i:s',
            'digital_freetime_start' => 'nullable|date_format:H:i:s',
            'digital_freetime_end' => 'nullable|date_format:H:i:s',

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
        $data->child_id = $request->child_id;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->umur = $request->umur;
        $data->skor = $request->skor;
        $data->lencana = $request->lencana;
        $data->downtime = $request->downtime;
        $data->sleep_schedule_start = $request->sleep_schedule_start;
        $data->sleep_schedule_end = $request->sleep_schedule_end;
        $data->digital_freetime_start = $request->digital_freetime_start;
        $data->digital_freetime_end = $request->digital_freetime_end;


        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = UserSetting::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
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
        $data = UserSetting::find($id);
        if (empty($data) ) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        $rules =[
            'user_id' => 'required|integer|exists:users,id',
            'child_id' => 'nullable|integer|exists:user_children,id',
            'jenis_kelamin' => 'nullable|string',
            'umur' => 'nullable|integer',
            'skor' => 'required|integer',
            'lencana' => 'required|string',
            'downtime' => 'nullable',
            'sleep_schedule_start' => 'nullable|date_format:H:i:s',
            'sleep_schedule_end' => 'nullable|date_format:H:i:s',
            'digital_freetime_start' => 'nullable|date_format:H:i:s',
            'digital_freetime_end' => 'nullable|date_format:H:i:s',
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'gagal melakukan update data',
                'data' => $validator->errors()
            ],422);
        }

    try {


        $data->fill($request->all());


        if ($request->has('child_id') && is_null($request->child_id)) {
             $data->child_id = null;
        }

        $data->save();


        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ], 200);

    } catch (\Exception $e) {


        Log::error("UserSetting Update API Error: " . $e->getMessage(), ['id' => $id, 'user' => $request->user()->id ?? 'Guest']);

        return response()->json([
            'status' => false,
            'message' => 'Terjadi kesalahan pada server saat mengupdate data.',
            'debug' => env('APP_DEBUG') ? $e->getMessage() : 'Internal Server Error'
        ], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
