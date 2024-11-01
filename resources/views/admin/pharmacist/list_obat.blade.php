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
              Daftar Obat
            </h2>
          </div>
          <!-- Page title actions -->
          {{-- <div class="col-auto ml-auto d-print-none">
            <span class="d-none d-sm-inline">
              <a href="{{ route('list.pharmacy.patients') }}" class="btn btn-white">
                Daftar Pasien
              </a>
            </span>

            <a href="{{ route('add.medicines') }}" class="btn btn-primary ml-3 d-none d-sm-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Tambah Jenis obat baru
            </a>
            <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </a>
          </div> --}}
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Obat</h3>

          <div class="col-auto ml-auto d-print-none">
            <div class="d-flex">
              <div class="mr-3">

                <form method="get" action="{{ route('pharmacist.search.medicines') }}">

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

        <div class="card-body">
          @if (isset($medicines))

            @foreach ($medicines as $medicine)
              @if ($medicine->stok_sisa < $medicine->stok_minimal)
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <b>{{ $medicine->nama }}</b> melewati batas minimum
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
              @endif
            @endforeach

          @endif

          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-1">Kode Item</th>
                  <th>Nama Obat</th>
                  <th>Stok Obat saat ini</th>
                  <th>Stok Minimal</th>
                  <th>Stok Terpakai</th>
                  <th>Harga Satuan</th>
                  <th>Tanggal expired</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if (isset($medicines))
                    @foreach ($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->kode_item }}</td>
                        <td>{{ $medicine->nama }}</td>
                        <td>{{ $medicine->stok_sisa }}</td>
                        <td>{{ $medicine->stok_minimal }}</td>
                        <td>{{ $medicine->stok_terpakai }}</td>
                        <td>Rp. {{ ($medicine->harga_jual) ? number_format($medicine->harga_jual) : "0" }}</td>
                        <td><?php echo ($medicine->tanggal_expired) ? date('d-m-Y', strtotime($medicine->tanggal_expired)) : ''; ?></td>
                        <td class="text-right">
                          <span class="dropdown ml-1">
                            <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{ route('add.medicines.stock', ['id' => $medicine->id]) }}">
                                Tambah Stok Obat
                              </a>
                            </div>
                          </span>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Tidak ada jenis Obat</td>
                    </tr>
                @endif
              </tbody>
            </table>
          </div>

        </div>

        <div class="card-footer d-flex align-items-center">
          {{ $medicines->links() }}
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

