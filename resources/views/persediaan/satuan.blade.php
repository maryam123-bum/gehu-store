@extends('layouts.main')

@section('kembali')
  <a href="/persediaan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
    <h2>Tambah Satuan Barang</h2>
@endsection

@section('container')
<div class="row">
  <div class="col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
              <div class="col">
                <h4>Data Satuan</h4>
              </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="col">
                <table class="table table-bordered">
                  <thead>
                  <tr style="background-color: #28276A;color:#fff">
                      <th scope="col">No</th>
                      <th scope="col">Kode Satuan</th>
                      <th scope="col">Nama Satuan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if (!$data->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($data as $key) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td>JNS-0<?php echo $key['id']; ?></td>
                                <td><?php echo $key['nama_satuan']; ?></td>
                            </tr>
                            <!-- Button trigger modal -->
                
                      <!-- Modal -->
                      <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <h3>Yakin untuk menghapus data ?</h3>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="/hapus/satuan" method="post" style="display:inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $key['id'] }}" readonly>
                                        <button type="submit" class="btn btn-danger">Ya, tentu</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                      </div>
                              <?php
                              } ?>
                          @else
                              <tr class="text-center font-weight-bold">
                                  <td colspan="7">Tidak Ada Data</td>
                              </tr>
                          @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-4 col-lg-4">
    <div class="card">
      <div class="card-header">
        <h5>Data Informasi</h5>
      </div>
      <div class="card-body">
        <form class="needs-validation" action="/tambah/satuan" method="POST" novalidate>
          @csrf
          <div class="row g-3">
            <div class="col-4">
                <div class="form-group">
                  <label for="id" style="font-weight:bold">ID Jenis</label><br>
                  <h5 class="badge bg-info p-2 mt-3 mb-2" id="id" style="color:#000">{{ substr_replace("SAT-000",$estimateid,7-strlen($estimateid)) }}</h5>
                </div>
            </div>
            <div class="col-8">
                <label for="firstName" class="form-label" style="font-weight:bold">Nama Satuan</label>
                <input type="text" class="form-control" name="nama_satuan" id="nama_satuan" placeholder="Masukkan Nama Satuan" required>
            </div>
          </div>
            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection