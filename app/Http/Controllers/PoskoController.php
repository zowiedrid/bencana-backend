<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posko; // Import Posko Model
use App\Models\Daerah; // Import Daerah Model

class PoskoController extends Controller
{
    public function index(Request $request)
    {
        // Define a list of valid column names
        $valid_columns = ['id', 'nama_posko', 'alamat', 'kontak_penanggung_jawab', 'daerah_id'];

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
        $query = Posko::orderBy($sort_by, $sort_order);

        // If there's a 'search' parameter in the request, add a where clause to the query
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nama_posko', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('kontak_penanggung_jawab', 'like', "%{$search}%");
            });
        }

        // Start the query
        if ($sort_by == 'daerah_id') {
            $query = Posko::join('daerah', 'posko.daerah_id', '=', 'daerah.id')
                ->select('posko.*', 'daerah.nama_desa')
                ->orderBy('daerah.nama_desa', $sort_order);
        } else {
            $query = Posko::orderBy($sort_by, $sort_order);
        }

        // Get the posko sorted by 'sort_by' and paginate the results
        $poskos = $query->paginate(10);

        return view('posko.index', compact('poskos'));
    }

    public function create()
    {
        $daerahs = Daerah::all();
        return view('posko.create', compact('daerahs'));
    }

    public function store(Request $request, Posko $posko)
    {
        $request->validate([
            'nama_posko' => 'required',
            'alamat' => 'required',
            'kontak_penanggung_jawab' => 'required',
            'daerah_id' => 'required',
        ]);

        $posko->nama_posko = $request->nama_posko;
        $posko->alamat = $request->alamat;
        $posko->kontak_penanggung_jawab = $request->kontak_penanggung_jawab;
        $posko->daerah_id = $request->daerah_id;
        $posko->save();

        return redirect()->route('posko.index')->with('success', 'Posko created successfully');
    }

    public function show($id)
    {
        $posko = Posko::find($id);
        return view('posko.show', ['posko' => $posko]);
    }

    public function bulkDelete(Request $request)
    {
        if ($request->has('selected_ids')) {
            Posko::whereIn('id', $request->selected_ids)->delete();
            return back()->with('success', 'Poskos deleted successfully');
        }

        return back()->with('error', 'No poskos selected');
    }

    public function destroy($id)
    {
        $posko = Posko::find($id);

        if ($posko) {
            $posko->delete();
            return back()->with('success', 'Posko deleted successfully');
        }

        return back()->with('error', 'Posko not found');
    }

    public function edit($id)
    {
        $posko = Posko::find($id);
        $daerahs = Daerah::all();

        if ($posko) {
            return view('posko.edit', compact('posko', 'daerahs'));
        }

        return back()->with('error', 'Posko not found');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_posko' => 'required',
            'alamat' => 'required',
            'kontak_penanggung_jawab' => 'required',
            'daerah_id' => 'required',
        ]);

        $posko = Posko::find($id);
        if ($posko) {
            $posko->nama_posko = $request->nama_posko;
            $posko->alamat = $request->alamat;
            $posko->kontak_penanggung_jawab = $request->kontak_penanggung_jawab;
            $posko->daerah_id = $request->daerah_id;
            $posko->save();

            return redirect()->route('posko.index')->with('success', 'Posko updated successfully');
        }

        return back()->with('error', 'Posko not found');
    }
}
