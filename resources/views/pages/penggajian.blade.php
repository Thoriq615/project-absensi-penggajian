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
                    <?php //dd($user);?>
                    @foreach($user as $key => $value)
                    <tr>
                        <td>{{$value->nama}}</td>
                        <td>{{!empty($value->jumlah_tidak_hadir)?$value->jumlah_tidak_hadir:0}}</td>
                        <td>{{!empty($value->potongan_perhari)?$value->potongan_perhari:0}}</td>
                        <td>{{!empty($value->jumlah_potongan)?$value->jumlah_potongan:0}}</td>
                        <td>Rp. {{!empty($value->gaji_net)?$value->gaji_net:0}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection