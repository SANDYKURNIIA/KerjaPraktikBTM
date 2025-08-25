<script src="/resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/dist/js/jquery.qrcode.min.js"></script>
    <div id="output" style="display: none;"></div>

<script>
        jQuery(function() {
            jQuery('#output').qrcode("<?= $data['peserta']['noKartu'] ?>");

            // the lib generate a canvas under target, you should get that canvas, not #output
            // And put the code here would ensure that you can get the canvas, and canvas has the image.
            var canvas = document.querySelector("#output canvas");
            var img = canvas.toDataURL("image/png");
            $(canvas).on('click', function() {
                // Create an anchor, and set its href and download.
                var dl = document.createElement('a');
                dl.setAttribute('href', img);
                dl.setAttribute('download', 'qrcode.png');
                // simulate a click will start download the image, and name is qrcode.png.
                dl.click();
            });

            // Note this will overwrite any current content.
            $('#gambar').html('<img src="' + img + '" width="50px"/>');
        })
    </script>