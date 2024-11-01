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
          Pendaftaran
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ml-auto d-print-none">
        {{-- <span class="d-none d-sm-inline">
          <a href="{{ route('show.patient') }}" class="btn btn-white">
            Daftar Semua Pasien
          </a>
        </span> --}}
        <a href="{{ route('export.patient') }}"" class="btn btn-outline-secondary ml-3 d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="14 3 14 8 19 8"></polyline><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><polyline points="9 14 12 17 15 14"></polyline></svg>
            Export to Excel
          </a>
        <a href="{{ route('form.patient') }}" class="btn btn-primary ml-3 d-none d-sm-inline-block">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
          Daftar Pasien Baru
        </a>
        <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
        </a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Pasien</h3>


      <div class="col-auto ml-auto d-print-none">
        <div class="d-flex">
          <div class="mr-3">

            <form method="get" action="{{ route('search.patient') }}">

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
            <th class="w-1">No. Patient</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nama Wali</th>
            <th>Nomor telepon Wali</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if (isset($patients))
          @foreach ($patients as $patient)
          <tr>
            <td>{{ $patient->patient_number }}</td>
            {{-- <td>{{ $patient->patient_number_sequent }}</td> --}}
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td><?php echo ($patient->dateOfBirth) ? date('d-m-Y', strtotime($patient->dateOfBirth)) : ''; ?></td>
            <td>{{ $patient->sex }}</td>
            @if (!empty($patient->family))
              <td>{{ $patient->family->name }}</td>
              <td>{{ $patient->family->handphone_phone_number }}</td>
            @else
              <td></td>
              <td></td>
            @endif

            <td class="text-right">
              <span class="dropdown ml-1">
                <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('edit.patient', ['id' => $patient->id]) }}">
                    Edit Data Pasien
                  </a>
                  <a class="dropdown-item" href="{{ route('list.rekam_medis_rjalan.patient', ['id' => $patient->id]) }}">
                    Pelayanan Rawat Jalan
                  </a>
                  <a class="dropdown-item" href="{{ route('list.rekam_medis_rawat_inap.patient', ['id' => $patient->id]) }}">
                    Pelayanan Rawat Inap
                  </a>
                  <a class="dropdown-item" href="{{ route('print.patient', ['id' => $patient->id]) }}">
                    Print Formulir Pendaftaran
                  </a>
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
