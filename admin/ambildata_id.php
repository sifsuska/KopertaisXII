<?php
include "koneksi.php";
$Q = mysql_query("SELECT * FROM data_ptais where id_ptais=".$id)or die(mysql_error());
if($Q){
 $posts = array();
      if(mysql_num_rows($Q))
      {
             while($post = mysql_fetch_assoc($Q)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));             
}

// $R = mysql_query("SELECT a.*, b.* FROM data_ps a left join data_ptais b on a.id_ptais=b.id_ptais where a.id_ptais=".$id)or die(mysql_error());
// if($R){
//  $posts = array();
//       if(mysql_num_rows($R))
//       {
//              while($post = mysql_fetch_assoc($R)){
//                      $posts[] = $post;
//              }
//       }  
//       $dataps = json_encode(array('results'=>$posts));             
// }



?>