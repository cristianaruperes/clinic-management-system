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
                <li class="breadcrumb-item"><a href="#">Obat</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Stok</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Tambah Stok Obat
            </h2>
          </div>
          <!-- Page title actions -->
          {{-- <div class="col-auto ml-auto d-print-none">
            <a href="{{ route('manage_users.add_user') }}" class="btn btn-primary ml-3 d-none d-sm-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Add New User
            </a>
            <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </a>
          </div> --}}
        </div>
      </div>

      <div class="card">
        <div class="card-header" style="display: block; text-align: center;">
          <h3 class="card-title">Jenis Obat</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Nama Obat</label>
                <div class="col">
                  <input type="text" class="form-control" value="{{$medicine->nama}}" disabled>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Stok Minimal</label>
                <div class="col">
                  <input type="number" class="form-control" value="{{$medicine->stok_minimal}}" disabled>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Satuan</label>
                <div class="col">
                  <input type="text" class="form-control" value="{{$medicine->satuan}}" disabled>
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label class="form-label col-3 col-form-label">Stok Sisa</label>
                <div class="col">
                  <input type="number" class="form-control" value="{{$medicine->stok_sisa}}" disabled>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <form action="{{ route('save.medicines.stock') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf

            <div class="card-header">
              <h4 class="card-title">Tambah Stock Obat</h4>
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
              
              <input type="text" class="form-control" name="id" value="{{ $medicine->id }}" hidden>

              <div class="mb-3">
                <label class="form-label">Jumlah Obat</label>
                <input type="number" class="form-control" name="jumlah" placeholder="Input">
              </div>

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                {{-- <a href="{{ route('list.medicines') }}" class="btn btn-link">Cancel</a> --}}
                <button type="submit" class="btn btn-primary ml-auto">Tambah Obat</button>
              </div>
            </div>

          </form>
        </div>
        
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">History</h3>
        </div>

        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                <th class="w-1">No</th>
                <th>Jumlah Obat</th>
                <th>Tanggal ditambah</th>
                @if(isSuperadmin())
                <th class="text-right">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @if (isset($medicine_stock))
              <?php $i=0; ?>
                  @foreach ($medicine_stock as $stock)
                  <tr>
                    <td>{{ $i+=1 }}</td>
                    <td>{{ $stock->jumlah }}</td>
                    <td><?php echo ($stock->created_at) ? date('d-m-Y', strtotime($stock->created_at)) : ''; ?></td>

                    @if(isSuperadmin())

                    <td class="text-right">
                      <a href="{{ route('delete.medicines.stock', ['id' => $stock->id]) }}" onclick="return confirm('Are you sure?')">Hapus</a>
                    </td>

                    @endif
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
          {{ $medicine_stock->appends(request()->input())->links() }}
        </div>
      </div>

    </div>

@endsection