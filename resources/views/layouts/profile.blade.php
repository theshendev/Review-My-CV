@extends('layouts.app')
@section('title','پروفایل')
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

                @include('includes.image-upload')
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
@push('scripts')
    <script>
        $(document).ready(function(){
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
    });
</script>
@endpush