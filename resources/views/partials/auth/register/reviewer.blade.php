<div class="form-group">
    <label for="company"
           class="col-form-label text-md-right">سازمان</label>

    <div class="input-field">
        <input id="company" type="text"
               class="form-control @error('company') is-invalid @enderror"
               name="company" value="{{ old('company') }}" required
        >

        @error('company')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>
<div class="form-group">
    <label for="position"
           class="col-form-label text-md-right">موقعیت شغلی</label>

    <div class="input-field">
        <input id="position" type="text"
               class="form-control @error('position') is-invalid @enderror"
               name="position" value="{{ old('position') }}" required>

        @error('position')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>
@isset($p)
    <div class="form-group ">
        <label for="linkedin"
               class="col-form-label text-md-right">اکانت لینکدین</label>

        <div class="input-field  @error('linkedin') is-invalid @enderror">
            <div class="align-self-center pr-1 linkedin-url">
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