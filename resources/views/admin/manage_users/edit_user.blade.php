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
                <li class="breadcrumb-item"><a href="#">Pengaturan User</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit User</a></li>
              </ol>
            </div>
            <h2 class="page-title">
              Edit User
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
          <form action="{{ route('manage_users.update_user') }}" method="post" class="card" enctype="multipart/form-data">
            @csrf

            <div class="card-header">
              <h4 class="card-title">User</h4>
                <div class="card-options">
                  <a href="{{ route('manage_users.delete_user', ['id' => $user->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="si si-printer"></i> Delete
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
              
              <input type="text" class="form-control" name="id" value="{{ $user->id }}" hidden>

              <div class="mb-3">
                <label class="form-label">Nama lengkap</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Enter New Password</label>
                <input type="password" class="form-control" name="password" required>
                <small class="form-hint">
                  Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                  spaces, special characters, or emoji.
                </small>
              </div>

              <div class="mb-3">
                <label class="form-label">Pilih Level</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="access_level" value="superadmin" class="form-selectgroup-input" @if ($user->access_level == 'superadmin') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>SuperAdmin</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="access_level" value="kasir" class="form-selectgroup-input" @if ($user->access_level == 'kasir') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Kasir</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="access_level" value="apoteker" class="form-selectgroup-input" @if ($user->access_level == 'apoteker') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Apoteker</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="access_level" value="staf" class="form-selectgroup-input" @if ($user->access_level == 'staf') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Staf</strong>
                      </div>
                    </div>
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" name="identification_card" value="{{ $user->identification_card }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="sex" value="laki-laki" class="form-selectgroup-input" @if ($user->sex == 'laki-laki') checked @endif>
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
                    <input type="radio" name="sex" value="perempuan" class="form-selectgroup-input" @if ($user->sex == 'perempuan') checked @endif>
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
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
              </div>
                  
              <div class="mb-3">
                <label class="form-label">Agama</label>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-row">

                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="religion" value="islam" class="form-selectgroup-input" @if ($user->religion == 'islam') checked @endif>
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
                    <input type="radio" name="religion" value="khatolik" class="form-selectgroup-input" @if ($user->religion == 'khatolik') checked @endif>
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
                    <input type="radio" name="religion" value="kristen" class="form-selectgroup-input" @if ($user->religion == 'kristen') checked @endif>
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
                    <input type="radio" name="religion" value="budha" class="form-selectgroup-input" @if ($user->religion == 'budha') checked @endif>
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
                    <input type="radio" name="religion" value="hindu" class="form-selectgroup-input" @if ($user->religion == 'hindu') checked @endif>
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                      <div class="mr-3">
                        <span class="form-selectgroup-check"></span>
                      </div>
                      <div>
                          <strong>Hindu</strong>
                      </div>
                    </div>
                  </label>
                  <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="religion" value="lainnya" class="form-selectgroup-input" @if ($user->religion == 'lainnya') checked @endif>
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
                <label class="form-label">Bio</label>
                <textarea class="form-control" name="about_me" rows="6">{{ $user->about_me }}</textarea>
              </div>

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                <a href="#" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Submit</button>
              </div>
            </div>

          </form>
        </div>
        
      </div>

    </div>

@endsection