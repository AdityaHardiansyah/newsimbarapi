<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    // GET ALL
    public function index()
    {
        $data = Pegawai::all();
        return response()->json([
            'success' => true,
            'message' => 'List data pegawai',
            'data' => $data
        ], 200);
    }

    // GET DETAIL
    public function show($id)
    {
        $data = Pegawai::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
            'NIP' => 'required',
            'Nama' => 'required',
            'alamat' => 'required',
        ]);

        $pegawai = Pegawai::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil ditambahkan',
            'data' => $pegawai
        ], 201);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        $pegawai->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil diperbarui',
            'data' => $pegawai
        ], 200);
    }

    // DELETE
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        $pegawai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil dihapus'
        ], 200);
    }
}
