@extends('layouts.main')

@section('content')
<div class="page-title-actions">
    <div class="d-inline-block dropdown" style="float: right">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target=".data-absen-rekap">
            <span class="icon text-white-50">
            <i class="fas fa-pen"></i>
            </span>
            <span class="text">Create Rekap Absen</span>
        </a>
    </div>
    <div class="clear" style="clear: both"></div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekap Absen</h6>
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
                        <td><a href="rekap_absen/edit/{{$rekap_absen->id}}" data-id="{{$rekap_absen->id}}" data-nama="{{$rekap_absen->nama}}" data-jumlah_cuti="{{$rekap_absen->jumlah_cuti}}" data-jumlah_tidak_hadir="{{$rekap_absen->jumlah_tidak_hadir}}" data-potongan="{{$rekap_absen->potongan_perhari}}" data-jumlah_potongan="{{$rekap_absen->jumlah_potongan}}" class="btn btn-primary btn-icon-split btn-sm edit" data-toggle="modal" data-target="#edit-rekap-absen"><span class="icon text-white-50"><i class="fas fa-pen"></i></span><span class="text">Edit</span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade data-absen-rekap" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Rekap Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{url('rekap_absen/create')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                 </select>
                </div>

                <div class="form-group">
                    <label for="jumlah_cuti">Jumlah Cuti</label>
                    <input type="number" class="form-control" name="jumlah_cuti" id="jumlah_cuti" placeholder="Masukkan Jumlah Cuti">
                </div>

                <div class="form-group">
                    <label for="jumlah_tidak_hadir">Jumlah Tidak Hadir</label>
                    <input type="number" class="form-control" name="jumlah_tidak_hadir" id="jumlah_tidak_hadir" placeholder="Masukkan Jumlah Tidak Hadir">
                </div>

                <div class="form-group">
                    <label for="potongan_perhari">Potongan Perhari</label>
                    <input type="text" class="form-control" name="potongan_perhari" id="potongan_perhari" placeholder="Masukkan Potongan Perhari">
                </div>

                <div class="form-group">
                    <label for="jumlah_potongan">Jumlah Potongan</label>
                    <input type="text" class="form-control" name="jumlah_potongan" id="jumlah_potongan" placeholder="Masukkan Jumlah Potongan">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
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

                <div class="form-group JumlahTidakHadir">
                    <label for="tanggal_hadir2">Jumlah Tidak Hadir</label>
                    <input type="number" class="form-control" name="jumlah_tidak_hadir" id="jumlah_tidak_hadir" placeholder="Masukkan Jumlah Tidak Hadir">
                </div>

                <div class="form-group PotonganPerhari">
                    <label for="password">Potongan Perhari</label>
                    <input type="amount" class="form-control" name="potongan_perhari" id="potongan_perhari" placeholder="Masukkan Potongan Perhari">
                </div>

                <div class="form-group">
                    <label for="password">Jumlah Potongan</label>
                    <input type="amount" class="form-control" name="jumlah_potongan" id="jumlah_potongan" placeholder="Masukkan Jumlah Potongan">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
{{-- </div>
<script type = "text/javascript">
    let jml_tdk_hadir = document.getElementById('jumlah_tidak_hadir').value;
    let pot_perhari = document.querySelector('.PotonganPerhari');
    console.log(pot_perhari);
    pot_perhari = pot_perhari.replace(/[,]/g, '.');

    let result = parseFloat(jml_tdk_hadir) * parseFloat(pot_perhari);
    if(!isNaN(result)){
        document.getElementById('jumlah_potongan').value = result.toString().replace(/[.]/g, ',');
    }
</script> --}}
@endsection
