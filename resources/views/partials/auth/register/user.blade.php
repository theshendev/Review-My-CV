
<div class="form-group">
    <label for="cv"
           class="col-form-label text-md-right">رزومه</label>

    <div class="">
        <div class="file-drop-area">
            <span class="fake-btn">بارگذاری</span>
            <span class="file-msg">هیچ فایلی انتخاب نشده است.</span>
            <input class="file-input @error('cv') is-invalid @enderror" type="file" name="cv">
            @error('cv')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        {{--<input id="cv" type="file"--}}
        {{--class="form-control @error('cv') is-invalid @enderror"--}}
        {{--name="cv" required>--}}

    </div>

</div>
@isset($p)
    <div class="row">
        <div class="col-5 align-self-center pr-0">
            https://www.linkedin.com/in/
        </div>
        <div class="col-7">
            <input id="linkedin" type="text"
                   class="form-control @error('linkedin') is-invalid @enderror"
                   name="linkedin" value="{{ old('linkedin') }}" required
                   autocomplete="linkedin">

            @error('linkedin')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
@endisset