<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

/**
 * CodeIgniter Tanggalku Libraly
 *
 * @package CodeIgniter
 * @author  Ofani Dariyan <ofanidariyan@hotmail.com>
 */

class Barcode
{
   
    public function __construct()
    {
        $this->_ci = & get_instance();

    }

    public function barcode_data($sparepart_code, $scale=6, $fontsize=50, $thickness=30,$dpi=72) {
    // CREATE BARCODE GENERATOR
    // Including all required classes
    require_once( APPPATH . 'libraries/barcodegen/class/BCGFontFile.php');
    require_once( APPPATH . 'libraries/barcodegen/class/BCGColor.php');
    require_once( APPPATH . 'libraries/barcodegen/class/BCGDrawing.php');

    // Including the barcode technology
    // Ini bisa diganti-ganti mau yang 39, ato 128, dll, liat di folder barcodegen
    require_once( APPPATH . 'libraries/barcodegen/class/BCGcode128.barcode.php');

    // Loading Font
    // kalo mau ganti font, jangan lupa tambahin dulu ke folder font, baru loadnya di sini
    $font = new BCGFontFile(APPPATH . 'libraries/barcodegen/font/Arial.ttf', $fontsize);
    
    // Text apa yang mau dijadiin barcode, biasanya kode produk
    $text = $sparepart_code;

    // The arguments are R, G, B for color.
    $color_black = new BCGColor(0, 0, 0);
    $color_white = new BCGColor(255, 255, 255);

    $drawException = null;
    try {
        $code = new BCGcode128(); // kalo pake yg code39, klo yg lain mesti disesuaikan
        $code->setScale($scale); // Resolution
        $code->setThickness($thickness); // Thickness
        $code->setForegroundColor($color_black); // Color of bars
        $code->setBackgroundColor($color_white); // Color of spaces
        $code->setFont($font); // Font (or 0)
        $code->parse($text); // Text
    } catch(Exception $exception) {
        $drawException = $exception;
    }

    /* Here is the list of the arguments
    1 - Filename (empty : display on screen)
    2 - Background color */
    $drawing = new BCGDrawing('', $color_white);
    if($drawException) {
        $drawing->drawException($drawException);
    } else {
        $drawing->setDPI($dpi);
        $drawing->setBarcode($code);
        $drawing->draw();
    }
    // ini cuma labeling dari sisi aplikasi saya, penamaan file menjadi png barcode.
    $filename_img_barcode = $sparepart_code.'.png';
    // folder untuk menyimpan barcode
    $drawing->setFilename( FCPATH .'raport_files/barcode/'. $filename_img_barcode);
    // proses penyimpanan barcode hasil generate
    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);

    return $filename_img_barcode;
}
   

   
}
