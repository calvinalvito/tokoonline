<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Laravel Dev</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/assets/images/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mentor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Business</a>
                    </li>
                </ul>
                <div class="d-flex user-logged">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, {{Auth::user()->name}}!
                            @if (Auth::user()->avatar)
                            <img src="{{Auth::user()->avatar}}" class="user-photo" alt="" style="border-radius: 50%">
                            @else
                            <img src="https://ui-avatars.com/api/?name=Admin" class="user-photo" alt="" style="border-radius: 50%">
                            @endif
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto">
                                <li>
                                    <a href="{{route('dashboard')}}" class="dropdown-item">My Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </li>
                            </ul>
                        </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="dashboard my-5">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Data</th>
                                    <th>Paid Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{$checkout->User->name}}</td>
                                        <td>{{$checkout->Camp->title}}</td>
                                        <td>{{$checkout->Camp->price}}k</td>
                                        <td>{{$checkout->created_at->format('M d Y')}}</td>
                                        <td>
                                            @if ($checkout->is_paid)
                                                <span class="badge bg-success">Paid</span>
                                            @else 
                                                <span class="badge bg-warning">Waiting</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!@$checkout->is_paid)
                                                <form action="{{route('admin.checkout.update', $checkout->id)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm">Set to paid</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No camps registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>

</body>

</html>