@extends('cms.parent')

@section('title' , ' Admin')

@section('main-title' , 'Index Admin')

@section('sub-title' , 'index Admin')

@section('styles')

@endsection

@section('content')
{{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title"> Index Data of Admin</h3> --}}
                <a href="{{ route('admins.create') }}" type="button" class="btn btn-info">Add New Admin</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>Gender</th>
                      <th>City</th>
                      <th>Seeting</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                    <tr>
                        <td>{{$admin->id}}</td>

                        <td>
                          <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image ?? "")}}" width="60" height="60" alt="User Image">
                       </td>
                        <td>{{$admin->user->first_name .' '. $admin->user->last_name  }}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->user->mobile ?? ""}}</td>
                        <td>{{$admin->user->status ?? ""}}</td>
{{--
                        <td>
                            <div class="form-group row">
                                <div class="col-3">
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" class="toggle-switch" data-toggle="toggle"
                                                data-on="yes" data-off="no" id="{{ $admin->id }}"
                                                @if ($admin->user->status == 'active') checked="checked" value="active" @else value="inactive" @endif>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </td> --}}

                        <td>{{$admin->user->gender ?? ""}}</td>
                        <td><span class="badge bg-info">({{$admin->user->city->name ?? ""}})</td>

                        <td>
                            <div class="btn group">
                              {{-- <a href="{{route('admins.edit' , $admin->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                              </a> --}}
                              <a href="#" type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                              </a>

                            </div>
                          </td>

                        <td></td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{ $admins->links()}}
          </div>
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('scripts')
  <script>
    function performDestroy(id , referance){
      let url = '/cms/admin/admins/'+id;
      confirmDestroy(url , referance );
    }
</script>
{{--
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("input.toggle-switch").change(function() {
        var id = $(this).attr('id');
        var unit_toggle_value = $(this).attr('value');
        if (unit_toggle_value == "active") {
            unit_toggle_value = "inactive";
        } else {
            unit_toggle_value = 'active';
        }
        $.ajax({
            // url: "{{ route('admins.status') }}",
            type: "POST",
            cache: false,
            data: {
                id: id,
                unit_toggle_value: unit_toggle_value,
            },
            dataType: "json",
            success: function(response) {

            }
        });
    });
</script> --}}

@endsection
