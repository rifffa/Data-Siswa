<?php

namespace App\Http\Controllers;

use App\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }
    public function datasiswa()
    {
        $datasiswa = Datasiswa::orderBy('id', 'desc')->get();
        return view("datasiswa", ["key" => "datasiswa", "mv" => $datasiswa]);
    }

    public function adddatasiswa()
    {
    $key = 'datasiswa';
    $em = new \stdClass(); // Inisialisasi objek kosong
    $em->prodi = ''; // Inisialisasi properti prodi
    return view('tambahsiswa', compact('em', 'key'));
    }

    public function savedatasiswa(request $request)
    {
        // mengambil nama file 
        $nama_file = time().'_'.$request->file('foto')->getClientOriginalName();

        // menyimpan file ke dalam folder
        $path = $request->file('foto')->storeAs('foto', $nama_file, 'public');


        DataSiswa::create([
            'nama' => $request -> nama,
            'nim' => $request -> nim,
            'prodi' => $request -> prodi,
            'foto' => $path
        ]);
        return redirect('/datasiswa')->with('alert', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $datasiswa = Datasiswa::find($id);
        return view('form', ["key" => "datasiswa", "em" => $datasiswa]);
    }

    public function update($id, Request $request)
    {
        $mv = DataSiswa::find($id);
        $mv -> nama = $request->nama;
        $mv -> nim = $request->nim;
        $mv -> prodi = $request->prodi;
        $mv -> foto = $request->foto;

        if ($request->foto)
        {
            if ($mv->foto)
            {
                Storage::disk('public')->delete($mv->foto);
            }
            // mengambil nama file 
                $nama_file = time().'_'.$request->file('foto')->getClientOriginalName();

             // menyimpan file ke dalam folder
                $path = $request->file('foto')->storeAs('foto', $nama_file, 'public');
                $mv->foto = $path;
        }
        $mv -> save();

        return redirect('/datasiswa')-> with('alert', 'Data Berhasil Di Ubah');
    }

    public function delete($id)
    {
        $mv = DataSiswa::find($id);
        $mv -> delete();
        return redirect('/datasiswa')-> with('alert', 'Data Berhasil Di Hapus');
    }

    public function Login()
    {
        return view("login");
    }

    public function edituser()
    {
        return view("/edituser", ["key" => ""]);
    }

    public function updateuser(Request $request)
    {
        if($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();

            $user->password = bcrypt($request->password_baru);

            $user->save();
            
            return redirect("/edituser")->with('info', 'Password Berhasil di Ubah');
        }
            else
        {
            return redirect("/edituser")-> with ('info', 'Password Gagal di Ubah');
        }
    }

    public function searchdatasiswa()
    {
        return view("searchdatasiswa");
    }

    public function actsearchdatasiswa(Request $request)
    {
        $cari = $request->input('q');

        $datasiswa = DataSiswa::where('nama', 'LIKE', "%$cari%")->get();

        return view("actsearchdatasiswa", ["data" => $datasiswa]);
    }
}
