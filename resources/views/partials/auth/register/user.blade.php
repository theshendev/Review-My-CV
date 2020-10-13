@include('includes.cv-upload')
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