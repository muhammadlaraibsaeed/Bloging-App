@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Post Management </h1>
        <form id="uploadForm" enctype="multipart/form-data" class="form-group">
            <input type="text" id="title" name="title" multiple class="form-control mb-3" placeholder=" Post Title" title="Select one or more files to upload">

            <div class="form-group">
                <input type="file" id="files" name="files[]" multiple class="form-control mb-3" title="Select one or more files to upload">
            </div>
            <button type="submit" class="btn btn-primary bt-5" title="Click to upload the selected files">Upload Files</button>
        </form>
    </div>
@endsection


@section('javaScript')
    <script>
        $(document).ready(function() {
    $('#uploadForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this); // Create a FormData object from the form

        $.ajax({
            url: "{{ route('post.store') }}", // URL of your backend endpoint
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from automatically processing the data
            contentType: false, // Prevent jQuery from automatically setting content type
            success: function(response) {
                console.log('Success:', response);
                // Handle success response
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // Handle error response
            }
        });
    });
});

        // $(document).ready(function () {
        //     $("#submit-report").click(function (e) {
        //         e.preventDefault();

        //         var form = $('#myForm');
                
        //         var formData = new FormData($('#myForm'));

        //         var state = $('#btn-save').val();
        //         var type = "POST";
        //         var ajaxurl = "{{ route('post.store') }}";

        //         $.ajax({
        //             type: type,
        //             url: ajaxurl,
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(data) {
        //                 toaster_on(data.message);
        //                 const myTimeout = setTimeout(toaster_off,1500);
        //                 $("#myForm").trigger("reset");
        //                 $('.error-tag').addClass('d-none');
        //             },

        //             error: function(data) {
        //                 $(".error-tag").addClass("d-none");
        //                 $.each(data.responseJSON, function(key, value) {
        //                 $('.'+ key).removeClass("d-none").empty().html(value[0]);
        //                 });
        //             }
        //         });
        //     });
        // });
    </script>
@endsection