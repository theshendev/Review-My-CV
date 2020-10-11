@section('head')
    <script src="{{asset('js/cropper.min.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('css/cropper.min.css')}}" />
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            let modal = $('#crop-modal');
            let image = $('#modal-image');
            let preview = $('#imagePreview');
            let cropper;
            let done = function (url) {
                image.attr("src", url);
                modal.modal('show');
            };

            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imageUpload").change(function () {
                readURL(this);
            });
            modal.on('shown.bs.modal', function () {
                const image = document.getElementById('modal-image');
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    responsive: true
                });

            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });
            $('#crop').click(function () {
                canvas = cropper.getCroppedCanvas();
                let reader = new FileReader();
                reader.onload = function (e) {
                    preview.css('background-image', 'url(' + e.target.result + ')');
                    preview.hide();
                    preview.fadeIn(650);
                };
                canvas.toBlob(function (blob) {
                    url = URL.createObjectURL(blob);

                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        let base64data = reader.result;
                        $('#image_base64').val(base64data);
                        modal.modal('hide');
                    }
                });
            });
        });
    </script>
@endpush
<div class="avatar-upload @error('image') is-invalid @enderror">
    <div class="avatar-edit">
        <input class="@error('image') is-invalid @enderror" name="image" type='file' id="imageUpload"
               accept=".png, .jpg, .jpeg"/>
        <input type="text" id="image_base64" name="image_base64">
        <label for="imageUpload"><span class="fal fa-plus"></span>
        </label>
    </div>
    <div class="avatar-preview @if(!isset($user)) border-0 @endif">
        <div id="imagePreview" style="background-image: @isset($user) url('{{$user->image}}') @else url('{{asset('images/register/upload-bg.svg')}}') @endisset;">
        </div>
    </div>
</div>
@error('image')
<span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
@enderror
<!-- Modal -->
<div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" data-backdrop="static" dir="ltr">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="crop-modal-title">Crop Image</h5>
                <button type="button" class="close align-self-center" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <img src="" id="modal-image" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="crop" type="button" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>