<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemaQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemaQuizController extends Controller
{
    public function index()
    {
        $tema_quiz = TemaQuiz::orderBy('week', 'asc')->get();
        return view('admin.tema_quiz.index', compact('tema_quiz'));
    }


    public function create()
    {
        return view('admin.tema_quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topik' => 'nullable|string|max:255',
            'materi_relevan' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'week' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('tema_quiz', 'public');
        }

        TemaQuiz::create($data);

        // Redirect dengan session flash untuk memicu modal sukses
        return redirect()->route('tema_quiz.index')->with([
            'status' => 'success_modal',
            'message' => 'Data berhasil disimpan!',
        ]);
    }

    public function edit($id)
    {
        $tema = TemaQuiz::findOrFail($id);
        return view('admin.tema_quiz.edit', compact('tema'));
    }

    public function update(Request $request, $id)
{
    $tema = TemaQuiz::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'topik' => 'nullable|string|max:255',
        'materi_relevan' => 'nullable|string|max:255',
        // 'image' tetap nullable karena user mungkin tidak mengunggahnya
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'week' => 'nullable|integer',
    ]);

    // Ambil semua data dari request kecuali token dan method
    $data = $request->except(['_token', '_method']);

    if ($request->hasFile('image')) {
        // 1. Logika BENAR: Jika ada file baru diunggah, simpan file baru tersebut.
        $data['image'] = $request->file('image')->store('tema_quiz', 'public');

        // 2. OPSIONAL: Hapus gambar lama dari storage jika ada
        if ($tema->image) {
            Storage::disk('public')->delete($tema->image);
        }

    } else {
        // 3. JIKA TIDAK ADA FILE BARU, pastikan kunci 'image' tidak ada dalam $data
        // agar nilai 'image' lama tetap dipertahankan di database.
        unset($data['image']);
    }

    $tema->update($data);

    // Redirect dengan session flash untuk memicu modal sukses
    return redirect()->route('tema_quiz.index')->with([
        'status' => 'success_modal',
        'message' => 'Data berhasil diupdate!',
    ]);
}

    public function destroy($id)
    {
        $tema = TemaQuiz::findOrFail($id);
        $tema->delete();

        // Redirect dengan session flash untuk memicu modal sukses hapus
        return redirect()->route('tema_quiz.index')->with([
            'status' => 'success_modal',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
