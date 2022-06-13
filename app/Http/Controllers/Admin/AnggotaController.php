<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\FormInstalasiAlat;
use App\Models\Instalasi;
use App\Models\Keluhan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Anggota::orderBy('id', 'asc')
            ->with('user')
            ->paginate(10);
        return view('admin.anggota', ['paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::all(); // mendapatkan data dari tabel kelas
        return view('admin.anggota', ['id_users' => $anggota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validator1 = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'nama' => 'required',
            'alamat' => 'required',
            'nowa' => 'required',
        ]);
        if ($validator1->fails()) {
            return Redirect::back()
                ->withErrors($validator1)
                ->with('error_code', 8);
        }

        $instalasi = new Instalasi();
        $instalasi->tgl_buat = Carbon::parse(now());
        $instalasi->status = 'Dalam Proses';


        $user = new User();
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $user->attachRole('anggota');

        $anggota = new Anggota();
        $anggota->nama = $request->get('nama');
        $anggota->alamat = $request->get('alamat');
        $anggota->nowa = $request->get('nowa');
        $anggota->foto = 'img/profile/default.png';
        $anggota->tgl_gabung = Carbon::parse(now());
        $anggota->instalasi = 0;
        $anggota->user()->associate($user);
        $anggota->save();

        $instalasi->anggota()->associate($anggota);
        $instalasi->save();
        $anggota->instalasi = $instalasi->id;

        return Redirect::back()
            ->with(array('success' => "Data anggota berhasil ditambahkan, Lanjutkan menjadwalkan instalasi <a href='/instalasianggota'><b>disini</b></a>"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // validation
        $validator1 = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'nowa' => 'required',
            'foto' => 'image|nullable',
        ]);

        $anggota = Anggota::where('id_users', $user->id)->first();

        if ($validator1->fails()) {
            return Redirect::back()
                ->withErrors($validator1)
                ->with('error_code', 9)
                ->with('id', $anggota->id);
        }


        // validation if user change credentials
        if (isset($request->checkChangeCredentialsEditAnggota)) {
            $validator2 = Validator::make($request->all(), [
                'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail(__('Kata sandi sekarang salah'));
                    }
                }],
                'newpassword' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            if ($validator2->fails()) {
                return Redirect::back()
                    ->withErrors($validator2)
                    ->with('error_code', 9)
                    ->with('id', $anggota->id);
            }

            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('newpassword'));
            $user->save();
        }

        // update data
        $anggota->nama = $request->get('nama');
        $anggota->alamat = $request->get('alamat');
        $anggota->nowa = $request->get('nowa');

        if ($request->hasFile('foto')) {
            // ada file yang diupload
            if ($anggota->foto && $anggota->foto != 'img/profile/default.png' && file_exists(storage_path('app/public/' . $anggota->foto))) {
                Storage::delete('public/' . $anggota->foto);
            }
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('foto')->storeAs('public/img/profile/anggota', $filenameSimpan);
            $savepath = 'img/profile/anggota/' . $filenameSimpan;
        } else {
            // tidak ada file yang diupload
            $savepath = $anggota->foto;
        }
        $anggota->foto = $savepath;

        // save
        $anggota->save();

        // feedback - sementara menggunakan ini, next menggunakan ajax
        return Redirect::back()
            ->with(array('success' => "Data anggota berhasil diupdate"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keluhan::where('id_anggota', $id)->delete();

        $instalasi = Instalasi::where('id_anggota', $id)->first();
        FormInstalasiAlat::where('id_instalasi', $instalasi->id)->delete();
        $instalasi->delete();

        BukuAir::where('id_anggota', $id)->delete();

        $anggota = Anggota::find($id);
        $user = User::find($anggota->id_users);

        $anggota->delete();
        $user->delete();
        return Redirect::back()
            ->with(array('success' => "Data anggota berhasil dihapus"));
    }
}
