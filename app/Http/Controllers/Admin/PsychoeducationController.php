<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Psychoeducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PsychoeducationController extends Controller
{
    public function index()
    {
        $psychoeducation = Psychoeducation::orderBy('id', 'desc')->get();
        return view('admin.psychoeducation.index', compact('psychoeducation'));
    }

    public function create()
    {
        return view('admin.psychoeducation.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'link_yt' => 'nullable|string|max:255',
                'content' => 'required|string',
            ]);

            $data = $request->all();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('psychoeducation', 'public');
            }

            Psychoeducation::create($data);

            return redirect()->route('psychoeducation.index')->with([
                'status' => 'success_modal',
                'message' => 'Data berhasil disimpan!',
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                'status' => 'failed_modal',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        $psychoeducation = Psychoeducation::findOrFail($id);
        return view('admin.psychoeducation.edit', compact('psychoeducation'));
    }

    public function update(Request $request, $id)
    {
        $psychoeducation = Psychoeducation::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_yt' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('psychoeducation', 'public');

            if ($psychoeducation->image && Storage::disk('public')->exists($psychoeducation->image)) {
                Storage::disk('public')->delete($psychoeducation->image);
            }
        } else {
            unset($data['image']);
        }

        $psychoeducation->update($data);

        return redirect()->route('psychoeducation.index')->with([
            'status' => 'success_modal',
            'message' => 'Data berhasil diupdate!',
        ]);
    }

    public function show($id)
    {
        $psychoeducation = Psychoeducation::findOrFail($id);
        return view('admin.psychoeducation.show', compact('psychoeducation'));
    }


    public function destroy($id)
    {
        $psychoeducation = Psychoeducation::findOrFail($id);

        if ($psychoeducation->image && Storage::disk('public')->exists($psychoeducation->image)) {
            Storage::disk('public')->delete($psychoeducation->image);
        }

        $psychoeducation->delete();

        return redirect()->route('psychoeducation.index')->with([
            'status' => 'success_modal',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
