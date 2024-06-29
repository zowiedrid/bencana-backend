<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daerah; // Import Daerah Model

class DaerahController extends Controller
{
    public function index(Request $request)
    {
        // Define a list of valid column names
        $valid_columns = ['id', 'nama_kabupaten', 'nama_kecamatan', 'nama_kelurahan', 'nama_desa', 'koordinat'];

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
        $query = Daerah::orderBy($sort_by, $sort_order);

        // If there's a 'search' parameter in the request, add a where clause to the query
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nama_kabupaten', 'like', "%{$search}%")
                    ->orWhere('nama_kecamatan', 'like', "%{$search}%")
                    ->orWhere('nama_kelurahan', 'like', "%{$search}%")
                    ->orWhere('nama_desa', 'like', "%{$search}%");
            });
        }

        // Get the daerah sorted by 'sort_by' and paginate the results
        $daerahs = $query->paginate(10);

        return view('daerah.index', compact('daerahs'));
    }

    public function create()
    {
        return view('daerah.create');
    }

    public function store(Request $request, Daerah $daerah)
    {
        $request->validate([
            'nama_kabupaten' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kelurahan' => 'required',
            'nama_desa' => 'required',
            'koordinat' => 'required',
        ]);

        $daerah->nama_kabupaten = $request->nama_kabupaten;
        $daerah->nama_kecamatan = $request->nama_kecamatan;
        $daerah->nama_kelurahan = $request->nama_kelurahan;
        $daerah->nama_desa = $request->nama_desa;
        $daerah->koordinat = $request->koordinat;
        $daerah->save();

        return redirect()->route('daerah.index')->with('success', 'Daerah created successfully');
    }

    public function show($id)
    {
        $daerah = Daerah::find($id);
        return view('daerah.show', ['daerah' => $daerah]);
    }

    public function bulkDelete(Request $request)
    {
        if ($request->has('selected_ids')) {
            Daerah::whereIn('id', $request->selected_ids)->delete();
            return back()->with('success', 'Daerahs deleted successfully');
        }

        return back()->with('error', 'No daerahs selected');
    }

    public function destroy($id)
    {
        $daerah = Daerah::find($id);

        if ($daerah) {
            $daerah->delete();
            return back()->with('success', 'Daerah deleted successfully');
        }

        return back()->with('error', 'Daerah not found');
    }

    public function edit($id)
    {
        $daerah = Daerah::find($id);

        if ($daerah) {
            return view('daerah.edit', compact('daerah'));
        }

        return back()->with('error', 'Daerah not found');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kabupaten' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kelurahan' => 'required',
            'nama_desa' => 'required',
            'koordinat' => 'required',
        ]);

        $daerah = Daerah::find($id);
        if ($daerah) {
            $daerah->nama_kabupaten = $request->nama_kabupaten;
            $daerah->nama_kecamatan = $request->nama_kecamatan;
            $daerah->nama_kelurahan = $request->nama_kelurahan;
            $daerah->nama_desa = $request->nama_desa;
            $daerah->koordinat = $request->koordinat;
            $daerah->save();

            return redirect()->route('daerah.index')->with('success', 'Daerah updated successfully');
        }

        return back()->with('error', 'Daerah not found');
    }
}
