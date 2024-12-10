@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Tambah Kartu</h3>
    <form action="{{ route('cards.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="uid" class="form-label">ID Card (UID)</label>
            <input type="text" name="uid" id="uid" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('cards.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
