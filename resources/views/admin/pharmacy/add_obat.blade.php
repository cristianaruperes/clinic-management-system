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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Obat</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Tambah Obat baru
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
          <form action="{{ route('save.medicines') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf

            <div class="card-header">
              <h4 class="card-title">Form Obat</h4>
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

                <label class="form-label">Jenis Produk</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="jenis_produk" value="retail" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Retail</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="jenis_produk" value="racikan" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Racikan</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="jenis_produk" value="jasa" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Jasa</strong>
                      </div>
                    </div>
                  </label>
              
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Obat</label>
                <input type="text" class="form-control" name="nama" placeholder="Input Name">
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Harga Jual/Tarif (Rupiah)</label>
                    <input type="number" class="form-control" name="harga_jual" placeholder="Input">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Harga Beli/HPP (Rupiah)</label>
                    <input type="number" class="form-control" name="harga_beli" placeholder="Input">
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-label">Satuan</div>
                <select class="form-select" name="satuan">
                  <option value="tablet">TABLET</option>
                  <option value="kapsul">KAPSUL</option>
                  <option value="ml">ML</option>
                  <option value="gr">GR</option>
                  <option value="botol">BOTOL</option>
                  <option value="dos">DOS</option>
                  <option value="box">BOX</option>
                  <option value="lusin">LUSIN</option>
                  <option value="kaplet">KAPLET</option>
                  <option value="puyer">PUYER</option>
                  <option value="strip">STRIP</option>
                  <option value="bungkus">BUNGKUS</option>
                  <option value="emplek">EMPLEK</option>
                  <option value="cm2">CM2</option>
                  <option value="kali">KALI</option>
                  <option value="tube">TUBE</option>
                  <option value="pcs">PCS</option>
                  <option value="buah">BUAH</option>
                  <option value="lembar">LEMBAR</option>
                  <option value="vial">VIAL</option>
                  <option value="supp">SUPP</option>
                  <option value="sirup">SIRUP</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Stok Minimal</label>
                <input type="number" class="form-control" name="stok_minimal" placeholder="Input">
              </div>

              <div class="mb-3">
                <label class="form-label">Tanggal Expired</label>
                <input id="calendar-simple" type="date" name="tanggal_expired" class="form-control mb-2" placeholder="Select a date" />
              </div>

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                <a href="{{ route('list.medicines') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Submit</button>
              </div>
            </div>

          </form>
        </div>
        
      </div>

    </div>

@endsection