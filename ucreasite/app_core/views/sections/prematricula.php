<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_microsites[3];
    //$section_data=$section_core->get_sectiondata($section_key);
    //$section_files=$section_core->get_sectionfiles($section_key);

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('Prematricula');</script>";
?>

	    <div class="section_tab">
             <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title">Prematrícula</p></div>
             <div title="open" class="content_tab">
                 <span class="section_text" id="section_text"><br/></span>
                 <div id="sections_blocks">
                     <div id="sections_content_box">
                  	   <div class='section_block'>
                  	   <iframe src="http://www.encuestafacil.com/RespWeb/Qn.aspx?EID=1112018" style="border: 0" width="700" height="600" frameborder="0" scrolling="auto"></iframe>
                          <p class="section_text"></p>
                       </div>
	             	   </div>
                   </div>
              </div>
          </div>
