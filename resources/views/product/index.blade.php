@extends("layout.master")

@section('content')

<h1 class="h3 mb-3">Product</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">All Product</h5>
                <a href="/product/create" class="btn btn-sm btn-primary">Add Product</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $products)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$products->foto) }}" width="48" height="48" class="rounded-circle me-2" alt="Avatar">
                            {{ $products->name }}
                        </td>
                        <td>{{ $products->category->name }}</td>
                        <td>{{ $products->stock }}</td>
                        <td class="table-action">
                            <form action="/product/{{ $products->id }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure to delete this data?')">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="/product/update/{{ $products->id }}" class="btn btn-warning btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash align-middle">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection