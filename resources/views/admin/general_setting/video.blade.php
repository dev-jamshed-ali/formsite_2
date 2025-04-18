@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Video</h1>

    <form action="{{ url('admin/setting/general/video/update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="current_video" value="{{ $general_setting->video }}">

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Existing Video</label>
                    <div>
                        <img src="{{ asset('public/uploads/'.$general_setting->video) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Video</label>
                    <div>
                        <input type="file" name="video">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection