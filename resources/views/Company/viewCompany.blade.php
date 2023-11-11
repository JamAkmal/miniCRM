@extends('layouts.app')
@section('title','View')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4" style="display: flex">
            <div class="card m-auto" style="width: 24rem;text-align:center;">
                <img src="{{ asset('/storage/' . $company->logo) }}" height="75" width="75" alt="" style="align-self: center">
                <div class="card-body">
                    <h5 class="card-title">Company Name : {{$company->name}}</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p> --}}
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Company Website : {{$company->website}}</li>
                        <li class="list-group-item">Company Email : {{$company->email}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="text-align:center;">
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
                                    <a href="{{ route('company.view', ['company' => $company->id]) }}" class="btn btn-sm btn-secondary">view</a>
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
            </div>
        </div>
    </div>
</div>


@endsection