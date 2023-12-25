<?php
if($file = $_FILES['plant_img']){
  $path = __DIR__.'\sourses\plants';
  $subpath = explode(".", $file['name']);
  $fileExt = end($subpath);
  $filename = uniqid('plant_').'.'.$fileExt;

}
