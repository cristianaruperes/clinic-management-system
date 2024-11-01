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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Formulir</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              FORMULIR DATA IDENTITAS PASIEN
            </h2>
          </div>
        </div>
      </div>
      <div class="row">

        <form action="{{ route('save.patient') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf
          <div class="col-12">
            <div class="card-header">
              <h4 class="card-title">Form Patient</h4>
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

              <div class="mb-3">
                <label class="form-label">Nama lengkap pasien sesuai Kartu Identitas</label>
                <input type="text" class="form-control" name="patient-fullname" placeholder="Input Name" required>
              </div>

              <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">No. Kartu Identitas</label>
                    <input type="text" class="form-control" name="patient-id-card" placeholder="Input">
                  </div>
                </div>

                <div class="col-xl-8">
                  <div class="mb-3">
                    <label class="form-label">Pilih</label>
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="patient-card" value="ktp" class="form-selectgroup-input">
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
                        <input type="radio" name="patient-card" value="sim" class="form-selectgroup-input">
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
                        <input type="radio" name="patient-card" value="paspor" class="form-selectgroup-input">
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
                        <input type="radio" name="patient-card" value="others" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                            <strong>Lainnya</strong>
                          </div>
                        </div>
                      </label> --}}
                    </div>

                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Keluarga (Ayah/Suami/Marga)</label>
                <input type="text" class="form-control" name="patient-father-name" placeholder="Input Name">
              </div>

              <label class="form-label">Alamat Lengkap</label>

              <fieldset class="form-fieldset">
              <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Jalan</label>
                    <input type="text" class="form-control" name="patient-jalan" placeholder="Input Address">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" name="patient-kelurahan" placeholder="Input">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="patient-kecamatan" placeholder="Input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" name="patient-city" placeholder="Input">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" name="patient-postal-code" placeholder="Input">
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Perumahan</label>
                    <input type="text" class="form-control" name="patient-residence" placeholder="Input">
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
                      <input type="text" class="form-control" name="patient-home-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kantor</label>
                      <input type="text" class="form-control" name="patient-office-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Handphone</label>
                      <input type="text" class="form-control" name="patient-handphone-phone-number" placeholder="Input">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">Fax</label>
                      <input type="text" class="form-control" name="patient-fax-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">WA</label>
                      <input type="text" class="form-control" name="patient-wa-phone-number" placeholder="Input">
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="mb-3">
                <label class="form-label">Golongan Darah</label>
                <input type="text" class="form-control" name="patient-golongan-darah" placeholder="Input">
              </div>

              <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="patient-placeOfBirth" class="form-control mb-2" placeholder="Input Tempat" />
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input id="calendar-simple" type="date" name="patient-dateOfBirth" class="form-control mb-2" placeholder="Pilih tanggal" />
                    </div>
                  </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis kelamin</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-sex" value="laki-laki" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-sex" value="perempuan" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-marrital-status" value="sudah menikah" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-marrital-status" value="belum menikah" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-religion" value="islam" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-religion" value="khatolik" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-religion" value="kristen" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-religion" value="budha" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-religion" value="hindu" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-religion" value="lainnya" class="form-selectgroup-input">
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
                <input type="text" class="form-control" name="patient-nationality" placeholder="Input">
              </div>

              <div class="mb-3">
                <label class="form-label">Suku bangsa</label>
                <input type="text" class="form-control" name="patient-tribe" placeholder="Input">
              </div>

              <div class="mb-3">
                <label class="form-label">Bahasa</label>
                <input type="text" class="form-control" name="patient-language" placeholder="Input">
              </div>

              <div class="mb-3">
                <label class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" name="patient-occupation" placeholder="Input">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="patient-email" placeholder="Input">
              </div>

              {{-- <div class="mb-3">
                <label class="form-label">Occupation</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-occupation" value="professional" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Professional</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-occupation" value="housewife" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Housewife</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-occupation" value="employee" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Employee</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-occupation" value="civil servant" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Civil Servant</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-occupation" value="student" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Student</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-occupation" value="others" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Others</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div> --}}

              {{-- <div class="mb-3">
                <label class="form-label">Education Level</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-education" value="elementary" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Elementary</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-education" value="middle school" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Middle School</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-education" value="senior high school" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Senior High School</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-education" value="diploma" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Diploma</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-education" value="bachelor" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Bachelor</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div> --}}

              {{-- <div class="mb-3">
                <label class="form-label">Income per month (Rp)</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-income" value="5 million" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>&lt; 5million</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-income" value="5-10 million" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>5-10 million</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="patient-income" value="10 million" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>&gt;10 million</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div> --}}

            </div>
          </div>

          <div class="col-12">
            <div class="card-header">
              <h4 class="card-title">Dalam keadaan darurat, dapat menghubungi :</h4>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="family-full-name" placeholder="Input Name" required>
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
                    <input type="radio" name="family-relation" value="anak" class="form-selectgroup-input">
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
                    <input type="radio" name="family-relation" value="orangtua" class="form-selectgroup-input">
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
                      <input type="text" class="form-control" name="family-jalan" placeholder="Input Address">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kelurahan</label>
                      <input type="text" class="form-control" name="family-kelurahan" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kecamatan</label>
                      <input type="text" class="form-control" name="family-kecamatan" placeholder="Input">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kota</label>
                      <input type="text" class="form-control" name="family-city" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kode Pos</label>
                      <input type="text" class="form-control" name="family-postal-code" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Perumahan</label>
                      <input type="text" class="form-control" name="family-residence" placeholder="Input">
                    </div>
                  </div>
                </div>
              </fieldset>

              {{-- <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="family-address" placeholder="Input Address">
                  </div>
                </div>
                <div class="col-xl-2">
                  <div class="mb-3">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" name="family-kelurahan" placeholder="Input">
                  </div>
                </div>
                <div class="col-xl-2">
                  <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="family-kecamatan" placeholder="Input">
                  </div>
                </div>
                <div class="col-xl-2">
                  <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="family-city" placeholder="Input">
                  </div>
                </div>
                <div class="col-xl-2">
                  <div class="mb-3">
                    <label class="form-label">Postal code</label>
                    <input type="text" class="form-control" name="family-postal-code" placeholder="Input">
                  </div>
                </div>
              </div> --}}

              <label class="form-label">No. Telepon</label>
              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Rumah</label>
                      <input type="text" class="form-control" name="family-home-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Kantor</label>
                      <input type="text" class="form-control" name="family-office-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="mb-3">
                      <label class="form-label">Handphone</label>
                      <input type="text" class="form-control" name="family-handphone-phone-number" placeholder="Input">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">Fax</label>
                      <input type="text" class="form-control" name="family-fax-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="mb-3">
                      <label class="form-label">WA</label>
                      <input type="text" class="form-control" name="family-wa-phone-number" placeholder="Input">
                    </div>
                  </div>
                </div>
              </fieldset>

              {{-- <label class="form-label">Phone Number</label>
              <fieldset class="form-fieldset">
                <div class="row">
                  <div class="col-xl-3">
                    <div class="mb-3">
                      <label class="form-label">Home</label>
                      <input type="text" class="form-control" name="family-home-phone-number" placeholder="Input Address">
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="mb-3">
                      <label class="form-label">Office</label>
                      <input type="text" class="form-control" name="family-office-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="mb-3">
                      <label class="form-label">Cell Phone 1</label>
                      <input type="text" class="form-control" name="family-cellphone1-phone-number" placeholder="Input">
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="mb-3">
                      <label class="form-label">Cell Phone 2</label>
                      <input type="text" class="form-control" name="family-cellphone2-phone-number" placeholder="Input">
                    </div>
                  </div>
                </div>
              </fieldset> --}}

              <div class="mb-3">
                <label class="form-label">Jaminan</label>
                <input type="text" class="form-control" name="family-assurance" placeholder="Input">
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
                    <input type="radio" name="patient-get-info" value="iklan" class="form-selectgroup-input">
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
                    <input type="radio" name="patient-get-info" value="lainnya" class="form-selectgroup-input">
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

              {{-- <div class="row">
                <div class="col-xl-4">
                  <div class="mb-3">
                    <label class="form-label">ID Card Number</label>
                    <input type="text" class="form-control" name="family-id-card-number" placeholder="Input Address">
                  </div>
                </div>

                <div class="col-xl-8">
                  <div class="mb-3">
                    <label class="form-label">Select Card</label>
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="family-card" value="identification card" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                              <strong>Identification Card</strong>
                          </div>
                        </div>
                      </label>
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="family-card" value="driving license" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                              <strong>Driving License</strong>
                          </div>
                        </div>
                      </label>
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="family-card" value="passport" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                            <strong>Passport</strong>
                          </div>
                        </div>
                      </label>
                      <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="family-card" value="others" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                          <div class="mr-3">
                            <span class="form-selectgroup-check"></span>
                          </div>
                          <div>
                            <strong>Others</strong>
                          </div>
                        </div>
                      </label>
                    </div>

                  </div>
                </div>
              </div> --}}

            </div>
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
