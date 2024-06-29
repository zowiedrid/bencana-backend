<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebutuhan; // Import Kebutuhan Model
use App\Models\Barang; // Import Barang Model
use App\Models\Bencana; // Import Bencana Model
use App\Models\User; // Import User Model

class KebutuhanController extends Controller
{
    public function index(Request $request)
    {
        // Define a list of valid column names
        $valid_columns = ['id', 'jenis_barang_id', 'jumlah_dibutuhkan', 'lokasi_kebutuhan', 'bencana_id', 'user_id'];

        // Get the 'sort_by' parameter from the request or session, or default to 'id'
        $sort_by = $request->get('sort_by', $request->session()->get('sort_by', 'id'));

        // If 'sort_by' is not a valid column name, default to 'id'
        if (!in_array($sort_by, $valid_columns)) {
            $sort_by = 'id';
        }

        // Store 'sort_by' in the session
        $request->session()->put('sort_by', $sort_by);

        // Get the 'sort_order' parameter from the request, or default to 'asc'
        $sort_order = $request->get('sort_order', 'asc');

        // Start the query
        $query = Kebutuhan::orderBy($sort_by, $sort_order);

        // If there's a 'search' parameter in the request, add a where clause to the query
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('lokasi_kebutuhan', 'like', "%{$search}%");
            });
        }


        // Start the query
        $query = Kebutuhan::join('barang', 'kebutuhan.jenis_barang_id', '=', 'barang.id')
            ->select('kebutuhan.*', 'barang.nama_barang')
            ->orderBy('barang.nama_barang', $sort_order); // Change here


        // Get the kebutuhan sorted by 'sort_by' and paginate the results
        $kebutuhans = $query->paginate(10);

        return view('kebutuhan.index', compact('kebutuhans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $bencanas = Bencana::all();
        $users = User::all();
        return view('kebutuhan.create', compact('barangs', 'bencanas', 'users'));
    }

    public function store(Request $request, Kebutuhan $kebutuhan)
    {
        $request->validate([
            'jenis_barang_id' => 'required',
            'jumlah_dibutuhkan' => 'required',
            'lokasi_kebutuhan' => 'required',
            'bencana_id' => 'required',
            'user_id' => 'required',
        ]);

        $kebutuhan->jenis_barang_id = $request->jenis_barang_id;
        $kebutuhan->jumlah_dibutuhkan = $request->jumlah_dibutuhkan;
        $kebutuhan->lokasi_kebutuhan = $request->lokasi_kebutuhan;
        $kebutuhan->bencana_id = $request->bencana_id;
        $kebutuhan->user_id = $request->user_id;
        $kebutuhan->save();

        return redirect()->route('kebutuhan.index')->with('success', 'Kebutuhan created successfully');
    }

    public function show($id)
    {
        $kebutuhan = Kebutuhan::find($id);
        return view('kebutuhan.show', ['kebutuhan' => $kebutuhan]);
    }

    public function destroy($id)
    {
        $kebutuhan = Kebutuhan::find($id);

        if ($kebutuhan) {
            $kebutuhan->delete();
            return back()->with('success', 'Kebutuhan deleted successfully');
        }

        return back()->with('error', 'Kebutuhan not found');
    }

    public function edit($id)
    {
        $kebutuhan = Kebutuhan::find($id);
        $barangs = Barang::all();
        $bencanas = Bencana::all();
        $users = User::all();

        if ($kebutuhan) {
            return view('kebutuhan.edit', compact('kebutuhan', 'barangs', 'bencanas', 'users'));
        }

        return back()->with('error', 'Kebutuhan not found');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_barang_id' => 'required',
            'jumlah_dibutuhkan' => 'required',
            'lokasi_kebutuhan' => 'required',
            'bencana_id' => 'required',
            'user_id' => 'required',
        ]);

        $kebutuhan = Kebutuhan::find($id);
        if ($kebutuhan) {
            $kebutuhan->jenis_barang_id = $request->jenis_barang_id;
            $kebutuhan->jumlah_dibutuhkan = $request->jumlah_dibutuhkan;
            $kebutuhan->lokasi_kebutuhan = $request->lokasi_kebutuhan;
            $kebutuhan->bencana_id = $request->bencana_id;
            $kebutuhan->user_id = $request->user_id;
            $kebutuhan->save();

            return redirect()->route('kebutuhan.index')->with('success', 'Kebutuhan updated successfully');
        }

        return back()->with('error', 'Kebutuhan not found');
    }

}
