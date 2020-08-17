<div class="form-group">
    <label for="company"
           class="col-form-label text-md-right">{{ __('Company') }}</label>

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
           class="col-form-label text-md-right">{{ __('Position') }}</label>

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
    <div class="form-group">
        <label for="phone"
               class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

        <div class="">
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