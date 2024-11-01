@extends('layouts.main')

@section('content')

    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col-auto">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              Overview
            </div>
            <h2 class="page-title">
              Daftar Rekam Medis Pasien
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ml-auto d-print-none">
            {{-- <span class="d-none d-sm-inline">
              <a href="{{ route('show.patient') }}" class="btn btn-white">
                Daftar Semua Pasien
              </a>
            </span> --}}
            <div class="d-flex">

              <div class="mr-3">
              <form method="get" action="{{ route('date.rekam_medis.patient') }}">
                  <div class="input-icon">
                  <input id="calendar-time" name="date" type="text" value="{{ $date }}" class="form-control flatpickr-input" placeholder="Pilih Tanggal" readonly="readonly">
                    <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                    </span>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Cari</button>
              </form>

            </div>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Rawat Jalan Pasien</h3>
        </div>

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

        {{-- <div class="card-body border-bottom py-3">

          <div class="d-flex">
            <div class="text-muted">
              Show
              <div class="mx-2 d-inline-block">
                <input type="text" class="form-control form-control-sm" value="8" size="3">
              </div>
              entries
            </div>
            <div class="ml-auto text-muted">
              Search:
              <div class="ml-2 d-inline-block">
                <input type="text" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div> --}}

        <div class="table-responsive text-center">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1">No. Patient</th>
                <th>Nama Lengkap</th>
                <th>Nomor Urut</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Dokter Tujuan</th>
                <th>Status</th>
                <th>Tanggal Pelayanan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if ($rekamJalan->isNotEmpty())
                  @foreach ($rekamJalan as $rekam)
                  <tr>
                      <td>{{ $rekam->patient->patient_number }}</td>
                      <td>{{ $rekam->patient->name }}</td>
                      <td>{{ $rekam->nomor_urut }}</td>
                      <td><?php echo ($rekam->patient->dateOfBirth) ? date('d-m-Y', strtotime($rekam->patient->dateOfBirth)) : ''; ?></td>
                      <td>{{ $rekam->patient->sex }}</td>
                      <td>{{ $rekam->doctor->name }}</td>
                      <td>{{ $rekam->status }}</td>
                      <td><?php echo ($rekam->tanggal_pelayanan) ? date('d-m-Y', strtotime($rekam->tanggal_pelayanan)) : ''; ?></td>
                      <td class="text-right">
                        <span class="dropdown ml-1">
                          <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('print.rekam_medis.patient', ['id' => $rekam->id]) }}">
                              Print rekam medis
                            </a>
                          </div>
                        </span>
                      </td>
                  </tr>
                  @endforeach
              @else
                  <tr>
                      <td>Tidak ada data</td>
                  </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          {{ $rekamJalan->appends(['date' => $date ])->links() }}
          {{-- <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
          <ul class="pagination m-0 ml-auto">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="15 6 9 12 15 18" /></svg>
                prev
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="9 6 15 12 9 18" /></svg>
              </a>
            </li>
          </ul> --}}
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Rawat Inap Pasien</h3>


          {{-- <div class="col-auto ml-auto d-print-none">
            <div class="d-flex">
              <div class="mr-3">

                <form method="post" action="{{ route('search.patient') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="input-icon">
                    <input type="text" class="form-control" name="keyword" placeholder="Search…">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                    </span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
              </form>

            </div>
          </div> --}}

        </div>

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

        {{-- <div class="card-body border-bottom py-3">

          <div class="d-flex">
            <div class="text-muted">
              Show
              <div class="mx-2 d-inline-block">
                <input type="text" class="form-control form-control-sm" value="8" size="3">
              </div>
              entries
            </div>
            <div class="ml-auto text-muted">
              Search:
              <div class="ml-2 d-inline-block">
                <input type="text" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div> --}}

        <div class="table-responsive text-center">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1">No. Patient</th>
                <th>Nama Lengkap</th>
                <th>Nomor Urut</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Dokter Tujuan</th>
                <th>Status</th>
                <th>Tanggal Pelayanan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if ($rekamInap->isNotEmpty())
                  @foreach ($rekamInap as $rekam)
                  <tr>
                      <td>{{ $rekam->patient->patient_number }}</td>
                      <td>{{ $rekam->patient->name }}</td>
                      <td>{{ $rekam->nomor_urut }}</td>
                      <td><?php echo ($rekam->patient->dateOfBirth) ? date('d-m-Y', strtotime($rekam->patient->dateOfBirth)) : ''; ?></td>
                      <td>{{ $rekam->patient->sex }}</td>
                      <td>{{ $rekam->doctor->name }}</td>
                      <td>{{ $rekam->status }}</td>
                      <td><?php echo ($rekam->tanggal_pelayanan) ? date('d-m-Y', strtotime($rekam->tanggal_pelayanan)) : ''; ?></td>
                      <td class="text-right">
                        <span class="dropdown ml-1">
                          <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('print.rekam_medis_rawat_inap.patient', ['id' => $rekam->id]) }}">
                              Print rekam medis
                            </a>
                          </div>
                        </span>
                      </td>
                  </tr>
                  @endforeach
              @else
                  <tr>
                      <td>Tidak ada data</td>
                  </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          {{ $rekamInap->appends(['date' => $date ])->links() }}
          {{-- <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
          <ul class="pagination m-0 ml-auto">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="15 6 9 12 15 18" /></svg>
                prev
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="9 6 15 12 9 18" /></svg>
              </a>
            </li>
          </ul> --}}
        </div>
      </div>

    </div>

@endsection
