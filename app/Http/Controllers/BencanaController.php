<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bencana;

class BencanaController extends Controller
{
    public function index(Request $request)
    {
        $valid_columns = ['nama_bencana', 'tanggal_kejadian', 'waktu_kejadian', 'lokasi_kejadian', 'tingkat_keparahan_bencana', 'jumlah_korban', 'jumlah_pengungsi', 'kerugian_materi', 'deskripsi'];

        $sort_by = $request->get('sort_by', $request->session()->get('sort_by', 'nama_bencana'));

        if (!in_array($sort_by, $valid_columns)) {
            $sort_by = 'nama_bencana';
        }

        $request->session()->put('sort_by', $sort_by);

        $sort_order = $request->get('sort_order', 'asc');

        $query = Bencana::orderBy($sort_by, $sort_order);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nama_bencana', 'like', "%{$search}%")
                    ->orWhere('lokasi_kejadian', 'like', "%{$search}%")
                    ->orWhere('tingkat_keparahan_bencana', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $bencanas = $query->paginate(10);

        return view('bencana.index', compact('bencanas'));
    }

    public function create()
    {
        return view('bencana.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bencana' => 'required',
            'tanggal_kejadian' => 'required',
            'waktu_kejadian' => 'required',
            'lokasi_kejadian' => 'required',
            'tingkat_keparahan_bencana' => 'required',
            'jumlah_korban' => 'required',
            'jumlah_pengungsi' => 'required',
            'kerugian_materi' => 'required',
            'deskripsi' => 'required',
        ]);

        $bencana = new Bencana;

        $bencana->nama_bencana = $request->nama_bencana;
        $bencana->tanggal_kejadian = $request->tanggal_kejadian;
        $bencana->waktu_kejadian = $request->waktu_kejadian;
        $bencana->lokasi_kejadian = $request->lokasi_kejadian;
        $bencana->tingkat_keparahan_bencana = $request->tingkat_keparahan_bencana;
        $bencana->jumlah_korban = $request->jumlah_korban;
        $bencana->jumlah_pengungsi = $request->jumlah_pengungsi;
        $bencana->kerugian_materi = $request->kerugian_materi;
        $bencana->deskripsi = $request->deskripsi;

        $bencana->save();

        return redirect('/bencana');
    }

    public function show($id)
    {
        $bencana = Bencana::find($id);
        return view('bencana.show', ['bencana' => $bencana]);
    }

    public function edit($id)
    {
        $bencana = Bencana::find($id);
        return view('bencana.edit', ['bencana' => $bencana]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bencana' => 'required',
            'tanggal_kejadian' => 'required',
            'waktu_kejadian' => 'required',
            'lokasi_kejadian' => 'required',
            'tingkat_keparahan_bencana' => 'required',
            'jumlah_korban' => 'required',
            'jumlah_pengungsi' => 'required',
            'kerugian_materi' => 'required',
            'deskripsi' => 'required',
        ]);

        $bencana = Bencana::find($id);

        $bencana->nama_bencana = $request->nama_bencana;
        $bencana->tanggal_kejadian = $request->tanggal_kejadian;
        $bencana->waktu_kejadian = $request->waktu_kejadian;
        $bencana->lokasi_kejadian = $request->lokasi_kejadian;
        $bencana->tingkat_keparahan_bencana = $request->tingkat_keparahan_bencana;
        $bencana->jumlah_korban = $request->jumlah_korban;
        $bencana->jumlah_pengungsi = $request->jumlah_pengungsi;
        $bencana->kerugian_materi = $request->kerugian_materi;
        $bencana->deskripsi = $request->deskripsi;

        $bencana->save();

        return redirect('/bencana');
    }
}
