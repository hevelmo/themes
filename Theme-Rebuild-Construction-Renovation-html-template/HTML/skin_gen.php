<?php 
error_reporting(0);
for ($i=1; $i<9; $i++):
switch($i){
	
	case 1: 
		$color='#32b4c0';
		$color_rgba_1='rgba(50, 180, 192, 0.90)';
		$color_rgba_2='rgba(50, 180, 192, 0.80)';
		$color_name='torquze';
	break;
	
	case 2: 
		$color='#ffb300';
		$color_rgba_1='rgba(255, 179, 0, 0.90)';
		$color_rgba_2='rgba(255, 179, 0, 0.80)';
		$color_name='sun';
	break;
	
	case 3: 
		$color='#d80000';
		$color_rgba_1='rgba(216, 0, 0, 0.90)';
		$color_rgba_2='rgba(216, 0, 0, 0.80)';
		$color_name='red';
	break;
	
	case 4: 
		$color='#EE163A';
		$color_rgba_1='rgba(238, 22, 58, 0.90)';
		$color_rgba_2='rgba(238, 22, 58, 0.80)';
		$color_name='pink';
	break;
	
	case 5: 
		$color='#81B800';
		$color_rgba_1='rgba(157, 192, 50, 0.90)';
		$color_rgba_2='rgba(157, 192, 50, 0.80)';
		$color_name='greentea';
	break;
	
	case 6: 
		$color='#1DA879';
		$color_rgba_1='rgba(29, 168, 121, 0.90)';
		$color_rgba_2='rgba(29, 168, 121, 0.80)';
		$color_name='green';
	break;
	
	case 7: 
		$color='#3ea7d7';
		$color_rgba_1='rgba(62, 167, 215, 0.90)';
		$color_rgba_2='rgba(62, 167, 215, 0.80)';
		$color_name='blue';
	break;
	
	case 8: 
		$color='#EE163A';
		$color_rgba_1='rgba(238, 22, 58, 0.90)';
		$color_rgba_2='rgba(238, 22, 58, 0.80)';
		$color_name='orange';
	break;
}
$newFileName = 'css/skins/'.$color_name.".css";
$newFileContent = '/* '.$color_name.' Skin */
/* ------------------------------------------------------------------------ */
/* Color
/* ------------------------------------------------------------------------ */

a,.jx-section-title-1 .jx-seperator-icon i , .jx-servicelist-2 .servicelist-item:hover .icon i , .jx-protfolio .category-menu ul li a:hover , 
.jx-newsletter .white-column .title , .jx-footer-1 .jx-footer h3.jx-section-title-1 .jx-seperator-icon i , .jx-servicelist-2 .servicelist-item:hover .icon i , .jx-protfolio .category-menu ul li a:hover , .jx-newsletter .white-column .title , .jx-footer-1 .jx-footer h3 , .jx-widget-recent-post .jx-btn-default:hover , .jx-footer-section .jx-about .jx-btn-default:hover , .jx-topbar .jx-right-topbar li span , .jx-topbar .jx-right-topbar li a:hover i , .menu > li > a:hover , .jx-widget-recent-post ul li a:hover , ul.default li::before , .jx-page-subhead .breadcrumb , .menu .submenu li:hover > a,.sbOptions a:hover, .sbOptions a:focus, .sbOptions a.sbFocus,.jx-blog-more a:hover , .jx-header .header-info ul , .jx-tetimonials-1 .description::before , .menu li .submenu a , .jx-servicelist-1:hover .icon i , .contact-submit button:hover , .jx-blog-tag li:hover a , .jx-sercvice-list li::before , .menu li.has-child > a::after,.jx-servicebox-item:hover .jx-image-title-over a i,.jx-servicebox-item:hover .jx-image-title-over a
{
	color:'.$color.' ;
}


.jx-protfolio .jx-portfolio-filter a.current {
	color:'.$color.' !important;
}

/* ------------------------------------------------------------------------ */
/* Background
/* ------------------------------------------------------------------------ */
::selection 
{
	background:'.$color.' !important;
}

::-moz-selection
{
	background:'.$color.' !important;
}

