<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div id="page">

    <?php if ($hasheading || $hasnavbar) { ?>
       <div id="wrapper" class="clearfix">

<!-- START OF HEADER -->

            <div id="page-header" class="inside">
                <div id="page-header-wrapper" class="wrapper clearfix">
                    <?php if ($hasheading) { ?>
                        <div id="header-left">
                            <h1 class="headermain inside"><?php echo $PAGE->heading ?></h1>
                        </div>
                        <div class="headermenu"><?php
                            echo $OUTPUT->login_info();
                                if (!empty($PAGE->layout_options['langmenu'])) {
                                    echo $OUTPUT->lang_menu();
                                }
                            echo $PAGE->headingmenu ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($hasnavbar) { ?>
                <div class="navbar">
                    <div class="wrapper clearfix">
                        <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                        <div class="navbutton"> <?php echo $PAGE->button; ?></div>
                    </div>
                </div>
            <?php } ?>

<!-- END OF HEADER -->

    <?php } ?>


<!-- START OF CONTENT -->

            <div id="page-content-wrapper" class="wrapper clearfix">
                <div id="page-content" class="clearfix">
                    <div id="report-main-content">
                        <div class="region-content">
                            <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                        </div>
                    </div>
                    <?php if ($hassidepost) { ?>
                    <div id="report-region-wrap">
                        <div id="report-region-pre" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>

<!-- END OF CONTENT -->

    <?php if ($hasheading || $hasnavbar) { ?>
        </div>
    <?php } ?>

<!-- START OF FOOTER -->

        <?php if ($hasfooter) { ?>
            <div id="page-footer" class="wrapper clearfix" style="position: relative;left:20px;">
                
                <?php
                        echo "<br><br>7hs © 2012&nbsp;"; 
                       //echo $OUTPUT->standard_footer_html();   
                ?>
            </div>
        <?php } ?>

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>