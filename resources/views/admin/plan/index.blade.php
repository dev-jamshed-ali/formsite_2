@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Plans</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Plans</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.plan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>No. Of Feature</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                    @foreach($data as $row)
                    @php
                        $i++;
                    @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$row->title}}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->plan_feature_count }}</td>
                            <td>
                                <a href="{{ URL::to('admin/plan/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('admin/plan/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
