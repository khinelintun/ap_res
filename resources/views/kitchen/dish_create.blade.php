@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a><h1 class="m-0">Kitchen Panel</h1>
                </div>
            </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="float-right">
                                    <a href="/dish" class="btn btn-outline-dark btn-sm">Back</a>
                                </div>
                                    <h3 class="card-title">Create a delicious dish</h3>
                            </div>
                            <div class="card-body">
                            <form action="/dish" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Image</label><br>
                                    <input type="file" name="dish_image">
                                </div>
                                <button class="btn btn-outline-dark btn-sm">Submit</button>
                            </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

