<?php 

mb_internal_encoding("UTF-8");


define("GW_MAXFILESIZE", "5000000");
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');


//функция загрузки файлов
function upload_file($file) {
  if ($file['name'] == '') {
    echo 'Файл не выбран!';
    return; 
  }

  //Проверяем расширения изображений, их размер и процесс копирования из временной директории
  $arr = explode(".", $file['name']);
  $ext = mb_strtolower($arr[count($arr)-1]);
  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  $img_name = htmlspecialchars(trim($file['name']));
  $thumb_name = 'thumb_' . $img_name;
  
  if (in_array($ext, $allowed)) {
    if ($file['size'] <= GW_MAXFILESIZE) {
      if (copy($file['tmp_name'], 'img/'.$img_name)) {
        echo 'Файл успешно загружен';
        img_resize('img/' . $img_name, 'thumbs/' . $thumb_name, '250', '150');


      } else { echo 'Ошибка загрузки файла'; return;} 
    } else {
      echo "Файл не должен превышать размер в 5 Мб!"; return; }
  } else {
    echo "Файл должен иметь одно из известных расширений графических изображений (gif, jpeg или png)!";
    return;
  }
}




  function img_resize($src, $dest, $width, $height, $rgb = 0xFFFFFF, $quality = 100)
    {
      if (!file_exists($src)) return false;

      $size = getimagesize($src);

      if ($size === false) return false;

     
      $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
      $icfunc = "imagecreatefrom" . $format;
      if (!function_exists($icfunc)) return false;

      $x_ratio = $width / $size[0];
      $y_ratio = $height / $size[1];

      $ratio       = min($x_ratio, $y_ratio);
      $use_x_ratio = ($x_ratio == $ratio);

      $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
      $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
      $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
      $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

      $isrc = $icfunc($src);
      $idest = imagecreatetruecolor($width, $height);

      imagefill($idest, 0, 0, $rgb);
      imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
        $new_width, $new_height, $size[0], $size[1]);

      imagejpeg($idest, $dest, $quality);

      imagedestroy($isrc);
      imagedestroy($idest);

      return true;

    }

?>