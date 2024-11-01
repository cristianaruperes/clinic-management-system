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
                <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Patient</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Edit Patient
            </h2>
          </div>
        </div>
      </div>
      <div class="row">

        <form action="{{ route('update.patient') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
          <div class="col-12">
            <div class="card-header">
              <h4 class="card-title">Form Patient</h4>

              @if (isSuperadmin())
                <div class="card-options">
                  <a href="{{ route('delete.patient', ['id' => $patient->id]) }}" onclick="return confirm('Anda yakin? Semua data yang ada di Apotik, Kasir, dan data yang berhubungan dengan data ini akan terhapus')" class="btn btn-danger"><i class="si si-printer"></i> Delete
                  </a>
                </div>
              @endif

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

              <input type="text" class="form-control" name="id" value="{{ $patient->id }}" hidden>

              <div class="mb-3">
                <label class="form-label">Nama lengkap pasien sesuai Kartu Identitas</label>
              <input type="text" class="form-control" name="patient-fullname" value="{{ $patient->name }}" required>
              </div>

              <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">No. Kartu Identitas</label>
                    <input type="text" class="form-control" name="patient-id-card" value="{{ $patient->id_card_number }}">
                  </div>
                </div>

                <div class="col-xl-8">
                  <div class="mb-3">
                    <label class="form-label">Select Card</label>
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="patient-card" value="ktp" class="form-selectgroup-input" @if ($patient->id_card == 'ktp') checked @endif>
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                              <strong>KTP</strong>
                          </div>
                        </div>
                      </label>
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="patient-card" value="sim" class="form-selectgroup-input" @if ($patient->id_card == 'sim') checked @endif>
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                              <strong>SIM</strong>
                          </div>
                        </div>
                      </label>
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="patient-card" value="paspor" class="form-selectgroup-input" @if ($patient->id_card == 'paspor') checked @endif>
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                            <strong>Paspor</strong>
                          </div>
                        </div>
                      </label>
                      {{-- <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="patient-card" value="others" class="form-selectgroup-input" @if ($patient->id_card == 'others') checked @endif>
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                            <strong>Others</strong>
                          </div>
                        </div>
                      </label> --}}
                    </div>

                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Keluarga (Ayah/Suami/Marga)</label>
                <input type="text" class="form-control" name="patient-father-name" placeholder="Input" value="{{ $patient->patient_father_name }}">
              </div>

              <label class="form-label">Alamat Lengkap</label>

              <fieldset class="form-fieldset">
              <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Jalan</label>
                    <input type="text" class="form-control" name="patient-jalan" placeholder="Input Address" value="{{ $patient->jalan }}">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" name="patient-kelurahan" placeholder="Input" value="{{ $patient->kelurahan }}">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="patient-kecamatan" placeholder="Input" value="{{ $patient->kecamatan }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" name="patient-city" placeholder="Input" value="{{ $patient->city }}">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" name="patient-postal-code" placeholder="Input" value="{{ $patient->postal_code }}">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Perumahan</label>
                    <input type="text" class="form-control" name="patient-residence" placeholder="Input" value="{{ $patient->residence }}">
                  </div>
                </div>
              </div>
              </fieldset>

              <label class="form-label">No. Telepon</label>
              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Rumah</label>
                      <input type="text" class="form-control" name="patient-home-phone-number" placeholder="Input" value="{{ $patient->home_phone_number }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kantor</label>
                      <input type="text" class="form-control" name="patient-office-phone-number" placeholder="Input" value="{{ $patient->office_phone_number }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Handphone</label>
                      <input type="text" class="form-control" name="patient-handphone-phone-number" placeholder="Input" value="{{ $patient->handphone_phone_number }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">Fax</label>
                      <input type="text" class="form-control" name="patient-fax-phone-number" placeholder="Input" value="{{ $patient->fax_phone_number }}">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">WA</label>
                      <input type="text" class="form-control" name="patient-wa-phone-number" placeholder="Input" value="{{ $patient->wa_phone_number }}">
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="mb-3">
                <label class="form-label">Golongan Darah</label>
                <input type="text" class="form-control" name="patient-golongan-darah" placeholder="Input" value="{{ $patient->golongan_darah }}">
              </div>

            <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="patient-placeOfBirth" class="form-control mb-2" placeholder="Input Tempat" value="{{ $patient->placeOfBirth }}"/>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input id="calendar-simple" type="date" name="patient-dateOfBirth" class="form-control mb-2" placeholder="Select a date" value="{{ $patient->dateOfBirth }}" />
                    </div>
                  </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis kelamin</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-sex" value="laki-laki" class="form-selectgroup-input" @if ($patient->sex == 'laki-laki') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Laki-laki</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-sex" value="perempuan" class="form-selectgroup-input" @if ($patient->sex == 'perempuan') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Perempuan</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Status Perkawinan</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-marrital-status" value="sudah menikah" class="form-selectgroup-input" @if ($patient->marrital_status == 'sudah menikah') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Sudah Menikah</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-marrital-status" value="belum menikah" class="form-selectgroup-input" @if ($patient->marrital_status == 'belum menikah') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Belum Menikah</strong>
                      </div>
                    </div>
                  </label>
                  {{-- <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-marrital-status" value="widower/widow" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Widower/widow</strong>
                      </div>
                    </div>
                  </label> --}}
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Agama</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="islam" class="form-selectgroup-input" @if ($patient->religion == 'islam') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Islam</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="khatolik" class="form-selectgroup-input" @if ($patient->religion == 'khatolik') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Khatolik</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="kristen" class="form-selectgroup-input" @if ($patient->religion == 'kristen') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Kristen</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="budha" class="form-selectgroup-input" @if ($patient->religion == 'budha') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Budha</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="hindu" class="form-selectgroup-input" @if ($patient->religion == 'hindu') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Hindu</strong>
                      </div>
                    </div>
                  </label>
                  {{-- <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="confucius" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Confucius</strong>
                      </div>
                    </div>
                  </label> --}}
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-religion" value="lainnya" class="form-selectgroup-input" @if ($patient->religion == 'lainnya') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Lainnya</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Kewarganegaraan</label>
                <input type="text" class="form-control" name="patient-nationality" placeholder="Input" value="{{ $patient->nationality }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Suku bangsa</label>
                <input type="text" class="form-control" name="patient-tribe" placeholder="Input" value="{{ $patient->tribe }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Bahasa</label>
                <input type="text" class="form-control" name="patient-language" placeholder="Input" value="{{ $patient->language }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" name="patient-occupation" placeholder="Input" value="{{ $patient->occupation }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="patient-email" placeholder="Input" value="{{ $patient->email }}">
              </div>

            </div>
          </div>

          <div class="col-12">
            <div class="card-header">
              <h4 class="card-title">Dalam keadaan darurat, dapat menghubungi :</h4>
            </div>

            @if (!empty($patient->family))
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="family-full-name" value="{{ $patient->family->name }}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Hubungan dengan Pasien</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="suami/istri" class="form-selectgroup-input" @if ($patient->family->relation_with_patient == 'suami/istri') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Suami/Istri</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="anak" class="form-selectgroup-input" @if ($patient->family->relation_with_patient == 'anak') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Anak</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="orangtua" class="form-selectgroup-input" @if ($patient->family->relation_with_patient == 'orangtua') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Orangtua</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="lain" class="form-selectgroup-input" @if ($patient->family->relation_with_patient == 'lain') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Lain</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

              <label class="form-label">Alamat</label>

              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Jalan</label>
                      <input type="text" class="form-control" name="family-jalan" placeholder="Input" value="{{ $patient->family->jalan }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kelurahan</label>
                      <input type="text" class="form-control" name="family-kelurahan" placeholder="Input" value="{{ $patient->family->kelurahan }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kecamatan</label>
                      <input type="text" class="form-control" name="family-kecamatan" placeholder="Input" value="{{ $patient->family->kecamatan }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kota</label>
                      <input type="text" class="form-control" name="family-city" placeholder="Input" value="{{ $patient->family->city }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kode Pos</label>
                      <input type="text" class="form-control" name="family-postal-code" placeholder="Input" value="{{ $patient->family->postal_code }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Perumahan</label>
                      <input type="text" class="form-control" name="family-residence" placeholder="Input" value="{{ $patient->family->residence }}">
                    </div>
                  </div>
                </div>
              </fieldset>

              <label class="form-label">No. Telepon</label>
              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Rumah</label>
                      <input type="text" class="form-control" name="family-home-phone-number" placeholder="Input" value="{{ $patient->family->home_phone_number }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kantor</label>
                      <input type="text" class="form-control" name="family-office-phone-number" placeholder="Input" value="{{ $patient->family->office_phone_number }}">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Handphone</label>
                      <input type="text" class="form-control" name="family-handphone-phone-number" placeholder="Input" value="{{ $patient->family->handphone_phone_number }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">Fax</label>
                      <input type="text" class="form-control" name="family-fax-phone-number" placeholder="Input" value="{{ $patient->family->fax_phone_number }}">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">WA</label>
                      <input type="text" class="form-control" name="family-wa-phone-number" placeholder="Input" value="{{ $patient->family->wa_phone_number }}">
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="mb-3">
                <label class="form-label">Jaminan</label>
                <input type="text" class="form-control" name="family-assurance" placeholder="Input" value="{{ $patient->family->assurance }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Pasien Mengetahui Klinik Utama Adinata dari</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="dokter" class="form-selectgroup-input" @if ($patient->clinic_info == 'dokter') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Dokter</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="sendiri" class="form-selectgroup-input" @if ($patient->clinic_info == 'sendiri') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Sendiri</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="saudara/teman" class="form-selectgroup-input" @if ($patient->clinic_info == 'saudara/teman') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Saudara/Teman</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="iklan" class="form-selectgroup-input" @if ($patient->clinic_info == 'iklan') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Iklan</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="lainnya" class="form-selectgroup-input" @if ($patient->clinic_info == 'lainnya') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Lainnya</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

            </div>
            @else
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="family-full-name" value="" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Hubungan dengan Pasien</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="suami/istri" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Suami/Istri</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="anak" class="form-selectgroup-input" >
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Anak</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="orangtua" class="form-selectgroup-input" >
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Orangtua</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="family-relation" value="lain" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Lain</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

              <label class="form-label">Alamat</label>

              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Jalan</label>
                      <input type="text" class="form-control" name="family-jalan" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kelurahan</label>
                      <input type="text" class="form-control" name="family-kelurahan" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kecamatan</label>
                      <input type="text" class="form-control" name="family-kecamatan" placeholder="Input" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kota</label>
                      <input type="text" class="form-control" name="family-city" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kode Pos</label>
                      <input type="text" class="form-control" name="family-postal-code" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Perumahan</label>
                      <input type="text" class="form-control" name="family-residence" placeholder="Input" value="">
                    </div>
                  </div>
                </div>
              </fieldset>

              <label class="form-label">No. Telepon</label>
              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Rumah</label>
                      <input type="text" class="form-control" name="family-home-phone-number" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kantor</label>
                      <input type="text" class="form-control" name="family-office-phone-number" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Handphone</label>
                      <input type="text" class="form-control" name="family-handphone-phone-number" placeholder="Input" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">Fax</label>
                      <input type="text" class="form-control" name="family-fax-phone-number" placeholder="Input" value="">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">WA</label>
                      <input type="text" class="form-control" name="family-wa-phone-number" placeholder="Input" value="">
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="mb-3">
                <label class="form-label">Jaminan</label>
                <input type="text" class="form-control" name="family-assurance" placeholder="Input" value="">
              </div>

              <div class="mb-3">
                <label class="form-label">Pasien Mengetahui Klinik Utama Adinata dari</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="dokter" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Dokter</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="sendiri" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Sendiri</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="saudara/teman" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Saudara/Teman</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="iklan" class="form-selectgroup-input" >
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Iklan</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-get-info" value="lainnya" class="form-selectgroup-input" >
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Lainnya</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

            </div>

            @endif

            <div class="card-footer text-right">
              <div class="d-flex">
                {{-- <a href="#" class="btn btn-link">Cancel</a> --}}
                <button type="submit" class="btn btn-primary ml-auto">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>

@endsection
