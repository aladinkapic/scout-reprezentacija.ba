$(document).ready(function () {
    let cropperURI = '/system/users/change-profile-image';
    let club = false;

    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e){
        if($(this).hasClass('club_image')) {
            cropperURI = '/system/additional/clubs/update-image';
            club = $("#club_image_id").val();
        }

        var files = e.target.files;

        console.log(files);
        var done = function (url) {
            console.log(url);
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function () {
        $('.modal-content').css('max-height',$( window ).height()*0.8);
        $('.modal-content img').css('max-height',(($( window ).height()*0.8)-86));


        cropper = new Cropper(image, {
            // aspectRatio: 1,
            // viewMode: 5,
            preview: '.preview',

            // aspectRatio: 16 / 9,
            dragMode: 'move',
            viewMode: 1,
            aspectRatio: 1
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 320,
            height: 320,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: cropperURI,
                    data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data, 'club' : club},
                    success: function(data){
                        if(data['code'] === '0000') location.reload();
                        else alert("Desila se greška, pokušajte ponovo!");
                    }
                });
            }
        });
    })
});
