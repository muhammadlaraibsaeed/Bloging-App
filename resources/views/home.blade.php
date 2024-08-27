@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @forelse ($users as $user)
            <div class="col-12">
                <h1 class="mb-4">Author Name :- {{ $user->name }}</h1>
                <div class="container">
                    <div class="row">
                        @forelse ($user->posts as $post)
                            <div class="col-12 col-sm-6 col-md-3 col-lg-4 mb-4">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Title:-</strong>{{ $post->title }}</h5>
                                        <div id="carouselExample{{ $user->id }}{{ $post->id }}" class="carousel slide">
                                            <div class="carousel-inner">
                                                @foreach($post->images as $index => $image)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <img  src="{{ asset($image->url) }}" class="d-block w-100" alt="...">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $user->id }}{{ $post->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $user->id }}{{ $post->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>No posts available.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No users found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection