<?php
function UploadImage($fupload_name){
  $vdir_upload = "../../../foto_produk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 129;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "small_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "small_" . $fupload_name);
      }
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

?>