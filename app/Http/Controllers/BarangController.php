<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;


class BarangController extends Controller
{
    public function index(Request $request)
    {
        // Define a list of valid column names
        $valid_columns = ['nama_barang', 'deskripsi', 'satuan', 'keterangan']; // Add other column names as needed

        // Get the 'sort_by' parameter from the request or session, or default to 'nama_barang'
        $sort_by = $request->get('sort_by', $request->session()->get('sort_by', 'nama_barang'));

        // If 'sort_by' is not a valid column name, default to 'nama_barang'
        if (!in_array($sort_by, $valid_columns)) {
            $sort_by = 'nama_barang';
        }

        // Store 'sort_by' in the session
        $request->session()->put('sort_by', $sort_by);

        // Get the 'sort_order' parameter from the request, or default to 'asc'
        $sort_order = $request->get('sort_order', 'asc');

        // Start the query
        $query = Barang::orderBy($sort_by, $sort_order);

        // If there's a 'search' parameter in the request, add a where clause to the query
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nama_barang', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('satuan', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        // Get the barangs sorted by 'sort_by' and paginate the results
        $barangs = $query->paginate(10);

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);

        $barang = new Barang;

        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->satuan = $request->satuan;
        $barang->keterangan = $request->keterangan;

        $barang->save();

        return redirect('/barang');
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        return view('barang.show', ['barang' => $barang]);
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', ['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);

        $barang = Barang::find($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->satuan = $request->satuan;
        $barang->keterangan = $request->keterangan;

        $barang->save();

        return redirect('/barang');
    }
}
