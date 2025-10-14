<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Psychoeducation;
use Illuminate\Http\Request;

class PsychoeducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Psychoeducation::all();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Psychoeducation::find($id);

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
