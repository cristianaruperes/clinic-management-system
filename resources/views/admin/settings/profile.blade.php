@extends('admin.settings.main_setting')

@section('sub-setting')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">My Profile</h3>
    <div class="card-options">
      <a href="{{ route('setting.edit_profile', ['id' => $user->id]) }}" class="btn btn-primary"><i class="si si-printer"></i> Edit
      </a>
    </div>
  </div>
  <div class="card-body">
    <form>
      <div class="row mb-3">
        <div class="col-auto">
          <span class="avatar avatar-lg" style="background-image: url({{ asset('admin_template/static/user-icon.jpg') }})"></span>
        </div>
        <div class="col">
          <div class="mb-2">
            <label class="form-label">Email-Address</label>
            <input class="form-control" value="{{ Auth::user()->email }}">
          </div>
        </div>
      </div>
      <div class="mb-2">
        <label class="form-label">Bio</label>
        <textarea class="form-control" rows="5">{{ Auth::user()->about_me }}</textarea>
      </div>
      {{-- <div class="mb-2">
        <label class="form-label">Email-Address</label>
        <input class="form-control" placeholder="your-email@domain.com">
      </div>
      <div class="mb-2">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" value="password">
      </div>
      <div class="form-footer">
        <button class="btn btn-primary btn-block">Save</button>
      </div> --}}
    </form>
  </div>
</div>

@endsection