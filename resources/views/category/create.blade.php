@extends("layout.master")

@section('content')

    <h1 class="h3 mb-3">Category</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Category</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="/category">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Category Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Add New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection