@extends('layouts.profile')
@section('fields')

    <div class="form-group">
        <label for="cv"
               class="col-form-label text-md-right">رزومه</label>

        <div class="input-field">
            <div class="file-drop-area">
                <span class="fake-btn">بارگذاری</span>
                <span class="file-msg">{{$user->cv}}</span>
                <input class="file-input @error('cv') is-invalid @enderror" type="file" name="cv"
                       accept=".pdf,.docx">
                @error('cv')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <a href="{{asset("users_cv/$user->cv")}}" class="cv-download" style="z-index: 22">
                    <span class="fa fa-download"></span>
                </a>
            </div>

        </div>

    </div>
@endsection