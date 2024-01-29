@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.service.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Service</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.service.index') }}">Service</a></div>
        <div class="breadcrumb-item">Create Service</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Service</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.service.store') }}" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="service_name" class="form-control" value="{{ old('service_name') }}">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="service_description" class="form-control" id="service_description" style="height: 100px"></textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
