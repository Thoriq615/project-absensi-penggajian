@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Penggajian</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah Tidak Hadir</th>
                        <th>Potongan Per Hari</th>
                        <th>Jumlah Potongan</th>
                        <th>Jumlah Gaji</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah Tidak Hadir</th>
                        <th>Potongan Per Hari</th>
                        <th>Jumlah Potongan</th>
                        <th>Jumlah Gaji</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>1</td>
                        <td>Rp 50.000</td>
                        <td>Rp 50.000</td>
                        <td>Rp 3.500.000</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>1</td>
                        <td>Rp 80.000</td>
                        <td>Rp 150.000</td>
                        <td>Rp 5.500.000</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>1</td>
                        <td>Rp 70.000</td>
                        <td>Rp 140.000</td>
                        <td>Rp 4.500.000</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection