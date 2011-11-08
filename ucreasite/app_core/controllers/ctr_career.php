<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista */

   //require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
   require_once(__CLS_PATH . "cls_career.php");

   class ctr_Career {

   	private $careerdata;

       public function __construct()
	   {
			 $this->careerdata=new cls_Career();
	   }

	   public function get_careerdata($id_career)
	   {
			 return $this->careerdata->get_careerdata($id_career);
	   }

       public function get_careers_by_area($id_area)
	   {
			 return $this->careerdata->get_careers_by_area($id_area);
	   }

       public function get_careers()
	   {
			 return $this->careerdata->get_careers();
	   }

       public function get_careerfiles($id_career)
	   {
			 return $this->careerdata->get_careerfiles($id_career);
	   }

    }
	
?>