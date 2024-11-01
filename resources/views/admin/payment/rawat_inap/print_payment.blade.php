@extends('layouts.main')

@section('content')

    <style>
      @media print {
        @page {
        margin: 0.5cm;
        }

        address { font-size: 10pt; }
        h1 { font-size: 14pt; }
        p { font-size: 10pt; }
        .table td {
          font-size: 10pt !important;
          padding: 0px 0px 0px 5px;
          }
      }
    </style>

    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col-auto">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="#">Kasir</a></li>
                <li class="breadcrumb-item"><a href="#">Rekam Medis Rawat Inap</a></li>
                <li class="breadcrumb-item"><a href="#">Pembayaran</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Print</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Print Pembayaran Rekam Medis Rawat Inap
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
              <img src="{{ asset('logo-adinata.png') }}" alt="Tabler" style="width: 60%; padding-right:20px; padding-bottom:20px;">
            </div>
            <div class="col-6 text-right">
              <address>
                Jl.MT Haryono No. 9, Kel Sukasari<br>
                Kec Tangerang, Kota Tangerang<br>
                Banten 15118<br>
              </address>
            </div>
            <div class="col-12 text-center">
              <h1>Kwitansi Rawat Inap</h1><br>
              {{-- Nomor Urut<br>
              <h1>test</h1> --}}
            </div>

            <div class="col-6">
              <p>
                Nama : {{ $record->patient->name }}<br>
                Tanggal Lahir / Umur : <?php echo ($record->patient->dateOfBirth) ? date('d-m-Y', strtotime($record->patient->dateOfBirth)) : ''; ?> / {{ getAge($record->patient->dateOfBirth) }}<br>
                Jenis Kelamin : {{ $record->patient->sex }}
              </p>
            </div>
            <div class="col-6 text-left">
              <p>
                No. Medical Record : {{ $record->patient->patient_number }}<br>
                Tanggal pelayanan : <?php echo ($record->tanggal_pelayanan) ? date('d-m-Y H:i:s', strtotime($record->tanggal_pelayanan)) : 'null'; ?><br>
                Tanggal pembayaran : <?php echo ($record->tanggal_pembayaran) ? date('d-m-Y H:i:s', strtotime($record->tanggal_pembayaran)) : 'belum dikonfirmasi'; ?><br>
                Jaminan : {{ $record->patient->family->assurance }}
              </p>
            </div>

            <div class="col-12 my-1 d-print-none">
              <hr />
            </div>
          </div>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center" style="width: 1%">No.</th>
                  <th>Nama Pelayanan</th>
                  {{-- <th class="text-center" style="width: 1%">Qnt</th>
                  <th class="text-right" style="width: 1%">Unit</th> --}}
                  <th class="text-right">Harga</th>
                </tr>
              </thead>

              <tbody>

                @if (isset($payments))
                <?php $i = 0; ?>

                  @foreach ($payments as $payment)
                  <tr>
                      <td class="text-center">
                        <?php echo $i+=1;?>
                      </td>
                      <td class="strong mb-1">{{ $payment->service->name }}</td>
                      <td class="text-right">Rp. {{ ($payment->service->price) ? number_format($payment->service->price) : "0" }}</td>
                  </tr>
                  @endforeach

                  <tr>
                    <td class="text-center"><?php echo $i+=1;?></td>
                    <td colspan="2" class="strong mb-1">Farmasi</td>
                  </tr>

                  @if (isset($record->resep_rawat_inap->resep_obat_rawat_inap))
                    @foreach ($record->resep_rawat_inap->resep_obat_rawat_inap as $obat)
                    <tr>
                      <td></td>
                      <td class="strong mb-1"><li>{{ $obat->medicine->nama }}</li></td>
                      <td class="text-right">Rp. {{ ($obat->harga) ? number_format($obat->harga) : "0" }}</td>
                    </tr>
                    @endforeach
                  @endif

                  @if (!empty($record->tanggal_keluar))
                  <?php
                    $day = Carbon\Carbon::parse($record->tanggal_pelayanan)->diffInDays($record->tanggal_keluar);
                    if ($day == 0) {
                      $day = 1;
                    }
                  ?>

                  <tr>
                    <td class="text-center"><?php echo $i+=1;?></td>
                    <td colspan="2" class="strong mb-1">Jenis Kamar Inap</td>
                  </tr>

                  <tr>
                    <td></td>
                    <td class="strong mb-1"><li>{{ $record->room->name }}</li></td>
                    <td class="text-right">Rp. {{ ($record->room->price) ? number_format($record->room->price * $day) : "0" }}</td>
                  </tr>
                  @endif

                  <tr>
                    <td colspan="2" class="strong text-right">Total</td>
                    <td class="text-right">Rp.
                      <?php
                          $totalLayananLain = [];
                          foreach($payments as $payment) {
                              $totalLayananLain[] = $payment->service->price;
                          }

                          $totalFarmasi = [];
                          foreach($record->resep_rawat_inap->resep_obat_rawat_inap as $obat) {
                              $totalFarmasi[] = $obat->harga;
                          }
                          $totalFarmasi = array_sum($totalFarmasi);
                          $totalLayanan = array_sum($totalLayananLain);
                          $totalKamar = 0;

                          if (!empty($record->tanggal_keluar)) {
                            $day = Carbon\Carbon::parse($record->tanggal_pelayanan)->diffInDays($record->tanggal_keluar);
                            if ($day == 0) {
                              $day = 1;
                            }
                            $totalKamar = $record->room->price * $day;
                          }

                          $total = $totalFarmasi + $totalLayanan + $totalKamar;

                          echo number_format($total);
                      ?>
                    </td>
                  </tr>

                @else
                  <tr>
                      <td colspan="3">Tidak ada Layanan</td>
                  </tr>
                @endif

              </tbody>
            </table>
          </div>
          {{-- <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th colspan="2">Data Pasien</th>
                </tr>
              </thead>
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
                  <td class="text-left"><p class="strong mb-1"><input class="form-check-input" type="checkbox"> Lain-lain</p></td>
                  <td class="text-left">: </td>
                </tr>

              </tbody>
            </table>

          </div> --}}
          {{-- <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with
            you again!</p> --}}
        </div>

        {{-- <div class="card-footer text-right">
          <div class="d-flex">
            <a href="#" class="btn btn-link">Kembali</a>
            <button type="submit" class="btn btn-primary ml-auto">Bayar</button>
          </div>
        </div> --}}

      </div>
    </div>

@endsection
