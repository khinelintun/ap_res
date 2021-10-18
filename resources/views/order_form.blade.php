<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Form</title>
    <!-- bootstarp 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="card-body">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <h3>Order Form</h3>
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">New Order</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Order Lists</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form action="{{route('order.submit')}}" method="post">
                            @csrf
                            <div class="row">
                                @foreach($dishes as $dish)
                                    <div class="col-sm-3">
                                        <div class="card">
                                           <div class="card-body">
                                               <img src= "{{url('/images/'. $dish->image)}}" width="100" alt=""><br><br>
                                               <label for="">{{$dish->name}}</label><br>
                                               <input type="number"  name="{{$dish->id}}" value="submit">
                                           </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <select name="Table">
                                    @foreach($tables as $table)
                                        <option class="form-control" value="{{$table->id}}">{{$table->number}}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <input type="submit" class="btn btn-outline-dark btn-sm">
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium deleniti deserunt doloribus esse et illo iste, maxime nobis nostrum porro praesentium quod quos reprehenderit, temporibus voluptate voluptates? In, ullam.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







    <!-- bootstrap 5 javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
