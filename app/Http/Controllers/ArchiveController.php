<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $archives = Archive::where('judul', 'LIKE', "%{$request->keyword}%")->paginate(5);
        } else {
            $archives = Archive::paginate(5);
        }

        return view('arsip.index', compact('archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required|unique:archives,no_surat',
                'kategori' => 'required',
                'judul' => 'required',
                'file' => 'required|mimes:pdf'
            ],
            [],
            [
                'no_surat' => 'No surat'
            ]
        );

        if ($validator->fails()) {
            Alert::error(
                'Gagal!',
                'Arsip gagal diunggah.'
            );
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $filename = 'Arsip-' . time() . '.' . $request->file->extension();

            Archive::create([
                'no_surat' => $request->no_surat,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'file' => $filename,
                'created_at' => Carbon::now(),
            ]);

            $request->file('file')->storeAs('public', $filename);

            Alert::success(
                'Sukses!',
                'Data arsip berhasil diunggah.'
            );
            return redirect()->route('archives.index');
        } catch (\Throwable $th) {
            Alert::error(
                'Gagal!',
                'Terjadi kesalahan saat mengunggah data. error: ' . $th->getMessage()
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        return view('arsip.show', compact('archive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        return view('arsip.edit', compact('archive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required|unique:archives,no_surat,' . $archive->id,
                'kategori' => 'required',
                'judul' => 'required',
                'file' => 'mimes:pdf|nullable'
            ],
            [],
            [
                'no_surat' => 'nomor surat'
            ]
        );

        if ($validator->fails()) {
            Alert::error(
                'Gagal!',
                'Perubahan arsip gagal diperbarui.'
            );
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            if ($request->has('file')) {
                # code...
                Storage::disk('public')->delete($archive->file);

                $filename = 'Arsip-' . time() . '.' . $request->file->extension();
                // Storage::disk('public')->move($archive->file,$file)

                $archive->update([
                    'no_surat' => $request->no_surat,
                    'kategori' => $request->kategori,
                    'judul' => $request->judul,
                    'file' => $filename,
                    'updated_at' => Carbon::now(),
                ]);

                $request->file('file')->storeAs('public', $filename);
            } else {
                $archive->update([
                    'no_surat' => $request->no_surat,
                    'kategori' => $request->kategori,
                    'judul' => $request->judul,
                    'updated_at' => Carbon::now(),
                ]);
            }

            Alert::success(
                'Sukses!',
                'Data arsip berhasil diubah.'
            );
            return redirect()->route('archives.show', ['archive' => $archive]);
        } catch (\Throwable $th) {
            $request->file('file')->storeAs('public', $archive->file);
            Alert::error(
                'Gagal!',
                'Terjadi kesalahan saat mengupdate data. error: ' . $th->getMessage()
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        try {
            Storage::disk('public')->delete($archive->file);
            $archive->delete();
            Alert::success(
                'Sukses!',
                'Arsip surat berhasil dihapus.'
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error(
                'Gagal!',
                'Terjadi kesalahan saat menghapus data. error: ' . $th->getMessage()
            );
            return redirect()->back();
        }
    }
}
