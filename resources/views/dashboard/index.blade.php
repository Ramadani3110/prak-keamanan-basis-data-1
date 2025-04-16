@extends("layout.master")

@section('content')
<h1 class="h3 mb-3">Dashboard</h1>

<div class="row">
    <div class="col d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Product</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">
                                {{$productCount}}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Category</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="tag"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{$categoryCount}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection