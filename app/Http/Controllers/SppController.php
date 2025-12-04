<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{
    // GET ALL
    public function index()
    {
        $data = Spp::all();
        return response()->json([
            'success' => true,
            'message' => 'List data Spp',
            'data' => $data
        ], 200);
    }

    // GET DETAIL
    public function show($id)
    {
        $data = Spp::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Spp tidak ditemukan'
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
            'nilai' => 'required',
            'jumlah' => 'required',
            'ppk' => 'required',
        ]);

        $spp = Spp::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data SPP berhasil ditambahkan',
            'data' => $spp
        ], 201);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $spp = Spp::find($id);

        if (!$spp) {
            return response()->json([
                'success' => false,
                'message' => 'Data SPP tidak ditemukan'
            ], 404);
        }

        $spp->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data SPP berhasil diperbarui',
            'data' => $spp
        ], 200);
    }

    // DELETE
    public function destroy($id)
    {
        $spp = Spp::find($id);

        if (!$spp) {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }

        $spp->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pegawai berhasil dihapus'
        ], 200);
    }
}
