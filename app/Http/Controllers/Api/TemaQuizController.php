<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogQuiz;
use App\Models\TemaQuiz;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemaQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $SettingId)
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
        $data = TemaQuiz::find($id);
        if (empty($data) ) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',
        ],200);
    }

        public function getTemaStatus($settingId)
    {
        // 1. Validasi Keberadaan Setting
        $setting = UserSetting::find($settingId);
        if (!$setting) {
            return response()->json([
                'status' => 'error',
                'message' => 'User Setting tidak ditemukan.'
            ], 404);
        }

        // 2. Ambil ID Tema yang sudah diselesaikan oleh user ini
        $completedTemaIds = LogQuiz::where('setting_id', $settingId)
            ->distinct()
            ->pluck('temaquiz_id')
            ->toArray();

        // 3. Ambil semua Tema Quiz, diurutkan berdasarkan week
        $allThemes = TemaQuiz::orderBy('week', 'asc')->get();

        $userAccessData = [];
        $unlockedNextWeek = true; // Flag untuk menandai apakah user bisa mengakses minggu berikutnya

        foreach ($allThemes as $theme) {
            $temaId = $theme->id;
            $status = 'Locked'; // Default

            // Cek apakah tema ini sudah diselesaikan
            if (in_array($temaId, $completedTemaIds)) {
                $status = 'Completed';
            }

            // Logika Akses Berjenjang
            if ($status == 'Completed' || $unlockedNextWeek) {
                 // Jika user sudah menyelesaikan tema sebelumnya ATAU ini adalah tema pertama yang diakses
                $status = (in_array($temaId, $completedTemaIds)) ? 'Completed' : 'Available';
                $unlockedNextWeek = true; // Set flag untuk membuka tema berikutnya
            } else {
                 // Jika tema saat ini terkunci
                 $status = 'Locked';
                 $unlockedNextWeek = false; // Pastikan tema selanjutnya juga terkunci
            }

            // Logika sederhana: Jika sudah completed, tema berikutnya available
            if ($theme->week > 1 && !in_array($temaId, $completedTemaIds) && $unlockedNextWeek) {
                // Jika ini bukan minggu pertama DAN tema sebelumnya sudah completed (sudah dihandle di atas)
                // Kita harus pastikan tema sebelumnya (week - 1) sudah diselesaikan untuk membuka tema ini
                $prevTema = TemaQuiz::where('week', $theme->week - 1)->first();
                if ($prevTema && !in_array($prevTema->id, $completedTemaIds)) {
                    $status = 'Locked';
                    $unlockedNextWeek = false;
                }
            }


            $userAccessData[] = [
                'id' => $theme->id,
                'week' => $theme->week,
                'title' => $theme->title,
                'status' => $status,
            ];

            // Update flag untuk tema berikutnya
            if ($status != 'Completed') {
                $unlockedNextWeek = false; // Jika tema saat ini belum selesai, kunci semua tema setelahnya
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar tema kuis dan status akses berhasil ditampilkan.',
            'data' => $userAccessData
        ], 200);
    }

}
