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
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Gaji</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>$320,800</td>
                        <td>Mantap</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>$170,750</td>
                        <td>Boleh juga</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>$86,000</td>
                        <td>Wiw</td>
                        <td></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection