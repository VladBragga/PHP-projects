<?php
// связь с бд
      include "connect.php";
  class fun{
     
function get_pedal_id($id_p){
         global $link;

      $products = mysqli_query($link, "SELECT * FROM `pedal` WHERE p_id=$id_p");
      foreach ($products as $pedal_id);
      return $pedal_id;
   }
   //получение всех данных из табл.комбики
function get_combo_id($id_c){
   global $link;

   $combs = mysqli_query($link, "SELECT * FROM `combo` WHERE c_id=$id_c");
   foreach ($combs as $comb);
   return $comb; 
} 
//получение всех данных из табл. гитары
function get_gitar(){
    global $link;

    $results = mysqli_query($link, "SELECT * FROM `guitar`");
    $gitar  = mysqli_fetch_all($results, MYSQLI_ASSOC);
    return $gitar;
}

function get_combik(){
   global $link;

   $results = mysqli_query($link, "SELECT * FROM `combo`");
   $combik  = mysqli_fetch_all($results, MYSQLI_ASSOC);
   return $combik;
}
function get_ped(){
   global $link;

   $results = mysqli_query($link, "SELECT * FROM `pedal`");
   $pedal  = mysqli_fetch_all($results, MYSQLI_ASSOC);
   return $pedal;
}
//получение всех данных из табл. vary
function get_varies(){
   global $link;

   $results = mysqli_query($link, "SELECT * FROM `vary`");
   $varies  = mysqli_fetch_all($results, MYSQLI_ASSOC);
   return $varies;
}
//получение id данных из табл. гитары
function get_gitar_id($id_g){
   global $link;

   $gitara_ids = mysqli_query($link, "SELECT * FROM `guitar` WHERE g_id=$id_g");
   foreach ($gitara_ids as $gitara_id);
   return $gitara_id;
}
 //получение всех данных из табл. виды гитары
 function get_vary($id){
    global $link;
    
    $vars = mysqli_query($link, "SELECT * FROM `vary` WHERE id_vid=$id");
    foreach ($vars as $var);
    return $var; 
 }
 //получение всех данных из табл. материал
 function get_material($id){
   global $link;

   $materials = mysqli_query($link, "SELECT * FROM `material` WHERE id_material=$id");
   foreach ($materials as $material);
   return $material; 
}
//получение всех данных из табл. материал
function get_target($id){
   global $link;

   $targets = mysqli_query($link, "SELECT * FROM `target` WHERE t_id=$id");
   foreach ($targets as $target);
   return $target; 
}
function get_type_combo($id){
   global $link;

   $types = mysqli_query($link, "SELECT * FROM `type_combo` WHERE type_id=$id");
   foreach ($types as $type);
   return $type; 
}
}
 ?>