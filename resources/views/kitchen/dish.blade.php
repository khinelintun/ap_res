@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                 <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a><h1 class="m-0">Kitchen Panel</h1>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        <div class="card-body">
                            <a href="/dish/create" class=" btn btn-outline-dark btn-sm" >Create</a>
                            <table id="dishes" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Dish Name</th>
                                    <th>Category Name</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                          @foreach($dishes as $dish)
                              <tr>
                                  <td>{{$dish->name}}</td>
                                  <td>{{$dish->category->name}}</td>
                                  <td>{{$dish->created_at}}</td>
                                  <td class="nav-link">
                                      <div class="form-row">
                                          <a style="height: 31px; margin-right: 10px" href="/dish/{{$dish->id}}/edit" class="btn btn-outline-dark btn-sm">Edit</a>
                                          <form action="/dish/{{$dish->id}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-dark btn-sm">Delete</button>
                                          </form>
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<script>
    $(function () {
        $('#dishes').DataTable({
            "paging": true,
            "pageLength": 6,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
