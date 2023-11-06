@extends('layouts.app')
@section('title','Home Page')

@section('content')
    <h3 class="text-center">List OF All Companies </h3>
    <div class="container mt-3 ">
        <table class="table table-hover" id="myTable">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th scope="col">Logo</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <img src="{{ asset('/storage/' . $company->logo) }}" height="75" width="75" alt="">
                        </td>
                        <td>
                            <a href="{{ route('company.edit', ['company' => $company->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row d-grid justify-content-md-center mt-4">{{ $companies->links() }}</div>
    </div>
@endsection