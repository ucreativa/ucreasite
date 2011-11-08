<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista */

   //require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
   require_once(__CLS_PATH . "cls_link.php");

   class ctr_Link {

   	private $linkdata;

       public function __construct()
	   {
			 $this->linkdata=new cls_Link();
	   }

	   public function get_linkdata()
	   {
			 return $this->linkdata->get_linkdata();
	   }

    }
	
?>