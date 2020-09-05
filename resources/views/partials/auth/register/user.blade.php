
<div class="form-group">
    <label for="cv"
           class="col-form-label text-md-right">رزومه</label>

    <div class="input-field @error('cv') is-invalid @enderror">
        <div class="file-drop-area">
            <span class="fake-btn">بارگذاری</span>
            <span class="file-msg">هیچ فایلی انتخاب نشده است.</span>
            <input class="file-input @error('cv') is-invalid @enderror" type="file" name="cv" accept=".pdf,.docx">

        </div>
    </div>
    @error('cv')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror

</div>
@isset($p)
    <div class="form-group ">
        <label for="linkedin"
               class="col-form-label text-md-right">اکانت لینکدین</label>

        <div class="input-field  @error('linkedin') is-invalid @enderror">
            <div class="align-self-center pr-1">
                https://www.linkedin.com/in/
            </div>
            <div class="w-100">
                <input id="linkedin" type="text"
                       class="form-control @error('linkedin') is-invalid @enderror"
                       name="linkedin" value="{{ old('linkedin') }}" required
                       autocomplete="linkedin">
            </div>
        </div>

        @error('linkedin')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

@endisset