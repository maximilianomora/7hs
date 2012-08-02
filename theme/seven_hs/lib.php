<?php

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string
 */
function seven_hs_process_css($css, $theme) {

    // Set the link color
    if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = seven_hs_set_linkcolor($css, $linkcolor);

    // Set the region width
    if (!empty($theme->settings->regionwidth)) {
        $regionwidth = $theme->settings->regionwidth;
    } else {
        $regionwidth = null;
    }
    $css = seven_hs_set_regionwidth($css, $regionwidth);

    // Set the custom CSS
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = seven_hs_set_customcss($css, $customcss);

    // Return the CSS
    return $css;
}

/**
 * Sets the background colour variable in CSS
 *
 * @param string $css
 * @param mixed $backgroundcolor
 * @return string
 */
function seven_hs_set_linkcolor($css, $linkcolor) {
    $tag = '[[setting:linkcolor]]';
    $replacement = $linkcolor;
    if (is_null($replacement)) {
        $replacement = '#f25f0f';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the region width variable in CSS
 *
 * @param string $css
 * @param mixed $regionwidth
 * @return string
 */
 
function seven_hs_set_regionwidth($css, $regionwidth) {
    $tag = '[[setting:regionwidth]]';
    $doubletag = '[[setting:regionwidthdouble]]';
    $replacement = $regionwidth;
    if (is_null($replacement)) {
        $replacement = 250;
    }
    $css = str_replace($tag, $replacement.'px', $css);
    $css = str_replace($doubletag, ($replacement*2).'px', $css);
    return $css;
}

/**
 * Sets the custom css variable in CSS
 *
 * @param string $css
 * @param mixed $customcss
 * @return string
 */
function seven_hs_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function inject_aspect($page)
{
   switch($page){
     case "/login/index.php":
        include("aspects/login_index.php");
     break;      
   }
}

class frontpage{
  
    
  private $logo_url = "/theme/seven_hs/imgs/logo.gif";  
  private $linea_url = "/theme/seven_hs/imgs/linea.gif";    
       
  public function __construct()
  {
    global $CFG;
    require_once($CFG->dirroot.'/lib/7hs/html/html.php');    
  }
    
  public function get_logo()
  {
    return new html_img("logo",$this->logo_url);    
  }  

  public function get_linea()
  {
    return new html_img("logo",$this->linea_url);    
  }  

  public function set_key_words($header)
  {
      $find = '<meta name="keywords" content="moodle, " />';
      $keywords = '<meta name="keywords" content="Colegios, Idiomas, English, Português, Español, online, teaching, activities, learning, e-learning, PET, KET, courses, exercises, grammar, vocabulary, exams" />';
      return str_replace($find, $keywords, $header);
  }
  
  public function get_menu()
  {
    $links = $this->get_menu_links();
    $rowcells = array();
    foreach($links as $link)
    {
      $rowcells[] = new html_table_cell($link); 
    }
    
    $table = new html_table_ext(new html_table_row_ext($rowcells));
    $table->attributes['class'] = "frontpage_menu_table";
    return $table;
  } 
  
  
  private function get_menu_links()
  {
    $links = array();
    $links[]= $this->get_link("header1", "/", "Principal", null, "frontpage_menu_links");
    $links[]= $this->get_link("header2", "/staff.php", "Nosotros", null, "frontpage_menu_links");     
    $links[]= $this->get_link("header3", "/service.php", "Servicios", null, "frontpage_menu_links");     
    $links[]= $this->get_link("header4", "/contact.php", "Contacto", null, "frontpage_menu_links");     
    $links[]= $this->get_link("header5", "/login/index.php", "Login", null, "frontpage_menu_links"); 
    return $links;    
  }
  
  private function get_link($id, $href, $text, $onclick=null, $class=null){
    $link = new html_link($id, $href, $text);
    $link->onclick = $onclick;
    $link->class  = $class;
    
    return $link;
  }
  
  
}