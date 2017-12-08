<?php

          class G_MYSQL {
          var $db_host;
          var $db_user;
          var $db_pass;
          var $db_name;
          var $db_connection;
          function G_MYSQL(){
              $this->db_host = "ap-cdbr-azure-southeast-b.cloudapp.net";
              $this->db_user = "b26366fb9f9e2a";
              $this->db_pass = "f0a52187";
              $this->db_name = "acsm_c3fa0cb86725a7f";
          }
          function G_Connect(){
            $this->db_connection =  mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            if($this->db_connection){
                //echo "complete";
            }else {
              echo "something is wrong";
            }
          }
          function set_char_utf8(){
              $cs1 = "SET character_set_results = utf8";
              $cs2 = "SET character_set_client = utf8";
              $cs3 = "SET character_set_connection = utf8";
              mysqli_query($this->db_connection,$cs1);
              mysqli_query($this->db_connection,$cs2);
              mysqli_query($this->db_connection,$cs3);
          }
          function G_Insert($arr,$tblName){
              $str = "INSERT INTO ".$tblName."(".implode(",",array_keys($arr)).")";
              //implode แทรกstring เข้าไปใน Array
              $str2 = " VALUES('".implode("','",$arr)."');";
              $sql = $str.$str2;
              $rs = mysqli_query($this->db_connection,$sql);
              return $rs;
          }
          //

          function G_Execute($sql){
              $rs = mysqli_query($this->db_connection,$sql);
              $array = array();
              while($row = mysqli_fetch_array($rs)){
                  array_push($array,$row);
              }

              return $array;
          }
          function G_ExecuteNonQuery($sql){
              $rs = mysqli_query($this->db_connection,$sql);
              return $rs;
          }
          function G_Close(){
              $rs = mysqli_close($this->db_connection);
              return $rs;
          }
        }

?>
