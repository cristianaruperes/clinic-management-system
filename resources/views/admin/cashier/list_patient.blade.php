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
              Kasir - Daftar Semua Pasien
            </h2>
          </div>
          <!-- Page title actions -->
          
          {{-- <div class="col-auto ml-auto d-print-none">
            <span class="d-none d-sm-inline">
              <a href="{{ route('show.cashier.patient') }}" class="btn btn-white">
                Daftar Pasien
              </a>
            </span>
              @if (isSuperadmin())
                <a href="{{ route('show.cashier.service') }}" class="btn btn-primary ml-3 d-none d-sm-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="3" y1="21" x2="21" y2="21"></line><line x1="9" y1="8" x2="10" y2="8"></line><line x1="9" y1="12" x2="10" y2="12"></line><line x1="9" y1="16" x2="10" y2="16"></line><line x1="14" y1="8" x2="15" y2="8"></line><line x1="14" y1="12" x2="15" y2="12"></line><line x1="14" y1="16" x2="15" y2="16"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path></svg>
                  Layanan Klinik
                </a>
                <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                </a>
              @endif
          </div> --}}
          
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Pasien</h3>
          
          
          <div class="col-auto ml-auto d-print-none">
            <div class="d-flex">
              <div class="mr-3">

                <form method="get" action="{{ route('search.cashier.patient') }}">

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
          </div>

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
        
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1">No. Pasien</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nama Wali</th>
                <th>Nomor Telepon Wali</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (isset($patients))
                  @foreach ($patients as $patient)
                  <tr>
                      <td>{{ $patient->patient_number }}</td>
                      <td>{{ $patient->name }}</td>
                      <td>{{ $patient->email }}</td>
                      <td><?php echo ($patient->dateOfBirth) ? date('d-m-Y', strtotime($patient->dateOfBirth)) : ''; ?></td>
                      <td>{{ $patient->sex }}</td>
                      <td>{{ $patient->family->name }}</td>
                      <td>{{ $patient->family->handphone_phone_number }}</td>
                      <td class="text-right">
                        <span class="dropdown ml-1">
                          <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            {{-- <a class="dropdown-item" href="{{ route('edit.patient', ['id' => $patient->id]) }}">
                              Edit
                            </a> --}}
                            <a class="dropdown-item" href="{{ route('list.cashier.rekam_medis_rjalan.patient', ['id' => $patient->id]) }}">
                              Rekam Medis Rawat Jalan
                            </a>
                            <a class="dropdown-item" href="{{ route('list.cashier.rekam_medis_rawat_inap.patient', ['id' => $patient->id]) }}">
                              Rekam Medis Rawat Inap
                            </a>
                            {{-- <a class="dropdown-item" href="{{ route('list.rekam_medis.patient', ['id' => $patient->id]) }}">
                              Show Pelayanan Rawat Jalan
                            </a> --}}
                          </div>
                        </span>
                      </td>
                  </tr>
                  @endforeach
              @else
                  <tr>
                      <td>No User created</td>
                  </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          {{ $patients->links() }}
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