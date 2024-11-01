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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Formulir</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Formulir Pendaftaran Pasien
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
              <div class="d-print-none">
                <p class="h3">Alamat :</p>
                <address>
                  Jl.MT Haryono No. 9, Kel Sukasari<br>
                  Kec Tangerang, Kota Tangerang<br>
                  Banten 15118<br>
                </address>
              </div>
            </div>
            <div class="col-6 text-right">
              <p class="h1">NO. Med. Rec :</p>
              <p class="h2">{{ $patient->patient_number }}</p>
            </div>
            <div class="col-12 my-5 text-center">
              <h1>FORMULIR DATA IDENTITAS PASIEN</h1>
            </div>
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
                <td class="text-left"><p class="strong mb-1">Nama lengkap pasien sesuai Kartu Identitas :</p></td>
                <td class="text-left">{{ $patient->name }}</td>
              </tr>
              <tr>
                <td class="text-left"><p class="strong mb-1">Kartu Identitas :</p></td>
                <td class="text-left">{{ $patient->id_card }}</td>
              </tr>
              <tr>
                <td class="text-left"><p class="strong mb-1">No. Kartu Identitas :</p></td>
                <td class="text-left">{{ $patient->id_card_number }}</td>
              </tr>
              <tr>
                <td class="text-left"><p class="strong mb-1">Nama Keluarga (Ayah/Suami/Marga) :</p></td>
                <td class="text-left">{{ $patient->patient_father_name }}</td>
              </tr>
              <tr>
                <td colspan="2" class="font-weight-bold text-left">
                  Alamat lengkap
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Jalan :</li>
                </td>
                <td class="text-left">{{ $patient->jalan }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kelurahan :</li>
                </td>
                <td class="text-left">{{ $patient->kelurahan }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kecamatan :</li>
                </td>
                <td class="text-left">{{ $patient->kecamatan }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kota :</li>
                </td>
                <td class="text-left">{{ $patient->city }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kode Pos :</li>
                </td>
                <td class="text-left">{{ $patient->postal_code }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Perumahan :</li>
                </td>
                <td class="text-left">{{ $patient->residence }}</td>
              </tr>

              <tr>
                <td colspan="2" class="font-weight-bold text-left">
                  No Telepon
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Rumah :</li>
                </td>
                <td class="text-left">{{ $patient->home_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Handphone :</li>
                </td>
                <td class="text-left">{{ $patient->handphone_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kantor :</li>
                </td>
                <td class="text-left">{{ $patient->office_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Fax :</li>
                </td>
                <td class="text-left">{{ $patient->fax_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Wa :</li>
                </td>
                <td class="text-left">{{ $patient->wa_phone_number }}</td>
              </tr>

              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Golongan Darah :</p>
                </td>
                <td class="text-left">{{ $patient->golongan_darah }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Tempat / Tanggal Lahir :</p>
                </td>
                <td class="text-left"><?php echo ($patient->dateOfBirth) ? date('d-m-Y', strtotime($patient->dateOfBirth)) : ''; ?></td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Jenis kelamin :</p>
                </td>
                <td class="text-left">{{ $patient->sex }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Status Perkawinan :</p>
                </td>
                <td class="text-left">{{ $patient->marrital_status }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Agama :</p>
                </td>
                <td class="text-left">{{ $patient->religion }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Kewarganegaraan :</p>
                </td>
                <td class="text-left">{{ $patient->nationality }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Suku Bangsa :</p>
                </td>
                <td class="text-left">{{ $patient->tribe }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Bahasa :</p>
                </td>
                <td class="text-left">{{ $patient->language }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Pekerjaan :</p>
                </td>
                <td class="text-left">{{ $patient->occupation }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Email :</p>
                </td>
                <td class="text-left">{{ $patient->email }}</td>
              </tr>

              <tr>
                <td colspan="2" class="font-weight-bold text-left">
                  Dalam keadaan darurat, dapat menghubungi :
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Nama :</p>
                </td>
                <td class="text-left">{{ $patient->family->name }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Hubungan dengan pasien :</p>
                </td>
                <td class="text-left">{{ $patient->family->relation_with_patient }}</td>
              </tr>
              <tr>
                <td colspan="2" class="font-weight-bold text-left">
                  Alamat
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Jalan :</li>
                </td>
                <td class="text-left">{{ $patient->family->jalan }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kelurahan :</li>
                </td>
                <td class="text-left">{{ $patient->family->kelurahan }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kecamatan :</li>
                </td>
                <td class="text-left">{{ $patient->family->kecamatan }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kota :</li>
                </td>
                <td class="text-left">{{ $patient->family->city }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kode Pos :</li>
                </td>
                <td class="text-left">{{ $patient->family->postal_code }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Perumahan :</li>
                </td>
                <td class="text-left">{{ $patient->family->residence }}</td>
              </tr>
              <tr>
                <td colspan="2" class="font-weight-bold text-left">
                  No Telepon
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Rumah :</li>
                </td>
                <td class="text-left">{{ $patient->family->home_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Handphone :</li>
                </td>
                <td class="text-left">{{ $patient->family->handphone_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Kantor :</li>
                </td>
                <td class="text-left">{{ $patient->family->office_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Fax :</li>
                </td>
                <td class="text-left">{{ $patient->family->fax_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <li>Wa :</li>
                </td>
                <td class="text-left">{{ $patient->family->wa_phone_number }}</td>
              </tr>
              <tr>
                <td class="text-left">
                  <p class="strong mb-1">Jaminan :</p>
                </td>
                <td class="text-left">{{ $patient->family->assurance }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold text-left">
                  Klinik Utama Adinata dari :
                </td>
                <td class="text-left">{{ $patient->clinic_info }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold text-left">
                  Tanggal Pendaftaran
                </td>
                <td class="text-left">{{ $patient->created_at }}</td>
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
