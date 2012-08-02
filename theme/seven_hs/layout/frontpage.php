<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));

$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$frontpage = new frontpage();

$bodyclasses = array();
$bodyclasses[] = 'content-only';


if (!empty($PAGE->theme->settings->tagline)) {
    $tagline = '<p>'.$PAGE->theme->settings->tagline.'</p>';
} else {
    $tagline = '<!-- There was no custom tagline set -->';
}
if (!empty($PAGE->theme->settings->logo)) {
    $logourl = $PAGE->theme->settings->logo;
}

$PAGE->requires->js('/theme/seven_hs/scripts/seven_hs.js');
$PAGE->requires->js_init_call('M.front_page.init');
$PAGE->requires->css('/theme/seven_hs/style/pagelayout.css');


echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $frontpage->set_key_words($OUTPUT->standard_head_html()) ?>
    <style type="text/css">
     body, li{
         font-family: Century Gothic;
     }
    </style>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php 
echo $OUTPUT->standard_top_of_body_html()
 ?>

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div id="page">

    <div id="wrapper" class="clearfix">
         <div id="frontpage-header" >  
         <table cellpadding="0" cellpadding="0">
            <tr>
                <td width="100%" valign="bottom" class="frontpage_header_td">
                <?php echo $frontpage->get_logo();?>  
                </td>
            </tr>
            <tr>
                <td width="100%" class="frontpage_header_td">
                <?php echo $frontpage->get_linea();?>   
                </td>
            </tr>
            <tr>
                <td width="100%" align="right" valign="top" class="frontpage_header_td">
                <?php echo $frontpage->get_menu();?>   
                </td>
            </tr>
         </table>
         </div>

<!-- END OF HEADER -->

<!-- START OF CONTENT -->

        <div id="page-content-wrapper" class="wrapper clearfix">
            <div id="page-content">
                
                                    <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                </div>
        </div>

<!-- END OF CONTENT -->

    </div> <!-- END #wrapper -->

<!-- START OF FOOTER -->
    <div id="page-footer" class="wrapper clearfix" style="position: relative;left:20px;">
          <br><br><br><br>
        <?php
                echo "7hs © 2012 <br>&nbsp;";  
            //echo $OUTPUT->standard_footer_html(); 
           ?>
       </div>

<!-- END OF FOOTER -->

</div> <!-- END #page -->

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>