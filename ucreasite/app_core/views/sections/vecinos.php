<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_microsites[0];
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
                        echo "<li class='panel".$i."'>"
                                 . cls_HTML::html_img_tag(__RSC_FLE_HOST_PATH . "sections/section_".$section_key."/" . $value[1], "", "section_banner", $value[2], "") .
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
                                require_once(__CTR_PATH . "ctr_link.php");
                                $link_core=new ctr_Link();
                                $link_data=$link_core->get_linkdata();

                                $array_titles=get_all_strings_between("." . $section_data['text'],$array_global_settings['title_char_open'],$array_global_settings['title_char_close']);
                                $array_texts=get_all_strings_between($section_data['text'],$array_global_settings['title_char_close'],$array_global_settings['title_char_open']);

                                $content_section="";
                                foreach($link_data as $value){
                                   $content_section.="<div class='link_block'>" .
                                                         cls_HTML::html_img_link(__RSC_FLE_HOST_PATH . "sections/section_".$section_key."/" . $value[3], $value[2], "_blank", $value[4], "", "img_amigos", $value[1], "height=40", "") .
                                                         cls_HTML::html_link_tag($value[2], "", "lnk_amigos", $value[2], "_blank", $value[1], "") .
                                                     "</div>";
                                }

                                echo "<div class='section_block'>
                         				<div class='icon_section_tab' id='icon_tab_0' onclick=\"openclose_tabs(this,0,'".__IMG_PATH."');\">
                                          <span class='section_title'>".$section_data['subtitle']."</span>
                                        </div>
                                        <div id='content_tab_0' title='open'>
                                            <div class='section_text'>" . $content_section ."</div>
                                        </div>
                                      </div>";

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
