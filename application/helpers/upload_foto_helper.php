<?php 
    function save_foto($file_foto, $slug, $folderPath)
    {
        // $folderPath = './uploads/img/ptk/';

        $foto_parts = explode(";base64,", $file_foto);
        $format = explode("/", $foto_parts[0])[1]; //get format gambar
        $foto_base64 = base64_decode($foto_parts[1]);
        $file = $folderPath . $slug. '.'. $format;
        $foto = $slug. '.'. $format;

        if (!write_file($file,  $foto_base64)) {
            echo json_encode(["foto uploaded gagal."]);
        }
        return $foto;
    }
?>