<?php

class Load {
   function view( $file_name, $data = null )
   {
      if( is_array($data) ) {
         extract($data);
      }

      $u = new users();
      
      include 'views/' . $file_name;
   }
}
