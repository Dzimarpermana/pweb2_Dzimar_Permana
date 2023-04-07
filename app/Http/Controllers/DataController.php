<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function dashboard(){
        $pemeliharaan = Pemeliharaan::count();
        $user = User::count();
        return view('dashboard',compact('pemeliharaan','user'));
    }

    public function index(){
        $data = Pemeliharaan::all();
        return view('pemeliharaan.index',compact('data'));
    }

    public function tambah_data_index(){
        return view('pemeliharaan.tambah');
    }

    public function edit_data_index($id){
        $pemeliharaan = Pemeliharaan::findOrFail($id);
        return view('pemeliharaan.edit', compact('pemeliharaan'));
    }

    public function tambah_data(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_jalan' => ['required','max:255'],
            'jenis_pemeliharaan' => ['required'],
            'nama_kontraktor' => ['required'],
            'status' => ['required','numeric'],
        ]);
        if ($validator->fails()) {
            return back()->withInput();
        }else {
            $pemeliharaan = new Pemeliharaan();
            $pemeliharaan->nama_jalan = $request->nama_jalan;
            $pemeliharaan->jenis_pemeliharaan = $request->jenis_pemeliharaan;
            $pemeliharaan->nama_kontraktor = $request->nama_kontraktor;
            $pemeliharaan->status = $request->status;
            $pemeliharaan->save();
            return redirect()->route('data.index');
        }
    }

    public function edit_data(Request $request, $id){
        $pemeliharaan = Pemeliharaan::findOrFail($id); // Ambil data berdasarkan ID

        $validator = Validator::make($request->all(), [
            'nama_jalan' => ['required','max:255'],
            'jenis_pemeliharaan' => ['required'],
            'nama_kontraktor' => ['required'],
            'status' => ['required','numeric'],
        ]);
        if ($validator->fails()) {
            return back()->withInput();
        }else {
            $pemeliharaan->nama_jalan = $request->nama_jalan;
            $pemeliharaan->jenis_pemeliharaan = $request->jenis_pemeliharaan;
            $pemeliharaan->nama_kontraktor = $request->nama_kontraktor;
            $pemeliharaan->status = $request->status;
            $pemeliharaan->update();
            return redirect()->route('data.index');
        }
    }

    public function hapus_data(Request $request, $id){
        $pemeliharaan = Pemeliharaan::findOrFail($id); // Ambil data berdasarkan ID
        if($pemeliharaan){
            $pemeliharaan->delete();
            return back()->with(['msg' => 'berhasil dihapus']);
        }
        else{
            return back()->withErrors(['errors' => 'Data tidak ditemukan']);
        }
    }
}
