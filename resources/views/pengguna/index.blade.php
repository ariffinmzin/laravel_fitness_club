@extends('layouts.main')

@section('content')

<h1>Senarai Pengguna</h1>

<a href="{{ route('pengguna.create') }}" class="btn btn-primary">Pengguna Baru</a>

@if(session('success'))

<div class="alert alert-success mt-3">

    <p>{{ session('success') }}</p>

</div>

@endif

<table class="class">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tarikh Daftar</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->create_at }}</td>
                <td><a href="{{ route('pengguna.id',$user) }}" class="btn btn-primary">EDIT</a></td>
            </tr>
            @endforeach


        </tbody>
    </thead>
</table>




@endsection