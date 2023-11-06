@extends('layouts.app')
@section('title','Add Company')


@section('content')
<div class="mt-2"><a href="{{route('company.index')}}" class="btn btn-sm btn-primary">View All Companies</a></div>
<div class="container mt-3">
  <div class="card">
    <div class="card-header text-center"><h3>Update Company</h3></div>
    <div class="card-body">
        <form class="row g-3" action="{{ route('company.update', ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Company Name </label>
          <input type="text" class="form-control" name="name" value="{{ $company->name }}">
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Company Email</label>
          <input type="email" class="form-control" name="email" value="{{ $company->email }}" >
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputAddress" class="form-label">Company Website URL</label>
          <input type="text" class="form-control" name="website" value="{{ $company->website }}">
          @error('website')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
            <span><img src="{{ asset('/storage/' . $company->logo) }}" height="100" width="100" alt=""></span>
          <label for="inputAddress2" class="form-label">Upload Company Logo</label>
          <input type="file" class="form-control" name="logo" value="">
          @error('logo')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

