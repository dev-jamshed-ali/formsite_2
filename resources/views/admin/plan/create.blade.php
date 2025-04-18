@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Plan</h1>

    <form action="{{ route('admin.plan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Plan</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.plan.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus
                                required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Stripe Payment Link *</label>
                            <input type="text" name="stripe_link" class="form-control" value="{{ old('stripe_link') }}" autofocus
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Price *</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="any" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Select Status *</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="">Description *</label>
                    <textarea name="description" class="form-control editor" cols="30" rows="10" required>{{ old('description') }}</textarea>
                </div>

            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Features</h6>
            </div>
            <div class="card-body">

                <div id="row">
                    <div class="input-group m-3">
                        <div class="input-group-prepend">
                            <button id="rowAdder" type="button" class="btn btn-dark" style="border-radius: 5px;">
                                <span class="bi bi-plus-square-dotted">
                                </span> ADD
                            </button>
                        </div>
                        <div class="col-6">
                            <input type="text" name="feature[]" class="form-control m-input" required>
                        </div>
                    </div>
                </div>


                <div id="newinput"></div>

                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $("#rowAdder").click(function() {
            newRowAdd = `<div id="row"> <div class="input-group m-3">
                <div class="input-group-prepend">
                <button class="btn btn-danger" id="DeleteRow" type="button" style="border-radius: 5px;">
                <i class="bi bi-trash"></i> Delete</button> </div>
                <div class="col-6">

                <input type="text" name="feature[]" class="form-control m-input" required> 
                </div> 
                </div> 
                </div>`;

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>
@endsection
