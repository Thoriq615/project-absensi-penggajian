@extends('layouts.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Absen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal hadir</th>
                            <th>Jam Hadir</th>
                            <th>Jam Pulang</th>
                            <th>Jumlah Tidak Hadir</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal hadir</th>
                            <th>Jam Hadir</th>
                            <th>Jam Pulang</th>
                            <th>Jumlah Tidak Hadir</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>02</td>
                            <td>08.30</td>
                            <td>17.30</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>02</td>
                            <td>08.30</td>
                            <td>17.30</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>02</td>
                            <td>08.30</td>
                            <td>17.30</td>
                            <td>7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection