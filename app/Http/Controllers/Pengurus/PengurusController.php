<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Pengurus::orderBy('id', 'asc')
            ->with('user')
            ->paginate(10);
        return view('pengurus.pengurus', compact('paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'jabatan' => 'required',
        ]);

        if ($validator1->fails()) {
            return Redirect::back()
                ->withErrors($validator1)
                ->with('error_code', 14);
        }

        $user = new User();
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $user->attachRole('pengurus');

        $pengurus = new Pengurus();
        $pengurus->nama = $request->get('nama');
        $pengurus->alamat = $request->get('alamat');
        $pengurus->nowa = $request->get('nowa');
        $pengurus->foto = 'img/profile/default.png';
        $pengurus->jabatan = $request->get('jabatan');
        $pengurus->user()->associate($user);
        $pengurus->save();

        return Redirect::back()
            ->with(array('success' => "Data pengurus berhasil ditambahkan"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $validator1 = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'nowa' => 'required',
            'foto' => 'image|nullable',
            'jabatan' => 'required',
        ]);

        $user = User::find($id);
        $pengurus = Pengurus::where('id_users', $user->id)->first();

        if ($validator1->fails()) {
            return Redirect::back()
                ->withErrors($validator1)
                ->with('error_code', 15)
                ->with('id', $pengurus->id);
        }


        // validation if user change credentials
        if (isset($request->checkChangeCredentialsEditPengurus)) {
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
                    ->with('id', $pengurus->id);
            }

            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('newpassword'));
            $user->save();
        }

        // update data
        $pengurus->nama = $request->get('nama');
        $pengurus->alamat = $request->get('alamat');
        $pengurus->nowa = $request->get('nowa');
        $pengurus->jabatan = $request->get('jabatan');

        if ($request->hasFile('foto')) {
            // ada file yang diupload
            if ($pengurus->foto && $pengurus->foto != 'img/profile/default.png' && file_exists(storage_path('app/public/' . $pengurus->foto))) {
                Storage::delete('public/' . $pengurus->foto);
            }
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('foto')->storeAs('public/img/profile/pengurus', $filenameSimpan);
            $savepath = 'img/profile/pengurus/' . $filenameSimpan;
        } else {
            // tidak ada file yang diupload
            $savepath = $pengurus->foto;
        }
        $pengurus->foto = $savepath;

        // save
        $pengurus->save();

        // feedback - sementara menggunakan ini, next menggunakan ajax
        return Redirect::back()
            ->with(array('success' => "Data pengurus berhasil diupdate"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        $user = User::find($pengurus->id_users);
        $pengurus->delete();
        $user->delete();
        return Redirect::back()
            ->with(array('success' => "Data pengurus berhasil dihapus"));
    }
}
