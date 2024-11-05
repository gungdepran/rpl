<?php

namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Fasilitas;
use App\Models\MediaSosial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display a listing of all destinasi wisata
    public function index()
    {
        // Fetch all destinasi wisata from the database
        $destinasiWisata = DestinasiWisata::all();
        return view('pages.create', compact('destinasiWisata'));
    }

    // Show the form for creating a new destinasi wisata
    public function create()
    {
        return view('pages.create'); // Page to add new destination
    }

    // Store a newly created destinasi wisata in the database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'rating_destinasi' => 'nullable|numeric|min:0|max:5',
            'contact_person' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'jenis_wisata' => 'required|string|max:255',
            'reservasi' => 'required|string|max:255',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'foto_destinasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fasilitas' => 'array',
            'social_media' => 'array',
        ]);

        // Menyimpan data destinasi wisata
        $destinasiWisata = new DestinasiWisata();
        $destinasiWisata->nama_destinasi = $request->nama_destinasi;
        $destinasiWisata->kabupaten_kota = $request->kabupaten_kota;
        $destinasiWisata->harga_tiket = $request->harga_tiket;
        $destinasiWisata->rating_destinasi = $request->rating_destinasi;
        $destinasiWisata->contact_person = $request->contact_person;
        $destinasiWisata->alamat_lengkap = $request->alamat_lengkap;
        $destinasiWisata->jenis_wisata = $request->jenis_wisata;
        $destinasiWisata->reservasi = $request->reservasi;
        $destinasiWisata->jam_buka = $request->jam_buka;
        $destinasiWisata->jam_tutup = $request->jam_tutup;

        // Mengupload foto destinasi
        if ($request->hasFile('foto_destinasi')) {
            $filename = $request->file('foto_destinasi')->store('destinasi', 'public');
            $destinasiWisata->foto_destinasi = $filename;
        }

        $destinasiWisata->save();

        // Menyimpan media sosial
        if ($request->has('social_media')) {
            foreach ($request->social_media as $website) {
                $destinasiMedsos = new MediaSosial();
                $destinasiMedsos->id_destinasi = $destinasiWisata->id_destinasi; // Ambil ID destinasi
                $destinasiMedsos->website_medsos = $website;
                $destinasiMedsos->save();
            }
        }

        // Menyimpan fasilitas
        if ($request->has('fasilitas')) {
            foreach ($request->fasilitas as $fasilitas) {
                $destinasiFasilitas = new Fasilitas();
                $destinasiFasilitas->id_destinasi = $destinasiWisata->id_destinasi; // Ambil ID destinasi
                $destinasiFasilitas->fasilitas = $fasilitas;
                $destinasiFasilitas->save();
            }
        }

        $destinasiWisata->save();
        return redirect()->route('pages.index')->with('success', 'Data berhasil disimpan.');
    }


    public function edit($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        return view('pages.edit', compact('destinasiWisata'));
    }
    // Update the specified destinasi wisata in the database
    public function update(Request $request, string $id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);

        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'kabupaten_kota' => 'required|in:Buleleng,Badung,Gianyar,Karangasem,Klungkung,Tabanan,Bangli,Jembrana',
            'harga_tiket' => 'required|string',
            'rating_destinasi' => 'numeric|min:0|max:5',
            'contact_person' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'jenis_wisata' => 'required|string',
            'reservasi' => 'required|string',
            'jam_buka' => 'required|date_format:H:i:s',
            'jam_tutup' => 'required|date_format:H:i:s'
        ]);

        $destinasiWisata->update($request->all());

        return redirect()->route('pages.index')->with('success', 'Data berhasil diupdate.');
    }

    // Remove the specified destinasi wisata from the database
    public function destroy(string $id)
    {
        // Find and delete the destinasi wisata
        DestinasiWisata::destroy($id);

        // Redirect with success message
        return redirect()->route('pages.create')->with('success', 'Data berhasil dihapus.');
    }
}
