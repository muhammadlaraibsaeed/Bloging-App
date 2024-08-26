@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Left side: 8 columns -->
            <div class="p-3 border bg-light">
                Fetch all users who have at least one post. Retrieve a maximum of 5 posts per user.
                <div class="container mt-5">
                    <h2>All Users Posts</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>Post Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>JohnDoe</td>
                                <td>Administrator</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>JaneSmith</td>
                                <td>Editor</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>SamBrown</td>
                                <td>Subscriber</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- <div class="">
                <div>
                    <h1>Hello World</h1>
                </div>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1000/102" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1000/101" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div>
                    <i class="bi bi-hand-thumbs-up"></i>
                </div>
            </div> -->
        </div>
        <div class="col-md-4">
            <!-- Right side: 4 columns -->
            <div class="p-3 border bg-light">
                <h4>Recent Posts</h4>
                <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong>1kajs</strong><br>
                            <small>Created at: 12:19201</small>
                        </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection


