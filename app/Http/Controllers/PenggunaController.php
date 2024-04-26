<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    //
    public $pengguna = [
        ['nama' => 'Budi', 'umur' => 22, 'alamat' => 'Bandung'],
        ['nama' => 'Didi', 'umur' => 21, 'alamat' => 'Jakarta'],
        ['nama' => 'Hadi', 'umur' => 19, 'alamat' => 'Bogor'],
    ];

    public function index()
    {

        $users = User::all();
        // dd($users);
        return view('pengguna.index', compact('users'));

    }
    // public function details($id)
    // {

    //     $pengguna = null;
    //     if (isset($this->pengguna[$id])) {
    //         $pengguna = $this->pengguna[$id];
    //         return view('pengguna', compact('pengguna'));
    //         // echo "<h1>Maklumat Pengguna</h1>";
    //         // echo "<pre>";
    //         // var_dump($pengguna);
    //         // echo "</pre>";
    //     } else {
    //         abort(404);
    //     }
    // }

    // public function details($id)

    public function details(User $user)
    {

        // $user = User::find($id);
        return view('pengguna', compact('user'));

    }

    public function create()
    {

        return view('pengguna.create');

    }

    public function store(Request $request)
    {
        // dd($request);

        $validation_rules = [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/'
            ],
        ];

        $validated_data = $request->validate($validation_rules);

        // User::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        // ]);

        User::create($validated_data);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berjaya didaftarkan.');
    }

    public function update(Request $request, User $user)
    {
        // $validation_rules = [
        //     'name' => 'required|string|min:5|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        // ];
        
        // if ($request->filled('password')) {  // Use 'filled' to check if the password is not empty
        //     $validation_rules['password'] = [
        //         'required',
        //         'min:6',
        //         'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/'
        //     ];
        // }
        
        // $validated_data = $request->validate($validation_rules);
        
        // $user->name = $validated_data['name'];
        // $user->email = $validated_data['email'];
        // if (!empty($validated_data['password'])) {
        //     $user->password = bcrypt($validated_data['password']);
        // }
        // $user->save();

        $validation_rules = [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ];
        
        if ($request->filled('password')) {  // Use 'filled' to check if the password is not empty
            $validation_rules['password'] = [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/'
            ];
        }
        
        $validated_data = $request->validate($validation_rules);
        
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        if (!empty($validated_data['password'])) {
            $user->password = bcrypt($validated_data['password']);
        }
        $user->save();
        
        return redirect()->route('pengguna.id',$user->id)->with('success', 'Pengguna berjaya dikemaskini.');
    }
}