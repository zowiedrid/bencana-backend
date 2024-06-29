<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribusi; // Import Distribusi Model
use App\Models\Barang; // Import Barang Model
use App\Models\Posko; // Import Posko Model
use App\Models\User; // Import User Model

class DistribusiController extends Controller
{
    public function index(Request $request)
    {
        $valid_columns = ['id', 'tanggal_distribusi', 'jenis_barang_id', 'jumlah_didistribusikan', 'lokasi_distribusi', 'penerima_bantuan', 'user_id'];
        $sort_by = $request->get('sort_by', $request->session()->get('sort_by', 'id'));
        if (!in_array($sort_by, $valid_columns)) {
            $sort_by = 'id';
        }
        $request->session()->put('sort_by', $sort_by);
        $sort_order = $request->get('sort_order', 'asc');
        $query = Distribusi::orderBy($sort_by, $sort_order);
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('penerima_bantuan', 'like', "%{$search}%");
            });
        }
        $distribusis = $query->paginate(10);
        return view('distribusi.index', compact('distribusis'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $poskos = Posko::all();
        $users = User::all();
        return view('distribusi.create', compact('barangs', 'poskos', 'users'));
    }

    public function store(Request $request, Distribusi $distribusi)
    {
        $request->validate([
            'tanggal_distribusi' => 'required',
            'jenis_barang_id' => 'required',
            'jumlah_didistribusikan' => 'required',
            'lokasi_distribusi' => 'required',
            'penerima_bantuan' => 'required',
            'user_id' => 'required',
        ]);

        $distribusi->tanggal_distribusi = $request->tanggal_distribusi;
        $distribusi->jenis_barang_id = $request->jenis_barang_id;
        $distribusi->jumlah_didistribusikan = $request->jumlah_didistribusikan;
        $distribusi->lokasi_distribusi = $request->lokasi_distribusi;
        $distribusi->penerima_bantuan = $request->penerima_bantuan;
        $distribusi->user_id = $request->user_id;
        $distribusi->keterangan = $request->keterangan;
        $distribusi->save();

        return redirect()->route('distribusi.index')->with('success', 'Distribusi created successfully');
    }

    public function show($id)
    {
        $distribusi = Distribusi::find($id);
        return view('distribusi.show', ['distribusi' => $distribusi]);
    }

    public function destroy($id)
    {
        $distribusi = Distribusi::find($id);
        if ($distribusi) {
            $distribusi->delete();
            return back()->with('success', 'Distribusi deleted successfully');
        }
        return back()->with('error', 'Distribusi not found');
    }

    public function edit($id)
    {
        $distribusi = Distribusi::find($id);
        $barangs = Barang::all();
        $poskos = Posko::all();
        $users = User::all();
        if ($distribusi) {
            return view('distribusi.edit', compact('distribusi', 'barangs', 'poskos', 'users'));
        }
        return back()->with('error', 'Distribusi not found');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_distribusi' => 'required',
            'jenis_barang_id' => 'required',
            'jumlah_didistribusikan' => 'required',
            'lokasi_distribusi' => 'required',
            'penerima_bantuan' => 'required',
            'user_id' => 'required',
        ]);

        $distribusi = Distribusi::find($id);
        if ($distribusi) {
            $distribusi->tanggal_distribusi = $request->tanggal_distribusi;
            $distribusi->jenis_barang_id = $request->jenis_barang_id;
            $distribusi->jumlah_didistribusikan = $request->jumlah_didistribusikan;
            $distribusi->lokasi_distribusi = $request->lokasi_distribusi;
            $distribusi->penerima_bantuan = $request->penerima_bantuan;
            $distribusi->user_id = $request->user_id;
            $distribusi->keterangan = $request->keterangan;
            $distribusi->save();

            return redirect()->route('distribusi.index')->with('success', 'Distribusi updated successfully');
        }
        return back()->with('error', 'Distribusi not found');
    }
}
