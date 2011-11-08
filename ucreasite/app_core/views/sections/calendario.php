<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_microsites[2];
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('" . $section_data['name'] . "');</script>";
?>

	    <div class="section_tab">
             <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title"><?php echo $section_data['title']; ?></p></div>
             <div title="open" class="content_tab">
                 <span class="section_text" id="section_text"><br/></span>
                 <div id="sections_blocks">
                     <div id="sections_content_box">
                  	   <div class='section_block'>
                  	   <iframe src="http://www.google.com/calendar/embed?src=ucreativa.com_2ca35a5a3nil8od1qdahbo9c04%40group.calendar.google.com&ctz=UTC-06" style="border: 0" width="650" height="600" frameborder="0" scrolling="no"></iframe>
                          <p class="section_text"></p>
                       </div>
	             	   </div>
                   </div>
              </div>
          </div>
