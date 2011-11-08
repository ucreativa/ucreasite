<?php

   require_once( __CLS_PATH . "cls_database.php");

	class cls_Link {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();
	   }

	   public function get_linkdata(){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_links.link_id AS id,
                                              					  tbl_links.link_name AS name,
                                              					  tbl_links.link_url AS url,
                                              					  tbl_links.link_image AS image,
                                              					  tbl_links.link_description AS description,
                                              					  tbl_links.link_status AS status
                                              					  FROM tbl_links");

			return $this->data_provide->sql_get_rows($result);
      }

	}
	
?>