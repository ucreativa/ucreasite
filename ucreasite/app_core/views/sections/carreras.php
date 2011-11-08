<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_sections[2];
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('" . $section_data['name'] . "');</script>";
    $document_files=array(); //Almacena los nombres de archivos correspondientes a documentos.
?>

<script>
  // Set up Sliders
  // **************
  $(function(){
    $('#section_slider').anythingSlider({resizeContents: false, autoPlay:true,// If true, solitary images/objects in the panel will expand to fit the viewport
      navigationFormatter : function(index, panel){ // Format navigation labels with text
     }});
  });
</script>

       <div id="banner">
        	<!-- AnythingSlider -->
			<ul id="section_slider">
                <?php
                    $i=0;
                    $j=0; //contador de documentos
                    foreach($section_files as $value){

                      if($value[5]=="image/jpg" || $value[5]=="image/png"){
                        $src=__RSC_FLE_HOST_PATH . "sections/section_".$section_key."/" . $value[1];
                        $size=getimagesize($src);
                        $tam=" width='".$size[0]."' height='".$size[1] ."'";

                        echo "<li class='panel'>"
                                 . cls_HTML::html_img_tag($src, "", "section_banner", $value[2], $tam) .
                             "</li>";
                        $i++;
                      }else{
                        $document_files[0][$j]=$value[1];
                        $document_files[1][$j]=$value[2];
                        $j++;
                      }
                    }
                ?>
			</ul>
			<!-- END AnythingSlider  -->
       </div>

	    <div class="section_tab">
             <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title"><?php echo $section_data['title']; ?></p></div>
             <div title="open" class="content_tab">
                 <div id="file_box"><span id="label_filebox"><?php echo $array_global_settings['download_label']; ?></span>
                   <?php
                   $x=0;
                   foreach($document_files as $value){
                      echo cls_HTML::html_link_tag("[+]", "", "link_files", __RSC_FLE_HOST_PATH . "sections/section_".$section_key."/" . $document_files[0][$x], "", $document_files[1][$x], "") . "<span class='section_text'>". $document_files[1][$x] ."</span><br/>";
                      $x++;
                   }

                   ?>
                 </div>
                 <span class="section_text" id="section_text"><br/></span>
                 <div id="sections_blocks">
                     <div id="sections_content_box">
                            <?php
                                require_once(__CTR_PATH . "ctr_area.php");
                                require_once(__CTR_PATH . "ctr_career.php");

                                $area_core=new ctr_Area();
                                $area_data=$area_core->get_areas();

                                $i=1;
                                foreach($area_data as $value){
                                   $career_core=new ctr_Career();
                                   $career_data=$career_core->get_careers_by_area($value[0]);

                                   $careers="";
                                   $j=0;
                                   foreach($career_data as $data){
                                      $careers.="<span><a class='link_careers' href='?s=".$section_key."&idc=".$data[0]."'>[+]&nbsp;&nbsp;&nbsp;</span></a>".$data[1]."<br/>";
                                      $j++;
                                   }

                                   echo "<div class='section_block'>
                             				<div class='icon_section_tab' id='icon_tab_".$i."' onclick=\"openclose_tabs(this,".$i.",'".__IMG_PATH."');\">
                                              <span class='section_title'>".$value[1]."</span>
                                            </div>
                                            <div id='content_tab_".$i."' title='open'>
                                                <div class='section_text'>".$careers."</div>
                                            </div>
                                        </div>";
                                   $i++;
                                }
                            ?>
	             	</div>
                   </div>
              </div>
          </div>
