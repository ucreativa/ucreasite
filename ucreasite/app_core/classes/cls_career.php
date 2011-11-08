<?php

   require_once(__CLS_PATH . "cls_database.php");

	class cls_Career {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();
	   } 	

	   public function get_careerdata($id_career){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_careers.career_id AS id,
                                              				      tbl_careers.career_name AS name,
                                              					  tbl_careers.career_description AS description,
                                              					  tbl_careers.career_text AS text,
                                              					  tbl_careers.career_status AS status
                                              					  FROM tbl_careers
                                              					  WHERE tbl_careers.career_status = 'A'
                                                                  AND tbl_careers.career_id = ".$id_career);

			return $this->data_provide->sql_get_fetchassoc($result);
      }

      public function get_careers_by_area($id_area){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_careers.career_id AS id,
                                              				      tbl_careers.career_name AS name,
                                              					  tbl_careers.career_description AS description,
                                              					  tbl_careers.career_text AS text,
                                              					  tbl_careers.career_status AS status
                                              					  FROM tbl_careers
                                              					  WHERE tbl_careers.career_status = 'A'
                                                                  AND tbl_careers.area_fk = ".$id_area.
                                                                  " ORDER BY tbl_careers.career_name ASC");

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_careers(){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_careers.career_id AS id,
                                              				      tbl_careers.career_name AS name,
                                              					  tbl_careers.career_description AS description
                                              					  FROM tbl_careers
                                              					  WHERE tbl_careers.career_status = 'A'
                                                                  ORDER BY tbl_careers.career_name ASC");

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_careerfiles($id_career){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_files.file_id AS id,
                                              				      tbl_files.file_name AS filename,
                                              					  tbl_files.file_description AS description,
                                              					  tbl_files.file_author AS author,
                                              					  tbl_files.file_date AS date,
                                              					  tbl_files.file_type AS type,
                                              					  tbl_files.file_first AS first,
                                              					  tbl_files.file_status AS status
                                              					  FROM tbl_files,tbl_files_careers,tbl_careers
                                              					  WHERE tbl_files_careers.file_fk = tbl_files.file_id
                                                                  AND tbl_files.file_status = 'A'
                                                                  AND tbl_files_careers.career_fk = tbl_careers.career_id
                                                                  AND tbl_careers.career_id = ".$id_career.
                                                                  " ORDER BY tbl_files.file_first DESC,
                                                                  tbl_files.file_name ASC");

			return $this->data_provide->sql_get_rows($result);
      }

	}

?>