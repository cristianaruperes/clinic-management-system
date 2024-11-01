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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Rekam Medis Pasien</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Rekam Medis Pasien
            </h2>
          </div>
          <!-- Page title actions -->
          
          <div class="col-auto ml-auto d-print-none">
            <span class="d-none d-sm-inline">
              <a href="{{ route('list.pharmacy.patients') }}" class="btn btn-white">
                Daftar Semua Pasien
              </a>
            </span>

          </div>
          
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Pasien Rawat Jalan</h3>
          
          
          {{-- <div class="col-auto ml-auto d-print-none">
            <div class="d-flex">
              <div class="mr-3">

                <form method="post" action="{{ route('search.cashier.patient') }}" enctype="multipart/form-data">
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
        
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1">No. Patient</th>
                <th>Nama Lengkap</th>
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
                    <td><?php echo ($rekam->patient->dateOfBirth) ? date('d-m-Y', strtotime($rekam->patient->dateOfBirth)) : ''; ?></td>
                    <td>{{ $rekam->patient->sex }}</td>
                    <td>{{ $rekam->doctor->name }}</td>
                    <td>{{ $rekam->status }}</td>
                    <td><?php echo ($rekam->tanggal_pelayanan) ? date('d-m-Y', strtotime($rekam->tanggal_pelayanan)) : ''; ?></td>
                      <td class="text-right">
                        <span class="dropdown ml-1">
                          <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('buat.pharmacy.resep', ['id' => $rekam->id]) }}">
                              Buat Resep
                            </a>
                          </div>
                        </span>
                      </td>
                  </tr>
                  @endforeach
              @else
                  <tr>
                      <td>Tidak ada Pasien</td>
                  </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          {{ $rekamJalan->links() }}
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
          <h3 class="card-title">Daftar Pasien Rawat Inap</h3>
          
          
          {{-- <div class="col-auto ml-auto d-print-none">
            <div class="d-flex">
              <div class="mr-3">

                <form method="post" action="{{ route('search.cashier.patient') }}" enctype="multipart/form-data">
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
        
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1">No. Patient</th>
                <th>Nama Lengkap</th>
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
                      <td><?php echo ($rekam->patient->dateOfBirth) ? date('d-m-Y', strtotime($rekam->patient->dateOfBirth)) : ''; ?></td>
                      <td>{{ $rekam->patient->sex }}</td>
                      <td>{{ $rekam->doctor->name }}</td>
                      <td>{{ $rekam->status }}</td>
                      <td><?php echo ($rekam->tanggal_pelayanan) ? date('d-m-Y', strtotime($rekam->tanggal_pelayanan)) : ''; ?></td>
                      <td class="text-right">
                        <span class="dropdown ml-1">
                          <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('buat.pharmacy.resep.rekam_medis_rawat_inap', ['id' => $rekam->id]) }}">
                              Buat Resep
                            </a>
                          </div>
                        </span>
                      </td>
                  </tr>
                  @endforeach
              @else
                  <tr>
                      <td>Tidak ada Pasien</td>
                  </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          {{ $rekamInap->links() }}
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