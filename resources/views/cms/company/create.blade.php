@extends('cms.parent')

@section('title', 'Company')

@section('main-title', 'Create Company')

@section('sub-title', 'create Company')

@section('styles')

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Data of Company</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>

                            <div class="card-body">


                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="name"> Name of Company</label>
                                        <input type="text" class="form-control" id="name" name="ame"
                                            placeholder="Enter First Name of Company">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="password"> password of Company</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter password of Company">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="des"> dies of Company</label>
                                        <input type="des" class="form-control" id="des" name="password"
                                            placeholder="Enter dies of Company">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="status"> Status</label>
                                    <select class="form-select form-select-sm" name="status" style="width: 100%;"
                                        id="status" aria-label=".form-select-sm example">
                                        <option value="active">Active </option>
                                        <option value="inactive">InActive </option>
                                    </select>
                                </div>



                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                                <a href="{{ route('company.index') }}" type="button" class="btn btn-info">Return Back</a>

                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->


                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('scripts')
    <script>
        function performStore() {

            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('status', document.getElementById('status').value);

            formData.append('des', document.getElementById('des').value);
            formData.append('email', document.getElementById('email').value);

            //   formData.append('role_id',document.getElementById('role_id').value);

            store('/cms/admin/admins', formData);
        }
    </script>
@endsection
