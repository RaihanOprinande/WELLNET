<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogPelanggaran;
use App\Models\UserSetting;
use Illuminate\Http\Request;

class LogPelanggaranController extends Controller
{
    public function index()
    {
        $logs = LogPelanggaran::with('setting')->latest()->get();
        return view('admin.log_pelanggaran.index', compact('logs'));
    }

    // public function create()
    // {
    //     $settings = UserSetting::all();
    //     return view('admin.log_pelanggaran.create', compact('settings'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'setting_id' => 'required|exists:user_setting,id',
    //         'pelanggaran' => 'required|string|max:255',
    //     ]);

    //     LogPelanggaran::create($request->all());
    //     return redirect()->route('log_pelanggaran.index')->with('success', 'Data berhasil ditambahkan');
    // }

    // public function edit($id)
    // {
    //     $log = LogPelanggaran::findOrFail($id);
    //     $settings = UserSetting::all();
    //     return view('admin.log_pelanggaran.edit', compact('log', 'settings'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'setting_id' => 'required|exists:user_setting,id',
    //         'pelanggaran' => 'required|string|max:255',
    //     ]);

    //     $log = LogPelanggaran::findOrFail($id);
    //     $log->update($request->all());
    //     return redirect()->route('log_pelanggaran.index')->with('success', 'Data berhasil diperbarui');
    // }

    public function show($id)
    {
        $log = LogPelanggaran::with('setting')->findOrFail($id);
        return view('admin.log_pelanggaran.show', compact('log'));
    }


    // public function destroy($id)
    // {
    //     $log = LogPelanggaran::findOrFail($id);
    //     $log->delete();
    //     return redirect()->route('log_pelanggaran.index')->with('success', 'Data berhasil dihapus');
    // }
}
