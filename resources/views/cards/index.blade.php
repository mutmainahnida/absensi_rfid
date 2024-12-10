@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Daftar Kartu RFID</h3>
    <a href="{{ route('cards.create') }}" class="btn btn-primary mb-3">Tambah Kartu</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Card (UID)</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cards as $key => $card)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $card->uid }}</td>
                    <td>{{ $card->name }}</td>
                    <td>
                        <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data kartu</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
