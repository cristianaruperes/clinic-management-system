<div class="navbar-expand-md d-print-none">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('staff.dashboard') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  Home
                </span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="9 11 12 14 20 6"></polyline><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path></svg>
                </span>
                <span class="nav-link-title">
                  Pendaftaran
                </span>
              </a>
              <ul class="dropdown-menu">
                <li >
                  <a class="dropdown-item" href="{{ route('show.patient') }}" >
                    Daftar Pasien Baru
                  </a>
                </li>
                <li >
                  <a class="dropdown-item" href="{{ route('rekam_medis.patient') }}" >
                    Daftar Rekam Medis Pasien
                  </a>
                </li>
                {{-- <li >
                  <a class="dropdown-item" href="./snippets.html" >
                    Daftar Pasien Rawat Inap
                  </a>
                </li> --}}
                
              </ul>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('list.doctor') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="3" y1="21" x2="21" y2="21"></line><line x1="9" y1="8" x2="10" y2="8"></line><line x1="9" y1="12" x2="10" y2="12"></line><line x1="9" y1="16" x2="10" y2="16"></line><line x1="14" y1="8" x2="15" y2="8"></line><line x1="14" y1="12" x2="15" y2="12"></line><line x1="14" y1="16" x2="15" y2="16"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path></svg>
                </span>
                <span class="nav-link-title">
                  Dokter Konsultasi
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('list.pharmacy.obat') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="3" y1="21" x2="21" y2="21"></line><line x1="9" y1="8" x2="10" y2="8"></line><line x1="9" y1="12" x2="10" y2="12"></line><line x1="9" y1="16" x2="10" y2="16"></line><line x1="14" y1="8" x2="15" y2="8"></line><line x1="14" y1="12" x2="15" y2="12"></line><line x1="14" y1="16" x2="15" y2="16"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path></svg>
                </span>
                <span class="nav-link-title">
                  Apotek
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show.cashier.patient') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="3" y1="21" x2="21" y2="21"></line><line x1="9" y1="8" x2="10" y2="8"></line><line x1="9" y1="12" x2="10" y2="12"></line><line x1="9" y1="16" x2="10" y2="16"></line><line x1="14" y1="8" x2="15" y2="8"></line><line x1="14" y1="12" x2="15" y2="12"></line><line x1="14" y1="16" x2="15" y2="16"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path></svg>
                </span>
                <span class="nav-link-title">
                  Kasir
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('manage_users.list_users') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="7" r="4"></circle><path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path></svg>
                </span>
                <span class="nav-link-title">
                  Pengaturan User
                </span>
              </a>
            </li> --}}
            <li class="nav-item">
            <a class="nav-link" href="{{ route('setting.profile') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </span>
                <span class="nav-link-title">
                  Settings
                </span>
              </a>
            </li>
          </ul>
          {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="." method="get">
              <div class="input-icon">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                </span>
                <input type="text" class="form-control" placeholder="Search…">
              </div>
            </form>
          </div> --}}
        </div>
      </div>
    </div>
  </div>