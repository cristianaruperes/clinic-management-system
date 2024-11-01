@extends('admin.settings.main_setting')

@section('sub-setting')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Upload Logo</h3>
  </div>
  <div class="card-body">
    <form>
        <div class="mb-3">
            <div class="form-label">Custom File Input</div>
            <div id="logoUpload">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-2">
                            <img src="https://via.placeholder.com/150" id="profile-img-tag" />
                        </div>
                    </div>
                </div>
                
                <div class="form-file">
                    <input type="file" class="form-file-input" id="customFile" name="upload_logo">
                    <label class="form-file-label" for="customFile">
                    <span class="form-file-text">Choose file...</span>
                    <span class="form-file-button">Browse</span>
                    </label>
                </div>
            </div>
            <small>*Logo images should be 150px <small>
        </div>
    </form>
  </div>
</div>

@endsection