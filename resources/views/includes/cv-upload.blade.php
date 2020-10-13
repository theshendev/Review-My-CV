@push('scripts')
    <script>
        $(document).ready(function () {

            let $fileInput = $('.file-input');
            let $droparea = $('.file-drop-area');

            // highlight drag area
            $fileInput.on('dragenter focus click', function () {
                $droparea.addClass('is-active');
            });

            // back to normal state
            $fileInput.on('dragleave blur drop', function () {
                $droparea.removeClass('is-active');
            });

            // change inner text
            $fileInput.on('change', function () {
                var filesCount = $(this)[0].files.length;
                var $textContainer = $(this).prev();

                if (filesCount === 1) {
                    // if single file is selected, show file name
                    var fileName = $(this).val().split('\\').pop();
                    $textContainer.text(fileName);
                } else {
                    // otherwise show number of files
                    $textContainer.text(filesCount + ' files selected');
                }
            });
        });
    </script>
@endpush

<div class="form-group">
    <label for="cv"
           class="col-form-label text-md-right">رزومه</label>

    <div class="input-field @error('cv') is-invalid @enderror">
        <div class="file-drop-area">
            <span class="fake-btn">بارگذاری</span>
            <span class="file-msg">
                {{$user->cv ??
                'فایلی انتخاب نشده است.'
            }}
            </span>
            <input class="file-input @error('cv') is-invalid @enderror" type="file" name="cv" accept=".pdf,.docx">
            @isset($user)
                <a href="{{asset("users_cv/$user->cv")}}" class="cv-download" style="z-index: 22">
                    <span class="fa fa-download"></span>
                </a>
            @endisset
        </div>
    </div>
    <span class="@error('cv') {{Str::contains($message,'5') ? 'd-none' :'' }}@enderror text-center" dir="rtl"><small>حداکثر حجم رزومه ۵ مگابایت می باشد.
    </small>
    </span>
    @error('cv')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror

</div>