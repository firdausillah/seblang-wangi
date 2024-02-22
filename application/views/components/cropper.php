<!-- Modal Upload Gambar -->
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUploadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop image</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <!--  default image where we will set the src via jquery-->
                            <img class="cropper" id="foto">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="crop">Potong</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="<?= base_url() ?>assets/js/cropper.js"></script>

<script>
    var bs_modal = $('#modalUpload');
    var foto = document.getElementById('foto');
    var cropper, reader, file;
    var aspect = <?= @$aspect ? @$aspect : '1/1' ?>;

    // var image_w = (<?= @$size['w'] ?> ? <?= @$size['w'] ?> : '500');
    // var image_h = (<?= @$size['h'] ?> ? <?= @$size['h'] ?> : '500');

    $("body").on("change", ".foto", function(e) {
        var files = e.target.files;
        var done = function(url) {
            foto.src = url;
            bs_modal.modal('show');
        };


        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(foto, {
            aspectRatio: aspect,
            viewMode: 3,
            preview: '.preview'
        });

    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 500,
            height: 500,
        });

        canv = cropper.getCroppedCanvas();

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $("#file_foto").val(base64data);
                bs_modal.modal('hide');
            };
        });
    });
</script>