
<div class="form-group row">
    <label for="cv"
           class="col-md-4 col-form-label text-md-right">{{ __('Upload CV') }}</label>

    <div class="col-md-6">
        <div class="file-drop-area">
            <span class="fake-btn">بارگذاری</span>
            <span class="file-msg">هیچ فایلی انتخاب نشده است.</span>
            <input class="file-input" type="file" name="cv">
        </div>
        {{--<input id="cv" type="file"--}}
        {{--class="form-control @error('cv') is-invalid @enderror"--}}
        {{--name="cv" required>--}}
        @error('cv')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>
@isset($p)
    <div class="form-group row">
        <label for="phone"
               class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text"
                   class="form-control @error('phone') is-invalid @enderror"
                   name="phone" value="{{ old('phone') }}" required
                   autocomplete="phone">

            @error('phone')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
@endisset