@extends('layouts.app')
@section('title','View All Employees')


@section('content')
@if(\Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="alert-body">
        {{ \Session::get('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="mt-2"><a href="{{route('employee.create')}}" class="btn btn-sm btn-primary">Add New Company</a></div>
<h3 class="text-center">List OF All Employees</h3>
<div class="container mt-3">
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Company</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>
                    <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination-links">
    {{ $employees->links() }}
</div>
@endsection