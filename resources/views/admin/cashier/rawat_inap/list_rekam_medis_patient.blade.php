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
            <li class="breadcrumb-item"><a href="#">Kasir</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Rekam Medis Rawat Inap</a></li>
          </ol>
        </div>
        <h2 class="page-title">
          Rekam Medis Rawat Inap
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ml-auto d-print-none">
        <div class="page-pretitle">
          Nomor Pasien : {{$patient->patient_number}}
        </div>
        <h2 class="page-title">
          Nama Pasien : {{$patient->name}}
        </h2>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Konsultasi</h3>

    </div>

    <div class="table-responsive">
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th class="w-1">No. Dokter</th>
            <th>Nama Dokter</th>
            <th>Nomor Urut</th>
            <th>Status</th>
            <th>Kamar</th>
            <th>Tanggal Pelayanan</th>
            <th>Tanggal Pembayaran</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if (isset($records))
          @foreach ($records as $record)
          <tr>
            <td>{{ $record->doctor->doctor_number }}</td>
            <td>{{ $record->doctor->name }}</td>
            <td>{{ $record->nomor_urut }}</td>
            <td>{{ $record->status }}</td>
            <td>{{ $record->room->name }}</td>
            <td><?php echo ($record->tanggal_pelayanan) ? date('d-m-Y', strtotime($record->tanggal_pelayanan)) : ''; ?></td>
            <td><?php echo ($record->tanggal_pembayaran) ? date('d-m-Y', strtotime($record->tanggal_pembayaran)) : ''; ?></td>
            <td class="text-right">
              <span class="dropdown ml-1">
                <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('show.payment_rawat_inap.patient', ['id' => $record->id]) }}">
                    Pembayaran
                  </a>
                  {{-- <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('delete.rekam_medis.patient', ['id' => $record->id]) }}">
                  Hapus
                  </a> --}}
                  {{-- <a class="dropdown-item" href="{{ route('print.rekam_medis.patient', ['id' => $record->id]) }}">
                  Print rekam medis
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
      {{ $records->appends(request()->input())->links()}}
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