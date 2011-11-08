<?php

   require_once(__CLS_PATH . "cls_database.php");

	class cls_Event {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();
	   } 	

	   public function get_eventdata($id_event){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_events.event_id AS id,
                                              				      tbl_events.event_title AS title,
                                              					  tbl_events.event_description AS description,
                                              					  tbl_events.event_url AS url,
                                                                  DATE_FORMAT(tbl_events.event_created, '%d/%m/%Y') AS created,
                                              					  tbl_events.event_status AS status
                                              					  FROM tbl_events
                                              					  WHERE tbl_events.event_status = 'A'
                                                                  AND tbl_events.event_id = ".$id_event);

			return $this->data_provide->sql_get_fetchassoc($result);
      }

      public function get_lastevents($num_events){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_events.event_id AS id,
                                                                  tbl_events.event_title AS title,
                                                                  tbl_events.event_description AS description,
                                                                  tbl_events.event_url AS url,
                                                                  DATE_FORMAT(tbl_events.event_created, '%d/%m/%Y') AS created,
                                                                  tbl_events.event_status AS status
                                                                  FROM tbl_events
                                                                  WHERE tbl_events.event_status = 'A'
                                                                  ORDER BY tbl_events.event_created DESC
                                                                  LIMIT ".$num_events);

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_eventfiles($id_event,$first){

            $first_stm="";
            if($first){
               $first_stm=" AND tbl_files.file_first = 'Y'";
            }

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_files.file_id AS id,
                                              				      tbl_files.file_name AS filename,
                                              					  tbl_files.file_description AS description,
                                              					  tbl_files.file_author AS author,
                                              					  tbl_files.file_date AS date,
                                              					  tbl_files.file_type AS type,
                                              					  tbl_files.file_first AS first,
                                              					  tbl_files.file_status AS status
                                              					  FROM tbl_files,tbl_files_events,tbl_events
                                              					  WHERE tbl_files_events.file_fk = tbl_files.file_id
                                                                  AND tbl_files.file_status = 'A'
                                                                  AND tbl_files_events.event_fk = tbl_events.event_id
                                                                  AND tbl_events.event_id = ".$id_event . $first_stm .
                                                                  " ORDER BY tbl_files.file_first DESC");

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_lasteventfile(){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_events.event_id AS id,
                                                           tbl_events.event_status AS status,
                                                           tbl_files.file_id AS id_file,
                                              			   tbl_files.file_name AS filename,
                                              			   tbl_files.file_description AS description
                                                           FROM tbl_events, tbl_files, tbl_files_events
                                                           WHERE tbl_events.event_status = 'A'
                                                           AND tbl_files.file_status = 'A'
                                                           AND tbl_files_events.event_fk = tbl_events.event_id
                                                           AND tbl_files_events.file_fk = tbl_files.file_id
                                                           AND tbl_files.file_first = 'Y'
                                                           ORDER BY tbl_events.event_created DESC
                                                           LIMIT 1");

			return $this->data_provide->sql_get_fetchassoc($result);
      }

	}
	
?>