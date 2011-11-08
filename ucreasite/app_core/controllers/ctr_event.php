<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista */

   //require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
   require_once(__CLS_PATH . "cls_event.php");

   class ctr_Event {

   	private $eventdata;

       public function __construct()
	   {
			 $this->eventdata=new cls_Event();
	   }

	   public function get_eventdata($id_event)
	   {
			 return $this->eventdata->get_eventdata($id_event);
	   }

       public function get_lastevents($num_events)
	   {
			 return $this->eventdata->get_lastevents($num_events);
	   }

       public function get_eventfiles($id_event,$first)
	   {
			 return $this->eventdata->get_eventfiles($id_event,$first);
	   }

       public function get_lasteventfile()
	   {
			 return $this->eventdata->get_lasteventfile();
	   }

    }
	
?>