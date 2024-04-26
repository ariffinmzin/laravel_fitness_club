@extends('layouts.main') @section('content')
<h1>Maklumat Pengguna</h1>

<form action="{{ route('pengguna.update',$user->id) }}" method="post">
    @csrf @method('PUT') @if(session('success'))

    <div class="alert alert-success mt-3">
        <p>{{ session("success") }}</p>
    </div>

    @endif

    <table class="table">
        <tbody>
            <tr>
                <th>Nama</th>
                <td>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name',$user->name) }}"
                        name="name"
                    />
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Emel</th>
                <td>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email',$user->email) }}"
                        name="email"
                    />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        value=""
                        name="password"
                    />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-primary">Simpan</button></td>
            </tr>
        </tbody>
    </table>
</form>

@endsection
