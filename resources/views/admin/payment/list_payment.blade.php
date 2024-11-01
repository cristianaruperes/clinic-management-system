@extends('layouts.main')

@section('content')

    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col-auto">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="#">Kasir</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Pembayaran Rawat Jalan</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Pembayaran Rawat Jalan
            </h2>
          </div>

        </div>
      </div>

      <div class="card">
        <div class="card-header" style="display: block; text-align: center;">
          <h3 class="card-title">Biodata Pasien</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Nama</label>
                <div class="col">
                  <input type="text" class="form-control" value="{{$record->patient->name}}" disabled>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Tanggal lahir</label>
                <div class="col">
                  <input type="text" class="form-control" value="<?php echo ($record->patient->dateOfBirth) ? date('d-m-Y', strtotime($record->patient->dateOfBirth)) : ''; ?>" disabled>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Jenis Kelamin</label>
                <div class="col">
                  <input type="text" class="form-control" value="{{$record->patient->sex}}" disabled>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">No. Med. Rec</label>
                <div class="col">
                  <input type="text" class="form-control" value="{{$record->patient->patient_number}}" disabled>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Tanggal Pelayanan</label>
                <div class="col">
                  <input type="text" class="form-control" value="<?php echo ($record->tanggal_pelayanan) ? date('d-m-Y', strtotime($record->tanggal_pelayanan)) : ''; ?>" disabled>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Jaminan</label>
                <div class="col">
                  <input type="text" class="form-control" value="{{$record->patient->family->assurance}}" disabled>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card-footer text-right">
          <div class="d-flex">
            <a href="{{ route('list.cashier.rekam_medis_rjalan.patient', ['id' => $record->patient->id]) }}" class="btn btn-link">Kembali</a>
          </div>
        </div>
      </div>

      <div class="card">
        <form action="{{ route('add.payment.patient') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="card-header">
            <h3 class="card-title">Pilih Layanan untuk Pasien</h3>
          </div>

          <div class="card-body">
            @if ($errors->any())
            <div class="mb-3">
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
            </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <input name="rekam_medis_id" value="{{$record->id}}" hidden>

            <div class="mb-3">
              <label class="form-label">Pilih Layanan</label>
              <input class="form-control" list="datalistOptions" name="service_name" placeholder="Type to search..." autocomplete="off">
              <datalist id="datalistOptions">
                @if (isset($services))
                  @foreach ($services as $service)
                    <option value="{{ $service->name }}"></option>
                  @endforeach
                @endif
              </datalist>
            </div>

          </div>

          <div class="card-footer text-right">
            <div class="d-flex">
              <button type="submit" class="btn btn-primary ml-auto">Simpan ke Daftar</button>
            </div>
          </div>

        </form>

      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Layanan Pasien Ini</h3>

        </div>

        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th>Nama Layanan</th>
                <th>Harga (Rp)</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (isset($payments))
                  @foreach ($payments as $payment)
                  <tr>
                      <td>{{ $payment->service->name }}</td>
                      <td>Rp. {{ ($payment->service->price) ? number_format($payment->service->price) : "0" }}</td>
                      <td class="text-right">
                        <a href="{{ route('delete.payment.patient', ['id' => $payment->id]) }}" onclick="return confirm('Are you sure?')">Hapus</a>
                        {{-- <span class="dropdown ml-1">
                          <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('edit.patient', ['id' => $record->id]) }}">
                              Edit
                            </a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('delete.rekam_medis.patient', ['id' => $record->id]) }}">
                              Hapus
                            </a>
                            <a class="dropdown-item" href="{{ route('print.rekam_medis.patient', ['id' => $record->id]) }}">
                              Print rekam medis
                            </a>
                          </div>
                        </span> --}}
                      </td>
                  </tr>
                  @endforeach

                  <tr>
                    <td colspan="4">Farmasi</td>
                  </tr>

                  @if (isset($record->resep->resep_obat))
                    @foreach ($record->resep->resep_obat as $obat)
                    <tr>
                      <td><li>{{ $obat->medicine->nama }}</li></td>
                      <td>Rp. {{ ($obat->harga) ? number_format($obat->harga) : "0" }}</td>
                      <td></td>
                    </tr>
                    @endforeach
                  @endif

                  <tr>
                    <td>Total</td>
                    <td>Rp.
                      <?php
                          $totalLayananLain = [];
                          foreach($payments as $payment) {
                              $totalLayananLain[] = $payment->service->price;
                          }

                          $totalFarmasi = [];
                          foreach($record->resep->resep_obat as $obat) {
                              $totalFarmasi[] = $obat->harga;
                          }
                          $totalFarmasi = array_sum($totalFarmasi);
                          $totalLayanan = array_sum($totalLayananLain);

                          $total = $totalFarmasi + $totalLayanan;

                          echo number_format($total);
                      ?>
                    </td>
                    <td></td>
                  </tr>
              @else
                  <tr>
                      <td>No Services added</td>
                  </tr>
              @endif

            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <div class="d-flex">
            <a href="{{ route('print.payment.patient', ['id' => $record->id]) }}" class="btn btn-secondary">Print</a>

            @if ($record->status == 'belum selesai')
              <a href="{{ route('pay.payment.patient', ['id' => $record->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-primary ml-auto">Konfirmasi Pembayaran</a>
            @else
              <a href="{{ route('cancel.payment.patient', ['id' => $record->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-primary ml-auto">Batalkan Pembayaran</a>
            @endif
          </div>
        </div>
      </div>

    </div>

@endsection
