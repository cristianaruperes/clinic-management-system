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
                <li class="breadcrumb-item"><a href="#">Layanan Klinik</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Edit Layanan ini
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

      <div class="row">
        <div class="col-12">
          <form action="{{ route('update.cashier.service') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf

            <div class="card-header">
              <h4 class="card-title">Layanan</h4>
                <div class="card-options">
                  <a href="{{ route('delete.cashier.service', ['id' => $service->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="si si-printer"></i> Delete
                  </a>
                </div>
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
              
              <input type="text" class="form-control" name="id" value="{{ $service->id }}" hidden>

              <div class="mb-3">
                <label class="form-label">Nama layanan</label>
                <input type="text" class="form-control" name="name" value="{{ $service->name }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="text" class="form-control" name="price" value="{{ $service->price }}">
              </div>

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                <a href="{{ route('show.cashier.service') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Submit</button>
              </div>
            </div>

          </form>
        </div>
        
      </div>

    </div>

@endsection