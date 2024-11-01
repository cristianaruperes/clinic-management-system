@extends('admin.settings.main_setting')

@section('sub-setting')

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Activity Users</h3>
    </div>
    <div class="card-body border-bottom py-3">
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
    </div>
    <div class="table-responsive">
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th class="w-1">No. Patient</th>
            <th>Fullname</th>
            <th>ID Card</th>
            <th>Email</th>
            <th>Sex</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="text-muted">001401</span></td>
            <td><a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
            <td>
              <span class="flag flag-country-us"></span>
              Carlson Limited
            </td>
            <td>
              87956621
            </td>
            <td>
              15 Dec 2017
            </td>
            <td>
              <span class="status-icon bg-success"></span> Paid
            </td>
            <td class="text-right">
              <span class="dropdown ml-1">
                <button class="btn btn-white btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">
                    Action
                  </a>
                  <a class="dropdown-item" href="#">
                    Another action
                  </a>
                </div>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
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
      </ul>
    </div>
  </div>

@endsection