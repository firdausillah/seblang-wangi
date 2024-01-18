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

    // function save_file($file,$slug, $folderPath)
    // {
    //     if (!empty($file)) { // $_FILES untuk mengambil data logo
    //         $cfg = [
    //             'upload_path' => $folderPath,
    //             // 'allowed_types' => 'png|jpg|gif|jpeg',
    //             'file_name' => $slug,
    //             'overwrite' => (empty($file) ? FALSE : TRUE),
    //             // 'max_size' => '2028',
    //         ];
    //         // if (!empty($logo)) $cfg['file_name'] = $kode;
    //         // print_r($cfg); exit();
    //         $this->load->library('upload', $cfg);

    //         if ($this->upload->do_upload('sk')) {
    //             $file_name = $this->upload->data('file_name');
    //         } else {
    //             exit('Error : ' . $this->upload->display_errors());
    //         }
    //     }
    // }


?>