@extends('layouts.main')

@section('content')

    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col-auto">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li>
                <li class="breadcrumb-item"><a href="#">RAWAT INAP</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">PRINT REKAM MEDIS</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Pelayanan Rawat Inap
            </h2>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header d-print-none">
          <h3 class="card-title">Form</h3>
          <div class="card-options">
            <button type="button" class="btn btn-primary" onclick="javascript:window.print();"><i class="si si-printer"></i> Print
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <img src="{{ asset('logo-adinata.png') }}" alt="Tabler" class="d-print-none" style="width: 60%; padding-right:20px; padding-bottom:20px;">
            </div>
            <div class="col-6 text-right">
              <address class="d-print-none">
                Jl.MT Haryono No. 9, Kel Sukasari<br>
                Kec Tangerang, Kota Tangerang<br>
                Banten 15118<br>
              </address>
            </div>
            <div class="col-12 my-5 text-center">
              <h1>PELAYANAN RAWAT INAP</h1><br>
              Nomor Urut<br>
              <h1>{{ $record->nomor_urut }}</h1>
            </div>

            <div class="col-6">
            <p class="h3">Nama : {{ $record->patient->name }}</p>
              <p class="h3">Tanggal Lahir / Umur : <?php echo ($record->patient->dateOfBirth) ? date('d-m-Y', strtotime($record->patient->dateOfBirth)) : ''; ?> / {{ getAge($record->patient->dateOfBirth) }}</p>
              <p class="h3">Jenis Kelamin : {{ $record->patient->sex }}</p>
              <p class="h3">No. Identitas (KTP/SIM/Paspor) : {{ $record->patient->id_card_number }}</p>
              <p class="h3">Alamat : {{ getAddress($record->patient) }}</p>
            </div>
            <div class="col-6 text-left">
              <p class="h3">No. Medical Record : {{ $record->patient->patient_number }}</p>
              <p class="h3">Tanggal pelayanan : <?php echo ($record->tanggal_pelayanan) ? date('d-m-Y H:i:s', strtotime($record->tanggal_pelayanan)) : ''; ?></p>
              <p class="h3">Jaminan : {{ $record->patient->family->assurance }}</p>
            </div>

            <hr />
          </div>

          <div class="table-responsive">
            <table class="table">
              {{-- <thead>
                <tr>
                  <th colspan="2">Data Pasien</th>
                </tr>
              </thead> --}}
              <tbody>
                <tr>
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Konsultasi Dokter</p></td>
                  <td class="text-left">: {{ $record->doctor->name }}</td>
                </tr>
                <tr>
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Laboratorium</p></td>
                  <td class="text-left">: <input class="form-check-input" type="checkbox"> DL <input class="form-check-input" type="checkbox"> UL <input class="form-check-input" type="checkbox"> Lain-lain</td>
                </tr>
                <tr>
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> USG</p></td>
                  <td class="text-left">: <input class="form-check-input" type="checkbox"> 2D <input class="form-check-input" type="checkbox"> 4D <input class="form-check-input" type="checkbox"> Print <input class="form-check-input" type="checkbox"> Transvaginal</td>
                </tr>
                <tr>
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Imunisasi</p></td>
                  <td class="text-left">: </td>
                </tr>
                <tr>
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Farmasi</p></td>
                  <td class="text-left">: </td>
                </tr>
                <tr>
                    <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Jenis Kamar</p></td>
                    <td class="text-left">: {{ $record->room->name }}</td>
                </tr>
                <tr>
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Lain-lain</p></td>
                  <td class="text-left">: </td>
                </tr>

              </tbody>
            </table>

          </div>
          {{-- <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with
            you again!</p> --}}
        </div>
      </div>

    </div>

@endsection
