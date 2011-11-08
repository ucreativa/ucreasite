<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_sections[8];
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('" . $section_data['name'] . "');</script>";
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
                    $i=0;
                    foreach($section_files as $value){
                            $src=__RSC_FLE_HOST_PATH . "sections/section_".$section_key."/" . $value[1];
                            $size=getimagesize($src);
                            $tam=" width='".$size[0]."' height='".$size[1] ."'";

                            echo "<li class='panel'>"
                                     . cls_HTML::html_img_tag($src, "", "section_banner", $value[2], $tam) .
                                  "</li>";
                            $i++;
                    }
                ?>
			</ul>
			<!-- END AnythingSlider  -->
       </div>

	    <div class="section_tab">
             <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title"><?php echo $section_data['title']; ?></p></div>
             <div title="open" class="content_tab">
                 <span class="section_text" id="section_text"><br/></span>
                 <div id="sections_blocks">
                     <div id="sections_content_box">
                            <?php
                                $array_titles=get_all_strings_between("." . $section_data['text'],$array_global_settings['title_char_open'],$array_global_settings['title_char_close']);
                                $array_texts=get_all_strings_between($section_data['text'],$array_global_settings['title_char_close'],$array_global_settings['title_char_open']);

                                for($i=1;$i<=substr_count($section_data['text'],$array_global_settings['title_char_close']);$i++){
                              	   echo "<div class='section_block'>
                             				<div class='icon_section_tab' id='icon_tab_".$i."' onclick=\"openclose_tabs(this,".$i.",'".__IMG_PATH."');\">
                                              <span class='section_title'>".$array_titles[$i-1]."</span>
                                            </div>
                                            <div id='content_tab_".$i."' title='open'>
                                                <div class='section_text'>".$array_texts[$i-1]."</div>
                                            </div>
                                        </div>";
                                }
                            ?>
	             	</div>
                   </div>
              </div>
          </div>
