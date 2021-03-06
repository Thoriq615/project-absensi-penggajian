@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekap Gaji</h6>
    </div>
    @if (\Session::has('success'))
        <div class="alert alert-success alert-notif">
            {!! \Session::get('success') !!}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah Cuti</th>
                        <th>Jumlah Tidak Hadir</th>
                        <th>Potongan Perhari</th>
                        <th>Jumlah Potongan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                //dd($data);
                @endphp
                @foreach ($data as $key => $rekap_absen)
                <tbody>
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>{{$rekap_absen->nama}}</td>
                        <td>{{$rekap_absen->jumlah_cuti}}</td>
                        <td>{{$rekap_absen->jumlah_tidak_hadir}}</td>
                        <td>{{$rekap_absen->potongan_perhari}}</td>
                        <td>{{$rekap_absen->jumlah_potongan}}</td>
                        <td><a href="rekap_absen/edit/{{$rekap_absen->id}}" data-id="{{$rekap_absen->id}}" data-nama="{{$rekap_absen->nama}}" data-jumlah_cuti="{{$rekap_absen->jumlah_cuti}}" data-jumlah_tidak_hadir="{{$rekap_absen->jumlah_tidak_hadir}}" data-potongan="{{$rekap_absen->potongan}}" data-jumlah_potongan="{{$rekap_absen->jumlah_potongan}}" class="btn btn-primary btn-icon-split btn-sm edit" data-toggle="modal" data-target="#edit-rekap-absen"><span class="icon text-white-50"><i class="fas fa-pen"></i></span><span class="text">Edit</span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!-- Modal Edit RekapAbsen -->
<div class="modal fade edit-rekap-absen" id="edit-rekap-absen" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Rekap Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{url('rekap_absen/update')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="idRekapAbsen" placeholder="Masukkan Nama">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>

                <div class="form-group">
                    <label for="tanggal_hadir2">Jumlah Cuti</label>
                    <input type="number" class="form-control" name="jumlah_cuti" id="jumlah_cuti" placeholder="Masukkan Jumlah Cuti">
                </div>

                <div class="form-group">
                    <label for="password">Potongan Perhari</label>
                    <input type="amount" class="form-control" name="potongan_perhari" id="potongan_perhari" placeholder="Masukkan Potongan Perhari">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