.jx-servicebox-item:hover .readmore .plus-icon , .jx-tagline-box-2 .button , .jx-container.jx-darkgrey-bg .jx-tagline-box-slope , .jx-skillsbar-1 .skillbar-bar , 
.shortcode_tab_e.jx-white-tab.jx-arrow-tab ul li , .jx-accordion-3 .circle .open .title, .jx-accordion-3 .circle .title:hover , .jx-team-member-1 .plus-icon , .jx-team-member-1 .team-social li i , .jx-newsletter .darkgrey-column .form .jx-submit , .jx-price-1 .jx-button .price-btn , .jx-footer-newsletter .jx-form-wrapper button , .jx-container.jx-grey-bg .jx-subhead-slope , .jx-contact-form input.jx-submit,.jx-tags-footer ul li:hover,.grid-item,.jx-sidebar-menu ul li.active,.jx-quote-box .contact-submit button,.jx-pagination .page-number.current,.jx-pagination .page-number:hover,.search-input button,.jx-sidebar-tags li:hover,.contact-submit button , .jx-header-search , .jx-tetimonials-1 .jx-testimonial-details , .jx-counter-up-box span , .jx-process .jx-process-step , .menu .submenu li:hover > a , .jx-btn-default:hover i.btn-icon-right , .grid-item .jx-portfolio-plus-hover i, .portfolio-item .jx-portfolio-plus-hover i , .jx-page-title .jx-breaducrumb span , .jx-completed-prjcts-info , .jx-big-iconed-button a:hover
{
	background:'.$color.';
}

tr:hover {
	background:'.$color.' !important;
}


	
/* ------------------------------------------------------------------------ */
/* Background Color
/* ------------------------------------------------------------------------ */

.jx-default-bg , .countup_hr , .jx-blog-1 .hr-line , .jx-section-title-2 .jx-seperator-hr , table th,.jx-caption-big-icon i,.jx-quote-rquest .jx-button a,.jx-content-box .jx-item:hover,.jx-request-quote .jx-seperator-hr , .jx-row-badge ,.jx-section-title-3 .jx-seperator-hr
{
	background-color:'.$color.' !important;
}

/* ------------------------------------------------------------------------ */
/* Background RGBA Color
/* ------------------------------------------------------------------------ */

.jx-tint:before {
	background: '.$color_rgba_1.' !important;
}

.jx-blog-image .jx-image-hoverlay {
	background: '.$color_rgba_2.' !important;	
}

/* ------------------------------------------------------------------------ */
/* Border Color
/* ------------------------------------------------------------------------ */

.jx-servicebox-item:hover .readmore .plus-icon , .jx-servicebox-item:hover .icon i::after , .jx-servicelist-2 .servicelist-item:hover .icon i::after , .jx-skillsbar-1 .skillbar , .menu > li > a:hover , .jx-servicelist-1 .icon
{
	border-color:'.$color.' !important;
}



/* ------------------------------------------------------------------------ */
/* Border Left Color
/* ------------------------------------------------------------------------ */


.jx-blockquote .quote-a.quote-border , .jx-row-badge .jx-badge-shape {
	border-left-color:'.$color.' !important;
}


/* ------------------------------------------------------------------------ */
/* Border Right Color
/* ------------------------------------------------------------------------ */


.jx-row-badge .jx-badge-shape {
	border-right-color:'.$color.' !important;
}

/* ------------------------------------------------------------------------ */
/* Border Top Color
/* ------------------------------------------------------------------------ */

.menu > li:hover {
	border-top-color:'.$color.' !important;
}

/* ------------------------------------------------------------------------ */
/* Border Bottom Color
/* ------------------------------------------------------------------------ */

.jx-section-title-1 .jx-left-border , .jx-section-title-1 .jx-right-border , .jx-servicelist-1 .category::after , .menu li .submenu li.col
 {
	border-bottom-color:'.$color.' !important;
 }
 
 
 
 
/* ------------------------------------------------------------------------ */
/* Variant Background Color
/* ------------------------------------------------------------------------ */
.jx-bg-defualt-1{background-color:#c63f32 !important}
.jx-bg-defualt-2{background-color:#ad3b30 !important}
.jx-bg-defualt-3{background-color:#852f27 !important}
.jx-bg-defualt-4{background-color:#5b1a13 !important}';
if(file_put_contents($newFileName,$newFileContent)!=false){
    echo "File created (".basename($newFileName).")<br>";
}else{
    echo "Cannot create file (".basename($newFileName).")";
}
endfor;
?>