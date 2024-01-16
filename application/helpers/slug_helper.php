<?php 
function slugify($text){
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
 
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
 
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
 
  // trim
  $text = trim($text, '-');
 
  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);
 
  // lowercase
  $text = strtolower($text).'-'.randomString();
   
  return $text;
}

function randomString()
{
  $length = 5;
  $str        = "";
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
  $max        = strlen($characters) - 1;
  for ($i = 0; $i < $length; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  return $str;
}
?>