@extends('layouts.profile')
@section('fields')
    <div class="form-row no-gutters">
        <div class="form-group col-md-6">
            <label for="company"
                   class="col-form-label text-md-right full-circle-before">سازمان</label>
            <div class="input-field">
                <input id="company" type="text"
                       class="form-control @error('company') is-invalid @enderror"
                       name="company" value="{{ $user->company }}" required
                       autocomplete="company">
                @error('company')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="position"
                   class="col-form-label text-md-right full-circle-before">موقعیت شغلی</label>
            <div class="input-field">
                <input id="position" type="text"
                       class="form-control @error('position') is-invalid @enderror"
                       name="position" value="{{ $user->position }}" required
                       autocomplete="position">
                @error('position')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(".switch input").click(function(){
            if (this.checked){
                $.ajax({
                    type: "POST",
                    url: "{{route('reviewer.available')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        alert("در دسترس قرار گرفتید.");
                    },
                    error: function () {
                        alert("مشکلی پیش آمد، دوباره امتحان کنید.");
                    },
                });
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "{{route('reviewer.not.available')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        alert("از دسترس خارج شدید.");
                    },
                    error: function () {
                        alert("مشکلی پیش آمد، دوباره امتحان کنید.");
                    },
                });
            }
        });
    </script>
@endpush