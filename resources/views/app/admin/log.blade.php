@extends('layouts.adminLayout')

@section('title', 'Logs - SMAN 1 Balige')

@section('content')
<div class="content">
    <div class="card mt-3">
        <div class="card-header">
            Logs: Catatan Perubahan
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Catatan Perubahan</h5>
                <input type="text" id="search" class="form-control" placeholder="Search" style="width: 200px;">
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($data['logs']))
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data untuk ditampilkan</td>
                    </tr>
                    @else
                    @foreach ($data['logs'] as $log)
                    <?php $i = 1 ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $log['pesan'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($log['created_at'])->setTimezone('Asia/Jakarta')->format('d-m-Y H:i T') }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection