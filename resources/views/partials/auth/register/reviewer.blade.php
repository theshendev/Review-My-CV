<div class="form-group">
    <label for="company"
           class="col-form-label text-md-right">سازمان</label>

    <div class="">
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

    <div class="">
        <input id="position" type="text"
               class="form-control @error('position') is-invalid @enderror"
               name="position" value="{{ old('position') }}" required
        >

        @error('position')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
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