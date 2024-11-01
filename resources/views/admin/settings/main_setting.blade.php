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
              Settings
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ml-auto d-print-none">
            {{-- <a href="{{ route('form.patient') }}" class="btn btn-primary ml-3 d-none d-sm-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Medication information
            </a> --}}
            <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center">
              <h2 class="mb-3">Menu Settings</h2>
              <a href="{{ route('setting.profile') }}" class="btn btn-outline-primary btn-block">
                Profile
              </a>

              @if (isSuperadmin())
              {{-- <a href="{{ route('setting.audit_logs') }}" class="btn btn-outline-primary btn-block">
                Audit Logs
              </a>
              <a href="{{ route('setting.upload_logo') }}" class="btn btn-outline-primary btn-block">
                Upload Logo
              </a> --}}
              @endif
              
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          
          @yield('sub-setting')
          
        </div>
      </div>

    </div>

@endsection