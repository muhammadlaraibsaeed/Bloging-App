@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @forelse ($users as $user)
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        @forelse ($user->posts as $post)
                            <div class="col-12 col-sm-6 col-md-3 col-lg-4 mb-4">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Title:-</strong>{{ $post->title }}</h5>
                                        <h6>  Author Name :- {{ $user->name }}</h6>
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
                                    @php
                                        $classes = (auth()->check() && auth()->user()->id === optional($post->like)->user_id) ? 'text-primary' : ' text-Info';
                                    @endphp
                                    <div  class="text-center">
                                            <svg data-post-id="{{$post->id}}" style="width: 30px;cursor: pointer;"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6  {{$classes}}">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                            </svg>
                                       
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

@section('javaScript')
    <script>
        $(document).ready(function() {
    $('.size-6').on('click', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var dataAttributes = $(this).attr("data-post-id");
        var formData ={post_id: $(this).attr("data-post-id")};
        let currentClass = $(".size-6").index(this);
        $.ajax({
            url: "{{ route('store.like') }}", // URL of your backend endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                    $(".size-6").eq(currentClass).addClass('text-primary');
                // Handle success response
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // Handle error response
            }
        });
    });
});

    </script>
@endsection