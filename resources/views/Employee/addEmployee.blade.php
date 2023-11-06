@extends('layouts.app')
@section('title','Add Employee')


@section('content')
<div class="mt-2"><a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">View All Employees</a></div>
<div class="container mt-3">
    <div class="card">
      <div class="card-header text-center"><h3>Add New Employee</h3></div>
      <div class="card-body">
        <form class="row g-3" action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Employee First Name </label>
            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
            @error('first_name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Employee Last Name </label>
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
            @error('last_name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputAddress" class="form-label">Employee Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Employee Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" >
            @error('phone')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="inputAddress2" class="form-label">Select Company</label>
            <select name="company_id" id="company_id" class="form-select">
                <option value="" disabled selected>--Select a Company--</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id')
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