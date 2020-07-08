@extends('layouts.main')

@section('content')
<div class="page-title-actions">
    <div class="d-inline-block dropdown" style="float: right">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm cetak mb-2" data-toggle="modal" data-target=".create-absen">
            <span class="icon text-white-50">
            <i class="fas fa-pen"></i>
            </span>
            <span class="text">Create Absen</span>
        </a>
    </div>
    <div class="clear" style="clear: both"></div>
</div>
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
                            <th>Action</th>
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
    <div class="modal fade create-absen" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Absen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('post-registration')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Masukkan Nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="email">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Jam Hadir</label>
                        <input type="time" class="form-control" name="jam_hadir" id="jam_hadir" placeholder="Masukkan Jam Hadir">
                    </div>

                    <div class="form-group">
                        <label for="password">Jam Pulang</label>
                        <input type="time" class="form-control" name="jam_pulang" id="jam_pulang" placeholder="Masukkan Jam Pulang">
                    </div>

                    <div class="form-group">
                        <label for="password">Jumlah Tidak Hadir</label>
                        <input type="password" class="form-control" name="jumlah_tidak_hadir" id="jumlah_tidak_hadir" placeholder="Masukkan Jumlah Tidak Hadir">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary" type="submit">Save changes</button>

                    {{-- <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button> --}}
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
