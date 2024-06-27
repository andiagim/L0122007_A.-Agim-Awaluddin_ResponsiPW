<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = Mahasiswa::where('nim', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->orWhere('age', 'like', "%$katakunci%")
                ->orWhere('address', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Mahasiswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('age', $request->age);
        Session::flash('address', $request->address);

        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:mahasiswa',
            'jurusan' => 'required|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required',
        ], [
            'nim.required' => 'NIM wajib diisi',
            'nim.numeric' => 'NIM wajib dalam angka',
            'nim.unique' => 'NIM yang diisikan sudah ada dalam database',
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'age.required' => 'Umur wajib diisi',
            'address.required' => 'Alamat wajib diisi',
        ]);
        $data = [
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'age' => $request->age,
            'address' => $request->address,
        ];
        Mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'age' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'age.required' => 'Umur wajib diisi',
            'address.required' => 'Alamat wajib diisi',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'age' => $request->age,
            'address' => $request->address,
        ];
        Mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan delete data');
    }
}
