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
            <li class="breadcrumb-item"><a href="#">Apotek</a></li>
            <li class="breadcrumb-item"><a href="#">Daftar Pasien</a></li>
            <li class="breadcrumb-item"><a href="#">Rekam Medis Rawat Inap</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Resep</a></li>
          </ol>
        </div>
        <h2 class="page-title">
          Resep untuk Rawat Inap
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
    <!-- <div class="card-footer text-right">
          <div class="d-flex">
            <a href="{{ route('list.pharmacy.rekam_medis_rawat_inap', ['id' => $record->patient->id]) }}" class="btn btn-link">Kembali</a>
          </div>
        </div> -->
  </div>

  <div class="card">
    <form action="{{ route('save.pharmacy.resep.rekam_medis_rawat_inap') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="card-header">
        <h3 class="card-title">Lengkapi Data untuk Resep</h3>
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

        <input name="resep_id" value="{{$record->resep_rawat_inap->id}}" hidden>
        <input name="rekam_medis_id" value="{{$record->id}}" hidden>

        <div class="row">
          <div class="col-6">

            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Alergi</label>
              <div class="col">
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="alergi" value="ya" class="form-selectgroup-input" @if ($record->resep_rawat_inap->alergi == 'ya') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                        <strong>YA</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="alergi" value="tidak" class="form-selectgroup-input" @if ($record->resep_rawat_inap->alergi == 'tidak') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                        <strong>TIDAK</strong>
                      </div>
                    </div>
                  </label>

                </div>
              </div>
            </div>

            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Keterangan Alergi</label>
              <div class="col">
                <input type="text" class="form-control" name="keterangan_alergi" value="{{ $record->resep_rawat_inap->keterangan_alergi }}">
              </div>
            </div>

          </div>

          <div class="col-6">
            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Hamil</label>
              <div class="col">

                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="hamil" value="ya" class="form-selectgroup-input" @if ($record->resep_rawat_inap->hamil == 'ya') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                        <strong>YA</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="hamil" value="tidak" class="form-selectgroup-input" @if ($record->resep_rawat_inap->hamil == 'tidak') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                        <strong>TIDAK</strong>
                      </div>
                    </div>
                  </label>

                </div>

              </div>
            </div>

            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Menyusui</label>
              <div class="col">
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="menyusui" value="ya" class="form-selectgroup-input" @if ($record->resep_rawat_inap->menyusui == 'ya') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                        <strong>YA</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="menyusui" value="tidak" class="form-selectgroup-input" @if ($record->resep_rawat_inap->menyusui == 'tidak') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                        <strong>TIDAK</strong>
                      </div>
                    </div>
                  </label>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="card-footer text-right">
        <div class="d-flex">
          <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
        </div>
      </div>

    </form>

  </div>

  <div class="card">
    <form action="{{ route('add.pharmacy.medicine.rekam_medis_rawat_inap') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="card-header">
        <h3 class="card-title">Pilih Obat Untuk Pasien</h3>
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

        <input name="resep_id" value="{{$record->resep_rawat_inap->id}}" hidden>
        <input name="rekam_medis_id" value="{{$record->id}}" hidden>

        <div class="row">

          <div class="col-4">
            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Pilih Obat</label>

              <div class="col">
                <input class="form-control" list="datalistOptions" name="medicine_id" placeholder="Type to search..." autocomplete="off">
                <datalist id="datalistOptions">
                  @if (isset($medicines))
                  @foreach ($medicines as $medicine)
                  <option value="{{ $medicine->nama }}"></option>
                  @endforeach
                  @endif
                </datalist>
              </div>

            </div>
          </div>

          <div class="col-4">
            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Jumlah</label>
              <div class="col">
                <input type="number" class="form-control" name="jumlah" placeholder="Input">
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group mb-3 row">
              <label class="form-label col-3 col-form-label">Dosis</label>
              <div class="col">
                <input type="text" class="form-control" name="dosis" placeholder="Input">
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="card-footer text-right">
        <div class="d-flex">
          <button type="submit" class="btn btn-primary ml-auto">Tambah ke Resep</button>
        </div>
      </div>

    </form>

  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Obat</h3>

    </div>

    <div class="table-responsive">
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th class="w-1">No</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Dosis</th>
            <th>Harga Satuan</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if (isset($record->resep_rawat_inap->resep_obat_rawat_inap))
          <?php $i = 0; ?>
          @foreach ($record->resep_rawat_inap->resep_obat_rawat_inap as $obat)
          <tr>
            <td><?php echo $i += 1; ?></td>
            <td>{{ $obat->medicine->nama }}</td>
            <td>{{ $obat->jumlah }}</td>
            <td>{{ $obat->dosis }}</td>
            <td>{{ $obat->medicine->harga_jual }}</td>
            <td>{{ $obat->harga }}</td>
            <td class="text-right">
              <a href="{{ route('delete.pharmacy.medicine.rekam_medis_rawat_inap', ['id' => $obat->id]) }}" onclick="return confirm('Are you sure?')">Hapus</a>
            </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="5" class="text-right">Total</td>
            <td>Rp.
              <?php
              $total = [];
              foreach ($record->resep_rawat_inap->resep_obat_rawat_inap as $obat) {
                $total[] = $obat->harga;
              }
              $total = array_sum($total);
              echo $total;
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
        {{-- <a href="{{ route('print.pharmacy.resep.rekam_medis_rawat_inap', ['id' => $record->id]) }}" class="btn btn-secondary">Print</a> --}}
        {{-- <a href="#" onclick="return confirm('Are you sure?')" class="btn btn-primary ml-auto">Selesai</a> --}}
      </div>
    </div>
  </div>

</div>

@endsection