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
              Dashboard
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ml-auto d-print-none">
            <span class="d-none d-sm-inline">
              <a href="{{ route('show.patient') }}" class="btn btn-white">
                Daftar Pasien
              </a>
            </span>
            <a href="{{ route('form.patient') }}" class="btn btn-primary ml-3 d-none d-sm-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Pasien Baru
            </a>
            <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </a>
          </div>
        </div>
      </div>

      <div class="alert alert-info">Selamat Datang Super Admin.

      </div>

      <div class="row row-deck row-cards">

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-green">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{-- 6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg> --}}
                </span>
              </div>
              <div class="h1 m-0">{{ $patients }}</div>
              <div class="text-muted mb-4">Pasien yang terdaftar</div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-green">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{-- 6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg> --}}
                </span>
              </div>
              <div class="h1 m-0">{{ $recordJalan }}</div>
              <div class="text-muted mb-4">Jumlah Rawat Jalan</div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-green">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{-- 6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg> --}}
                </span>
              </div>
              <div class="h1 m-0">{{ $recordInap }}</div>
              <div class="text-muted mb-4">Jumlah Rawat Inap</div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body p-2 text-center">
              <div class="text-right text-green">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{-- 6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg> --}}
                </span>
              </div>
              <div class="h1 m-0">{{ $users }}</div>
              <div class="text-muted mb-4">Jumlah Pengguna Aplikasi Klinik</div>
            </div>
          </div>
        </div>

        {{-- <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pengguna Yang Aktif</h3>
            </div>
            <div class="card-body">
              <div class="row mb-n3">
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)">
                      <span class="badge bg-red"></span></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Paweł Kuna</a>
                    <small class="d-block text-muted text-truncate mt-n1">2 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar">
                      <span class="badge bg-x"></span>JL</span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Jeffie Lewzey</a>
                    <small class="d-block text-muted text-truncate mt-n1">3 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Mallory Hulme</a>
                    <small class="d-block text-muted text-truncate mt-n1">today</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)">
                      <span class="badge bg-green"></span></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Dunn Slane</a>
                    <small class="d-block text-muted text-truncate mt-n1">6 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)">
                      <span class="badge bg-red"></span></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Emmy Levet</a>
                    <small class="d-block text-muted text-truncate mt-n1">3 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)">
                      <span class="badge bg-yellow"></span></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Maryjo Lebarree</a>
                    <small class="d-block text-muted text-truncate mt-n1">2 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar">
                      <span class="badge bg-x"></span>EP</span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Egan Poetz</a>
                    <small class="d-block text-muted text-truncate mt-n1">4 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)">
                      <span class="badge bg-yellow"></span></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Kellie Skingley</a>
                    <small class="d-block text-muted text-truncate mt-n1">6 days ago</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)">
                      <span class="badge bg-x"></span></span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Christabel Charlwood</a>
                    <small class="d-block text-muted text-truncate mt-n1">today</small>
                  </div>
                </div>
                <div class="col-6 row row-sm mb-3 align-items-center">
                  <a href="#" class="col-auto">
                    <span class="avatar">
                      <span class="badge bg-x"></span>HS</span>
                  </a>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block text-truncate">Haskel Shelper</a>
                    <small class="d-block text-muted text-truncate mt-n1">yesterday</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Patient</div>
                <div class="ml-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Last 7 days
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item active" href="#">Last 7 days</a>
                      <a class="dropdown-item" href="#">Last 30 days</a>
                      <a class="dropdown-item" href="#">Last 3 months</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">75</div>
              <div class="d-flex mb-2">
                <div>Conversion rate</div>
              </div>
              <div class="progress progress-sm">
                <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">75% Complete</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Patient</div>
                <div class="ml-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Last 7 days
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item active" href="#">Last 7 days</a>
                      <a class="dropdown-item" href="#">Last 30 days</a>
                      <a class="dropdown-item" href="#">Last 3 months</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">75</div>
              <div class="d-flex mb-2">
                <div>Conversion rate</div>
              </div>
              <div class="progress progress-sm">
                <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">75% Complete</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Patient</div>
                <div class="ml-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Last 7 days
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item active" href="#">Last 7 days</a>
                      <a class="dropdown-item" href="#">Last 30 days</a>
                      <a class="dropdown-item" href="#">Last 3 months</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">75</div>
              <div class="d-flex mb-2">
                <div>Conversion rate</div>
              </div>
              <div class="progress progress-sm">
                <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">75% Complete</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Patient</div>
                <div class="ml-auto lh-1">
                  <div class="dropdown">
                    <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Last 7 days
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item active" href="#">Last 7 days</a>
                      <a class="dropdown-item" href="#">Last 30 days</a>
                      <a class="dropdown-item" href="#">Last 3 months</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">75</div>
              <div class="d-flex mb-2">
                <div>Conversion rate</div>
              </div>
              <div class="progress progress-sm">
                <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">75% Complete</span>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Traffic summary</h3>
              <div id="chart-mentions" class="chart-lg"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Activity</h4>
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter">
                <tr>
                  <td class="w-100">
                    <a href="#" class="text-reset">Extend the data model.</a>
                  </td>
                  <td class="text-nowrap text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    January 01, 2019
                  </td>
                  <td>
                    <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                  </td>
                </tr>
                <tr>
                  <td class="w-100">
                    <a href="#" class="text-reset">Verify the event flow.</a>
                  </td>
                  <td class="text-nowrap text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    January 01, 2019
                  </td>
                  <td>
                    <span class="avatar">JL</span>
                  </td>
                </tr>
                <tr>
                  <td class="w-100">
                    <a href="#" class="text-reset">Database backup and maintenance</a>
                  </td>
                  <td class="text-nowrap text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    January 01, 2019
                  </td>
                  <td>
                    <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                  </td>
                </tr>
                <tr>
                  <td class="w-100">
                    <a href="#" class="text-reset">Identify the implementation team.</a>
                  </td>
                  <td class="text-nowrap text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    January 01, 2019
                  </td>
                  <td>
                    <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                  </td>
                </tr>
                <tr>
                  <td class="w-100">
                    <a href="#" class="text-reset">Define users and workflow</a>
                  </td>
                  <td class="text-nowrap text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    January 01, 2019
                  </td>
                  <td>
                    <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                  </td>
                </tr>
                <tr>
                  <td class="w-100">
                    <a href="#" class="text-reset">Check Pull Requests</a>
                  </td>
                  <td class="text-nowrap text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    January 01, 2019
                  </td>
                  <td>
                    <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div> --}}

      </div>
    </div>

@endsection