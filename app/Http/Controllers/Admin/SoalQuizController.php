<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoalQuiz;
use App\Models\TemaQuiz;
use App\Models\OpsiSoal;
use Illuminate\Http\Request;

class SoalQuizController extends Controller
{
    public function index()
    {
        $soal_quiz = SoalQuiz::with('tema')->latest()->get();
        return view('admin.soal_quiz.index', compact('soal_quiz'));
    }

    public function create()
    {
        $tema_quiz = TemaQuiz::orderBy('week', 'asc')->get();
        return view('admin.soal_quiz.create', compact('tema_quiz'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'temaquiz_id' => 'required',
            'pertanyaan' => 'required',
            'opsi' => 'required|array|min:2',
            'jawaban_benar' => 'required'
        ]);

        $soal = SoalQuiz::create([
            'temaquiz_id' => $request->temaquiz_id,
            'pertanyaan' => $request->pertanyaan,
            'jawaban_benar' => $request->opsi[$request->jawaban_benar],
        ]);

        foreach ($request->opsi as $index => $opsiText) {
            OpsiSoal::create([
                'soalquiz_id' => $soal->id,
                'opsi' => $opsiText,
                'is_correct' => $index == $request->jawaban_benar ? 1 : 0,
            ]);
        }

        // Flash session untuk modal sukses
        return redirect()->route('soal_quiz.index')->with([
            'status' => 'success_modal',
            'message' => 'Soal quiz berhasil ditambahkan!',
        ]);
    }

    public function edit($id)
    {
        $soal_quiz = SoalQuiz::findOrFail($id);
        $tema_quiz = TemaQuiz::orderBy('week', 'asc')->get();

        return view('admin.soal_quiz.edit', compact('soal_quiz', 'tema_quiz'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'temaquiz_id' => 'required',
            'pertanyaan' => 'required',
            'opsi' => 'required|array|min:2',
            'jawaban_benar' => 'required'
        ]);

        $soal = SoalQuiz::findOrFail($id);

        $soal->update([
            'temaquiz_id' => $request->temaquiz_id,
            'pertanyaan' => $request->pertanyaan,
            'jawaban_benar' => $request->opsi[$request->jawaban_benar] ?? null,
        ]);

        // Hapus opsi lama
        $soal->opsi()->delete();

        // Simpan ulang opsi baru
        foreach ($request->opsi as $index => $opsiText) {
            OpsiSoal::create([
                'soalquiz_id' => $soal->id,
                'opsi' => $opsiText,
                'is_correct' => $index == $request->jawaban_benar ? 1 : 0,
            ]);
        }

        // Flash session untuk modal sukses
        return redirect()->route('soal_quiz.index')->with([
            'status' => 'success_modal',
            'message' => 'Soal quiz berhasil diperbarui!',
        ]);
    }

    public function show($id)
    {
        $soal_quiz = SoalQuiz::with('tema')->findOrFail($id);
        return view('admin.soal_quiz.show', compact('soal_quiz'));
    }

    public function destroy($id)
    {
        $soal = SoalQuiz::findOrFail($id);
        $soal->delete();

        // Flash session untuk modal sukses hapus
        return redirect()->route('soal_quiz.index')->with([
            'status' => 'success_modal',
            'message' => 'Soal berhasil dihapus!',
        ]);
    }
}
