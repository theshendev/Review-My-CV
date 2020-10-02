@extends('layouts.app')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.js" integrity="sha512-9pGiHYK23sqK5Zm0oF45sNBAX/JqbZEP7bSDHyt+nT3GddF+VFIcYNqREt0GDpmFVZI3LZ17Zu9nMMc9iktkCw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.css" integrity="sha512-w+u2vZqMNUVngx+0GVZYM21Qm093kAexjueWOv9e9nIeYJb1iEfiHC7Y+VvmP/tviQyA5IR32mwN/5hTEJx6Ng==" crossorigin="anonymous" />
@endsection
@section('content')
    <section class="profile text-white mt-5">

        <div class="container">
            @if(session('status'))
                <div class="alert alert-success text-right">
                    {{ session('status') }}
                </div>
            @endif
                <form action="{{route(Str::singular($user->getTable()).".update",$user)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="avatar-upload">
                <div class="avatar-edit">
                    <input class="@error('image') is-invalid @enderror" name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg"/>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="imageUpload"><span class="fal fa-plus"></span>
                    </label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url({{$user->image}});">
                    </div>
                    </div>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="crop-modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="crop-modal-title">Crop Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img src="" id="modal-image" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="modal-image-preview">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Crop</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row justify-content-center mt-5">
                <h3 class="profile-heading">پروفایل</h3>
            </div>

            <div class="profile-information">

                    <div class="form-group">
                        <label for="name"
                               class="col-form-label text-md-right full-circle-before">نام و نام خانوادگی</label>

                        <div class="input-field">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $user->name }}" required
                                   autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row no-gutters">
                        <div class="form-group col-md-6">
                            <label for="email"
                                   class="col-form-label text-md-right full-circle-before">ایمیل</label>
                            <div class="input-field">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $user->email }}" required
                                       autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="linkedin"
                                   class="col-form-label text-md-right full-circle-before">لینکدین</label>
                            <div class="input-field">
                                <input id="linkedin" type="text"
                                       class="form-control @error('linkedin') is-invalid @enderror"
                                       name="linkedin" value="{{ $user->linkedin }}" required
                                       autocomplete="linkedin">
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        @yield('fields')
                    <div class="form-group text-center">
                        <button class="btn btn-success">
                            ثبت تغییرات
                        </button>
                    </div>
            </div>
            </form>

        </div>

    </section>
@endsection
@section('scripts')
    $(document).ready(function(){
    let $modal = $('#crop-modal');
    let image = $('#modal-image');
    let cropper;
    let done = function(url){
        image.attr("src",url);
        $modal.modal('show');
    };

    let $fileInput = $('.file-input');
    let $droparea = $('.file-drop-area');

    // highlight drag area
    $fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
    });

    // back to normal state
    $fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
    });

    // change inner text
    $fileInput.on('change', function() {
    let filesCount = $(this)[0].files.length;
    let $textContainer = $(this).prev();

    if (filesCount === 1) {
    // if single file is selected, show file name
    let fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
    } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
    }
    });

    function readURL(input) {
    if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function(e) {
    done(reader.result);
    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
    $('#imagePreview').hide();
    $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
    }
    }
    $("#imageUpload").change(function() {
    readURL(this);
    });
    $modal.on('shown.bs.modal', function () {
        const image = document.getElementById('modal-image');
        cropper = new Cropper(image,{
                aspectRatio: 1,
                viewMode: 3,
                preview:'.modal-image-preview'
        });
    });
    });

@endsection