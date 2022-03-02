@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <form action="/mahasiswa/postidentifikasi_kontak" method="POST">
            {{csrf_field()}}
                <!-- SECTION 10 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Kontak Di Kampus Sejak Tanggal <b>{{$tanggal}}</b></h3>
                            </div>
                            <div class="panel-body">
                                <p>Pada kolom di bawah, masukkan Identitas orang - orang (Civitas Akademika) yang melakukan kontak fisik 
                                    dengan anda  <b>di Lingkungan Kampus ITB</b> sejak tanggal <b>{{$tanggal}}</b> sampai dengan laporan ini dibuat
                                </p>
                                
                                <div class="form-grup">
                                    <table class="table" id="kontak">
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama[0]" placeholder="Nama" class="form-control" />
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <label>NIM/NIP (Jika Diketahui)</label>
                                                        <input type="text" name="nim[0]" placeholder="NIM" class="form-control" />
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <label>Tanggal Kontak</label>
                                                        <input type="date" name="tanggal[0]" class="form-control" />
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <label>Waktu Kontak</label>
                                                        <select class="form-control" name="waktu[0]">
                                                            <option value="7">7.00</option>
                                                            <option value="8">8.00</option>
                                                            <option value="9">9.00</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <label>Lokasi Kontak</label>
                                                        <input type="text" name="lokasi[0]" placeholder="Lokasi Kontak" class="form-control" />
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td><button type="button" name="add" id="add-kontak" class="btn btn-outline-primary">Add Subject</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection