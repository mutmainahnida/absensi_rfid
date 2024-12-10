@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance List</title>
    @vite('resources/css/app.css')    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fungsi untuk mengambil data absensi setiap 5 detik
        function fetchAttendanceData() {
            $.get("/api/attendance-data", function(data) {
                let tableContent = '';
                data.forEach((item, index) => {
                    tableContent += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.name || 'ID tidak dikenali'}</td>
                            <td>${formatDateTime(item.created_at)}</td>
                            <td>
                                ${item.name ? '<span class="badge bg-success">Dikenali</span>' : '<span class="badge bg-danger">Tidak Dikenali</span>'}
                            </td>
                        </tr>
                    `;
                });
                $('#attendance-table tbody').html(tableContent);
            });
        }

        // Fungsi format waktu
        function formatDateTime(dateString) {
            let date = new Date(dateString);
            return date.toLocaleString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            });
        }

        // Memanggil fetchAttendanceData setiap 5 detik
        setInterval(fetchAttendanceData, 5000);
    </script>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Daftar Absensi</h3>
            </div>
            <div class="card-body">
                @if($data->isEmpty())
                    <div class="alert alert-warning text-center">
                        <strong>Data tidak ditemukan!</strong>
                    </div>
                @else
                    <table class="table table-striped" id="attendance-table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Waktu Kehadiran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name ?? 'ID tidak dikenali' }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y H:m:s') }}</td>
                                    <td>
                                        @if($item->name)
                                            <span class="badge bg-success">Dikenali</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Dikenali</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer text-center">
                <small class="text-muted">Data terbaru akan ditampilkan di sini</small>
            </div>
        </div>
    </div>
</body>
</html>
