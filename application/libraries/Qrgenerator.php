<<<<<<< HEAD
<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/qrcode/qrlib.php';

class Qrgenerator {

    public function generate($text = 'Hello World', $size = 4, $margin = 1)
    {
        ob_start();
        QRcode::png($text, null, QR_ECLEVEL_L, $size, $margin);
        $imageString = base64_encode(ob_get_contents());
        ob_end_clean();
        return 'data:image/png;base64,' . $imageString;
    }

    public function save($text = 'Hello World', $size = 4, $margin = 1, $outputPath = 'qrcode.png')
    {
        QRcode::png($text, $outputPath, QR_ECLEVEL_L, $size, $margin);
        return $outputPath;
    }
=======
<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/qrcode/qrlib.php';

class Qrgenerator {

    public function generate($text = 'Hello World', $size = 4, $margin = 1)
    {
        ob_start();
        QRcode::png($text, null, QR_ECLEVEL_L, $size, $margin);
        $imageString = base64_encode(ob_get_contents());
        ob_end_clean();
        return 'data:image/png;base64,' . $imageString;
    }

    public function save($text = 'Hello World', $size = 4, $margin = 1, $outputPath = 'qrcode.png')
    {
        QRcode::png($text, $outputPath, QR_ECLEVEL_L, $size, $margin);
        return $outputPath;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}