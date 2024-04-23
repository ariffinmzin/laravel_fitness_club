@extends('layouts.main') @section('content')
<h1>Maklumat Pengguna</h1>

<table class="table">
    <tbody>
        <tr>
            <th>Nama</th>
            <td>{{ $pengguna['nama'] }}</td>
        </tr>
        <tr>
            <th>Umur</th>
            <td>{{ $pengguna['umur'] }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pengguna['alamat'] }}</td>
        </tr>
    </tbody>
</table>

@endsection
