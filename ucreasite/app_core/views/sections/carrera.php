<?php
//  Inicializamos el llamado a la info de la BD de la sección
     require_once(__CTR_PATH . "ctr_career.php");
     $career_core=new ctr_Career();
     $career_data=$career_core->get_careerdata($_GET['idc']);
     $curse_program_img=""; //almacena los nombre de imágenes correspondientes a los programas de curso

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('" . $career_data['name'] . "');</script>";
?>

<script>
  // Set up Sliders
  // **************
  $(function(){
    $('#section_slider').anythingSlider({resizeContents: false, // If true, solitary images/objects in the panel will expand to fit the viewport
      navigationFormatter : function(index, panel){ // Format navigation labels with text
     }});
  });
</script>

          <div id="banner">
          	<!-- AnythingSlider -->
  			<ul id="section_slider">

                  <?php
                      $id_career=$_GET['idc'];
                      $career_files=$career_core->get_careerfiles($id_career);

                      //determinamos si las imagenes cargadas no son programas de curso (prg_imgname)
                      $i=0;
                      foreach($career_files as $value){
                          if(string_between("." . $value[1], ".", "_")!= "prg"){
                              $src=__RSC_FLE_HOST_PATH . "careers/career_". $id_career . "/" . $value[1];
                              $size=getimagesize($src);
                              $tam=" width='".$size[0]."' height='".$size[1] ."'";

                              echo "<li class='panel'>"
                                     . cls_HTML::html_img_tag($src, "", "section_banner", $value[2], $tam) .
                                    "</li>";
                              $i++;
                          }else{
                            $curse_program_img=$value[1];
                          }
                      }

                  ?>

  			</ul>
  			<!-- END AnythingSlider  -->
         </div>

	    <div class="section_tab">
             <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title"><?php echo $career_data['name']; ?></p></div>
             <div title="open" class="content_tab">
                 <span class="section_text" id="section_text"><br/></span>
                 <?php echo cls_HTML::html_link_tag("[índice]", "", "return", "?s=" . $array_sections[2], "", "índice", "") ?>
                 <br/>
                 <div id="sections_blocks">
                     <div id="sections_content_box">
                            <?php
                                $array_titles=get_all_strings_between("." . $career_data['text'],$array_global_settings['title_char_open'],$array_global_settings['title_char_close']);
                                $array_texts=get_all_strings_between($career_data['text'],$array_global_settings['title_char_close'],$array_global_settings['title_char_open']);
                                $array_texts=str_replace($array_global_settings['curse_char_img'],cls_HTML::html_img_link(__RSC_FLE_HOST_PATH . "careers/career_" . $id_career . "/" . $curse_program_img, __VWS_HOST_PATH . "sections/download_image.php?id=". $id_career ."&img=" . $curse_program_img, "_blank", "Click para descargar", "", "", "Programa de carrera", "", ""),$array_texts);


                                for($i=1;$i<=substr_count($career_data['text'],$array_global_settings['title_char_close']);$i++){
                              	   echo "<div class='section_block'>
                             				<div class='icon_section_tab' id='icon_tab_".$i."' onclick=\"openclose_tabs(this,".$i.",'".__IMG_PATH."');\">
                                              <span class='section_title'>".$array_titles[$i-1]."</span>
                                            </div>
                                            <div id='content_tab_".$i."' title='close'>
                                                <div class='section_text'>".$array_texts[$i-1]."</div>
                                            </div>
                                        </div>";
                                }
                            ?>
	             	</div>
                   </div>
                   <br/>
              <?php echo cls_HTML::html_link_tag("[índice]", "", "return", "?s=" . $array_sections[2], "", "índice", "") ?>
              </div>
          </div>
