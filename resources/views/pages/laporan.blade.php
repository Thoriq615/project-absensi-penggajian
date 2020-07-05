@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Gaji</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Gaji</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>Rp 5.500.000</td>
                        <td>Mantap</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Rp. 4.500.000</td>
                        <td>Boleh juga</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Rp. 3.500.000</td>
                        <td>Wiw</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection