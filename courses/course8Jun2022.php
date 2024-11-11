<!DOCTYPE html>
<html lang="zxx">
<?php
//include ("../../../include/mysql.php");
//include ("../../../include/conn-main.php");

//$SiteId=$_REQUEST["SiteId"];
//$id=$_REQUEST["id"];

//Request Site details --------------------
$qrysite = mysqli_prepare($dbi, "SELECT Name, LogoUrl, IconBg, FriendlyId, ThemeId, SearchID, Content, YoutubeVideo, PrimaryPhone, TwitterURL, FacebookURL, InstagramURL, YoutubeURL, VideoImageURL, PageImageURL, FooterImageURL, SiteFooter, SiteMetaTag, EmbeddedCodeHead, PrimaryEmail FROM sites where SiteId = ?");
mysqli_stmt_bind_param($qrysite, "s", $SiteId);
mysqli_stmt_execute($qrysite);
mysqli_stmt_bind_result($qrysite, $NameSite, $LogoUrl, $IconBg, $folderdest, $ThemeId, $SearchID, $Content, $YoutubeVideo, $phone, $TwitterURL, $FacebookURL, $InstagramURL, $YoutubeURL, $VideoImageURL, $PageImageURL, $FooterImageURL, $SiteFooter, $SiteMetaTag, $EmbeddedCodeHead, $PrimaryEmail);
mysqli_stmt_fetch($qrysite);

$urlsite = "https://umcms.um.edu.my/sites/".$folderdest."/";
$urlslider = "/sites/".$folderdest."/";
$urlplugin = "/ckeditor";

mysqli_stmt_close($qrysite);

//Request News details --------------------
/*$qryHTML = mysqli_prepare($dbi, "SELECT title,image,datecreated,content FROM news where SiteId = ? and id = ?");
mysqli_stmt_bind_param($qryHTML, "ss", $SiteId, $id);
mysqli_stmt_execute($qryHTML);
mysqli_stmt_bind_result($qryHTML, $titleHTML, $image, $datecreated, $contentHTML);
mysqli_stmt_fetch($qryHTML);
$datecreated=substr($datecreated,8,2)."/".substr($datecreated,5,2)."/".substr($datecreated,0,4);

mysqli_stmt_close($qryHTML);
*/
$stmt = mysqli_prepare($dbi, "SELECT title, division, length, commitment, pace, subject, platform, credit, image, datecreated, content, active, startevent, endevent, urlenroll FROM courses where id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $titleHTML, $division, $length, $commitment, $pace, $subject, $platform, $credit, $image, $datecreated, $contentHTML, $active, $startevent, $endevent, $urlenroll);
mysqli_stmt_fetch($stmt);

/*if ($startevent <> "") 
  $startevent=substr($startevent,8,2)."-".substr($startevent,5,2)."-".substr($startevent,0,4);

if ($endevent <> "") 
  $endevent=substr($endevent,8,2)."-".substr($endevent,5,2)."-".substr($endevent,0,4);
*/
	
mysqli_stmt_close($stmt);

$imgpath = "../Image/Courses/".$image;

if ($startevent <> ""){ 
	$haris=substr($startevent,8,2);
	$bulans=substr($startevent,5,2);
	$bulans=(int)$bulans;
	$tahuns=substr($startevent,0,4);
}	

if ($endevent <> ""){ 
	$harie=substr($endevent,8,2);
	$bulane=substr($endevent,5,2);
	$bulane=(int)$bulane;
	$tahune=substr($endevent,0,4);
}	

$months = array (1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');


//$PageIdPath = $PageId;
//$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
$protocol = "https://";

//clear cache --------------------
$cache = '';
$cache = '?'.time();
$curryear = date("Y");
$currmonth = date("m");
//---------------------------------

//$contentHTML = str_replace($urlsite, "../", $contentHTML);
//$contentHTML = str_replace($urlslider, "../", $contentHTML);
//$contentHTML = str_replace($urlplugin, "https://www.um.edu.my/ckeditor", $contentHTML);


?>
<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 08:10:20 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Welcome to <?php echo $NameSite;?></title>
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php echo $NameSite;?>" />
		<meta name="keywords" content="<?php echo $SiteMetaTag;?>" />
		<meta name="author" content="<?php echo $PrimaryEmail;?>" />

        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="../logoum.ico">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="../css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
		<!-- slick css -->
        <link rel="stylesheet" type="text/css" href="../css/slick.css">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="../css/rsmenu-main.css">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="../css/rsmenu-transitions.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
		<!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="../fonts/flaticon.css">
        <!-- flaticon2 css  -->
        <link rel="stylesheet" type="text/css" href="../fonts/fonts2/flaticon.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="../style.css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<style type="text/css">
		html, body {
			font-size: 17px;
		}
		
		.home2 .rs-header-top {
			padding: 20px 0 40px;
		}
		
		.rs-toolbar .rs-toolbar-left .welcome-message {
		  font-size: 15px;
		}

		.rs-toolbar .rs-toolbar-right .toolbar-share-icon ul li a {
		  font-size: 15px;
		  color: #888888;
		}
		
		.rs-toolbar {
			/*background-color: #212121;*/
			background-color: #192f59;
		}

		.home2 .menu-area {
    		background: #192f59;
		}
		
		.home2 .menu-area .rs-menu ul > li > a {
			color: #fff;
		}
		
		.home2 .menu-area .rs-menu ul > li ul.sub-menu a {
  			color: #fff;
		}

		.home2 .menu-area .main-menu {
		  background: #192f59;
		}
		
		.menu-sticky.sticky {
  			background: #192f59;
		}
		
		.rs-menu ul ul {
			background-color: #192f59; 
		}
		
		/* image bg video */
		.bg6 {
  			background-image: url(../<?php echo $VideoImageURL;?>);
  			background-size: cover;
  			background-attachment: fixed;
  			background-position: center top;
		}

		/* image bg page */
		.bg7 {
		  background-image: url(../<?php echo $PageImageURL;?>);
		  background-size: cover;
		  background-position: center;
		  background-position: center top;
		}		

		/* image bg footer */
		/*.bg3 {
  			background-image: url(images/bg/counter-bg2.jpg);
  			background-image: url();
  			background-color: #192f59;
  			background-size: cover;
 		 	background-attachment: fixed;
  			background-position: center top;
		}*/

		.rs-services-style1 .services-item {
		  background-color: #192f59;
		  padding: 25px 17px 17px;
		  box-shadow: 0 4px 2px -2px #000000;
		  z-index: 111;
		  position: relative;
		  top: -30px;
		  transition: all 0.3s ease 0s;
		}
		
		.rs-services-style1 .services-icon {
		  height: 130px;
		  width: 130px;
		  background-color: #192f59;
		  line-height: 88px;
		  text-align: center;
		  position: absolute;
		  top: -50px;
		  z-index: -1;
		  font-size: 40px;
		  border-radius: 50%;
		  left: 0;
		  right: 0;
		  margin: 0 auto;
		  color: #fff;
		  transition: all 0.3s ease 0s;
		}
		
		.rs-menu-toggle {      
			background: #192f59;
			border-left: 1px solid #192f59;
		}
		
		.rs-courses-2 .cource-item .cource-btn {
			background-color: #fdc800;
			border: 2px solid #fdc800;
			display: inline-block;
			margin-top: 20px;
			padding: 2px 10px;
			font-size: 14px;
			text-transform: uppercase;
			color: #ffffff;
			font-weight: 700;
			transition: all 0.3s ease 0s;
		}
		
		.rs-footer .footer-top {
    		padding-top: 70px;
		}

		#mysis { display: none;}
	</style>
    </head>
    <body class="home2">
		
        <!--Full width header Start-->
		<div class="full-width-header">
			<!-- Toolbar Start -->
			<div class="rs-toolbar">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="rs-toolbar-right" style="text-align: left;">
								<div class="toolbar-share-icon">
									<ul>
										<li><font color="#fff">Welcome to <?php echo $NameSite;?></font></li>
										<?php
										if($PrimaryEmail){
											echo "<li><font color=\"#888885\"><i class=\"fa fa-envelope\"></i> ".$PrimaryEmail."</font></li>\n";
										}
										
										if($phone){
											echo "<li><font color=\"#888885\"><i class=\"fa fa-phone\"></i> ".$phone."</font></li>\n";
										}
										
										?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="rs-toolbar-right">
								<div class="toolbar-share-icon">
									<ul>
										<li><a href="<?php echo $FacebookURL;?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php echo $TwitterURL;?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a href="<?php echo $YoutubeURL;?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
										<li><a href="<?php echo $InstagramURL;?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
								<!--<a href="#" class="apply-btn">Apply Now</a>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Toolbar End -->
			
			<!--Header Start-->
			<header id="rs-header" class="rs-header" style="background-color: #f7f7f7;">
				<!-- Header Top Start -->
				<div class="rs-header-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-12">
								<div class="logo-area">
									<a href="../index"><img src="../<?php echo $LogoUrl;?>" alt="logo"></a>
								</div>
							</div>
							<div class="col-lg-8 col-md-12">
								<div class="row">
								    <div class="col-sm-2">
								        <!--<div class="header-contact">
                                            <div id="phone-details" class="widget-text">
								                <i class="glyph-icon flaticon-phone-call"></i>
								                <div class="info-text">
								                    <a href="https://helpdesk.um.edu.my/" target="_blank">
								                    	<span>Helpdesk</span>
														helpdesk.um.edu.my
													</a>
								                </div>
								            </div>
								        </div>-->
								    </div>
								    <div class="col-sm-2">
								        <!--<div class="header-contact" id="mysis">
								            <div id="info-details" class="widget-text">
								                <i class="fa fa-envelope-open"></i>
								                <div class="info-text">
								                    <a href="#" target="_blank">
								                    	<span>Email</span>
														admin@um.edu.my
													</a>
								                </div>
								            </div>
								        </div>-->
								    </div>
								    <div class="col-sm-8">
								        <img src="https://www.um.edu.my/images/taglinecco.jpg" alt="logo">
								    </div>
								    
								</div>
							</div>
						</div>				
					</div>
				</div>
				<!-- Header Top End -->

				<!-- Menu Start -->
				<div class="menu-area menu-sticky">
					<div class="container">
						<div class="main-menu">
							<div class="row">
								<div class="col-sm-12">
									<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
									<nav class="rs-menu">
										<ul class="nav-menu">
<?php
	$stmt = mysqli_prepare($dbi, "SELECT id, parent, title, link, target_window  FROM menu_cimp where SiteId=? and admin='0' and active='1' order by (0 + menupos) asc");
	mysqli_stmt_bind_param($stmt, "s", $SiteId);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $data['id'], $data['parent'], $data['title'], $data['link'], $data['target_window']);
	$bilmenu = 0;
	while (mysqli_stmt_fetch($stmt)) {
		$menuid[$bilmenu]=$data["id"];
		$parentid[$bilmenu]=$data["parent"];
		$menu[$bilmenu] = $data["title"];
		$link1[$bilmenu] = $data["link"]; 
		$target[$bilmenu] = $data["target_window"]; 

		$bilmenu++;
	}
	mysqli_stmt_close($stmt);

	for ($bil = 0; $bil < $bilmenu; $bil++) { //Start for looping -----------
		$submenu = "Y";
		$sqlsub = "SELECT title FROM menu_cimp2 WHERE parent=".$menuid[$bil]." and SiteId='".$SiteId."' and active='1'";
		$rsltsub = mysqli_query($dbi, $sqlsub);
		if ((!$rsltsub) || mysqli_num_rows($rsltsub) == 0){
			$submenu = "N";
		}

		if ($submenu == "Y"){ //Start submenu 1 -------------
			
			$stmt2 = mysqli_prepare($dbi, "SELECT id, parent, title, link, target_window FROM menu_cimp2 where SiteId=? and  parent=? and admin='0' and active='1' order by (0 + menupos) asc");
			mysqli_stmt_bind_param($stmt2, "ss", $SiteId, $menuid[$bil]);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_bind_result($stmt2, $data2['id'], $data2['parent'], $data2['title'], $data2['link'], $data2['target_window']);
			$bilsub = 0;
			while (mysqli_stmt_fetch($stmt2)) {
				$menuid2[$bil][$bilsub]=$data2["id"];
				$parentid2[$bil][$bilsub]=$data2["parent"];
				$menu2[$bil][$bilsub] = $data2["title"];
				$link2[$bil][$bilsub] = $data2["link"];
				$target2[$bil][$bilsub] = $data2["target_window"]; 

				$bilsub++;
			}			
			$bilparentsub[$bil] = $bilsub;

			mysqli_stmt_close($stmt2);

		} //End of submenu 1 -------------
	}
	
	for ($num = 0; $num < $bilmenu; $num++) { //Start for looping -----------

		//Semak ada submenu or not ----------------------------
		$submenu = "Y";
		$sqlsub = "SELECT title FROM menu_cimp2 WHERE parent=".$menuid[$num]." and SiteId='".$SiteId."' and active='1'";
		$rsltsub = mysqli_query($dbi, $sqlsub);
		if ((!$rsltsub) || mysqli_num_rows($rsltsub) == 0){
			$submenu = "N";
		}

		if ($submenu == "Y"){ //Start submenu 1 -------------
			echo "<li class=\"menu-item-has-children\">\n";
			echo "<a href=\"#\">".$menu[$num]."</a>\n";
			echo "<ul class=\"sub-menu\">\n";
			
			for ($num2 = 0; $num2 < $bilparentsub[$num]; $num2++) { //Start for looping -----------

				//Semak ada submenu or not ----------------------------
				$submenu2 = "Y";
				$sqlsub2 = "SELECT title FROM menu_cimp3 WHERE parent=".$menuid2[$num][$num2]." and SiteId='".$SiteId."' and active='1'";
				$rsltsub2 = mysqli_query($dbi, $sqlsub2);
				if ((!$rsltsub2) || mysqli_num_rows($rsltsub2) == 0){
					$submenu2 = "N";
				}
				
				if ($submenu2 == "Y"){ //Start submenu 2 -------------

					echo "<li class=\"menu-item-has-children\">\n";
					echo "<a href=\"#\">".$menu2[$num][$num2]."</a>\n";
					echo "<ul class=\"sub-menu\">\n";

					$stmt3 = mysqli_prepare($dbi, "SELECT id, parent, title, link, target_window FROM menu_cimp3 where SiteId=? and  parent=? and admin='0' and active='1' order by (0 + menupos) asc");
					mysqli_stmt_bind_param($stmt3, "ss", $SiteId, $menuid2[$num][$num2]);
					mysqli_stmt_execute($stmt3);
					$data3 = array();
					mysqli_stmt_bind_result($stmt3, $data3['id'], $data3['parent'], $data3['title'], $data3['link'], $data3['target_window']);
					while (mysqli_stmt_fetch($stmt3)) {
						$menuid3=$data3["id"];
						$parentid3=$data3["parent"];
						$menu3 = $data3["title"];
						$link3 = $data3["link"];
						$target3 = $data3["target_window"]; 

						if (strpos($link3, 'http') !== false)
							echo "<li><a href=\"".$link3."\" target=\"".$target3."\">".$menu3."</a></li>\n";
						else
							echo "<li><a href=\"../".$link3."\" target=\"".$target3."\">".$menu3."</a></li>\n";

					} //end while
					mysqli_stmt_close($stmt3);

					echo "</ul>\n";
					echo "</li>\n";

				}else{
					if (strpos($link2[$num][$num2], 'http') !== false)
						echo "<li><a href=\"".$link2[$num][$num2]."\" target=\"".$target2[$num][$num2]."\">".$menu2[$num][$num2]."</a></li>\n";
					else
						echo "<li><a href=\"../".$link2[$num][$num2]."\" target=\"".$target2[$num][$num2]."\">".$menu2[$num][$num2]."</a></li>\n";
				}
				
			}			
			echo "</ul>\n";
            echo "</li>\n";

		}else{ //End of submenu 1 -------------
			if (strpos($link1[$num], 'http') !== false)			
				echo "<li><a href=\"".$link1[$num]."\" target=\"".$target[$num]."\">".$menu[$num]."</a></li>\n";
			else
				echo "<li><a href=\"../".$link1[$num]."\" target=\"".$target[$num]."\">".$menu[$num]."</a></li>\n";
		}
		
	} //End of for looping -----------

?>										</ul>
									</nav>	
								    <!--<a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>-->
									<div class="right-bar-icon rs-offcanvas-link text-right">
                                        <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Menu End -->
			</header>
			<!--Header End-->

		</div>
        <!--Full width header End-->
		
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title"><?php echo $titleHTML;?></h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="../index">Home</a>
		                        </li>
		                        <li>
		                            <a class="active" href="index">Courses</a>
		                        </li>
		                        <li><?php echo $titleHTML;?></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

		<!-- Courses Details Start -->
        <div class="rs-courses-details pt-50">
            <div class="container">
				<div class="abt-title">
				    <h2><?php echo $titleHTML;?></h2>
				</div>
				
                <div class="row mb-30">
                    <div class="col-lg-8 col-md-12">
                	    <div class="detail-img">
                	        <img src="<?php echo $imgpath;?> " alt="Courses Images" />
                	    </div>
                	    
                	    <div class="course-desc">
                	    	
                            <?php echo str_replace($urlsite, "../", $contentHTML);?>
                            <!-- Testimonial End -->

                	    </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar-area">
                            <!--<div class="search-box">
                                <h3 class="title">Search Courses</h3>
                                <div class="box-search">
                                    <input class="form-control" placeholder="Search Here ..." name="srch-term" id="srch-term" type="text">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>-->
                            <div class="cate-box">
                                <ul>
                                    <li>
                                        <table width="100%"><tr><td><strong>LENGTH</strong></td><td align="right"><?php echo $length;?> weeks</td></tr></table> 
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>TIME COMMITMENT</strong></td><td align="right"><?php echo $commitment;?> hours/week</td></tr></table>
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>PACE</strong></td><td align="right"><?php echo $pace;?></td></tr></table>
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>SUBJECT</strong></td><td align="right"><?php echo $subject;?></td></tr></table>
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>PLATFORM</strong></td><td align="right"><?php echo $platform;?></td></tr></table>
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>START</strong></td><td align="right"><?php echo $months[$bulans];?> <?php echo $haris;?>, <?php echo $tahuns;?></td></tr></table>
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>ENDS</strong></td><td align="right"><?php echo $months[$bulane];?> <?php echo $harie;?>, <?php echo $tahune;?></td></tr></table>
                                    </li>
                                    <li>
                                        <table width="100%"><tr><td><strong>CREDIT</strong></td><td align="right"><?php echo $credit;?> </td></tr></table>
                                    </li>
                                </ul>
								
                            </div>
                            
							<!--<div class="course-instructor">
                	    				<h3 class="instructor-title">COURSE <span class="primary-color">INSTRUCTOR</span></h3>
                	    				<div class="instructor-inner">
                	    					<div class="instructor-img">
                	    						<img src="images/teachers/13.jpg" alt="Teachers Images" />
                	    					</div>
                	    					<div class="instructor-body">
                	    						<h3 class="name">Dr. Khan</h3>
                	    						<span class="designation">Senior Lecturer</span>
                	    						<div class="social-icon">
                	    							<a href="#"><i class="fa fa-facebook"></i></a>
                	    							<a href="#"><i class="fa fa-twitter"></i></a>
                	    							<a href="#"><i class="fa fa-google-plus"></i></a>
                	    							<a href="#"><i class="fa fa-linkedin"></i></a>
                	    						</div>
                	    					</div>
                	    				</div>
                	    				<div class="short-desc">
                	    					<p>Dr. Khan is currently a senior lecturer in the Department of Chemistry, Universiti Malaya, Malaysia. He also held a Professor (Visiting) position at the China Uni of Mining and Technology, China.</p>
                	    				</div>
        	    						<div class="apply-btn">
        	    							<a href="#">Learn More</a>
        	    						</div>
                	    			
                	    			
                	    		
                	    	</div>-->
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
		
        <!-- Calltoaction Start -->
        <div id="rs-calltoaction" class="rs-calltoaction sec-spacer bg4">
            <div class="container">
                <div class="rs-cta-inner text-center">
				    <a class="cta-button" href="<?php echo $urlenroll;?>" target="_blank">ENROLL NOW</a>
				</div>
            </div>
        </div>
        <!-- Calltoaction End -->
		
        <!-- Courses Details End -->

		<!-- About Us Start -->
        <!--<div id="rs-about-me" class="rs-about sec-spacer">
            <div class="container">
                    <div class="col-lg-12 col-md-12 mb-pt-50">
                    	<div class="des">
                    		<?php //echo $contentHTML;?>
							<?php echo str_replace($urlsite, "../", $contentHTML);?>
                    	</div>                    	
                  </div>
                </div>
            </div>
        </div>-->
        <!-- About Us End -->


<!-- Products Start -->
<?php
$qrylink = mysqli_prepare($dbi, "SELECT title, link, target, icon FROM weblinks where SiteId = ? and active = '1' order by ordering");
mysqli_stmt_bind_param($qrylink, "s", $SiteId);
mysqli_stmt_execute($qrylink);
mysqli_stmt_bind_result($qrylink, $datalink["title"], $datalink["link"], $datalink["target"], $datalink["icon"]);
$bilpaut = 0;
while (mysqli_stmt_fetch($qrylink)) {
	if($bilpaut==0){
		echo "<div id=\"rs-products\" class=\"rs-products sec-spacer sec-color\">
			<div class=\"container\">
				<div class=\"sec-title mb-50 text-center\">
					<h2>Highlights</h2>      
				</div>				
				<div class=\"rs-carousel owl-carousel\" data-loop=\"true\" data-items=\"4\" data-margin=\"30\" data-autoplay=\"false\" data-autoplay-timeout=\"5000\" data-smart-speed=\"1200\" data-dots=\"true\" data-nav=\"true\" data-nav-speed=\"false\" data-mobile-device=\"1\" data-mobile-device-nav=\"true\" data-mobile-device-dots=\"true\" data-ipad-device=\"2\" data-ipad-device-nav=\"true\" data-ipad-device-dots=\"true\" data-md-device=\"4\" data-md-device-nav=\"true\" data-md-device-dots=\"true\">\n";
		
	}
	$tajuklink = $datalink["title"];
	$pautanlink = $datalink["link"];
	$targetlink = $datalink["target"];
	$iconlink = $datalink["icon"];

	echo "<div class=\"product-item\">\n";
	echo "	<div class=\"product-img\">\n";

	if (strpos($pautanlink, 'http') !== false)
		echo "		<a href=\"".$pautanlink."\" target=\"".$targetlink."\">\n";
	else
		echo "		<a href=\"../".$pautanlink."\" target=\"".$targetlink."\">\n";
	
	echo "			<img src=\"../Image/Pautan/".$iconlink."\" alt=\"\" />\n";
	echo "		</a>\n";
	echo "	</div>\n";

	if (strpos($pautanlink, 'http') !== false)
		echo "	<h4 class=\"product-title\"><a href=\"".$pautanlink."\" target=\"".$targetlink."\">".$tajuklink."</a></h4>\n";
	else
		echo "	<h4 class=\"product-title\"><a href=\"../".$pautanlink."\" target=\"".$targetlink."\">".$tajuklink."</a></h4>\n";		
		
	echo "</div>\n";
	
	$bilpaut++;
}
mysqli_stmt_close($qrylink);
		
if($bilpaut>0){
	echo "		</div>\n";
	echo "	</div>\n";
	echo "</div>\n";
}

?>
	
        <!-- Footer Start -->
        <footer id="rs-footer" class="bg3 rs-footer">
			
			<!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
						<?php echo str_replace($urlsite, "../", $SiteFooter);?>
						<?php echo htmlspecialchars_decode($EmbeddedCodeHead);?>
                    </div>
                                                   
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p>© 2021 <a href="https://www.um.edu.my" target="_blank" class="kaki">Universiti Malaya</a>. All Rights Reserved&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://um.edu.my/privacy-policy/privacy-policy" target="_blank" class="kaki">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://um.edu.my/privacy-policy/site-credits" target="_blank" class="kaki">Site Credits</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://um.edu.my/privacy-policy/disclaimer" target="_blank" class="kaki">Disclaimer</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://um.edu.my/privacy-policy/security-policy" target="_blank" class="kaki">Security Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../sitemap" class="kaki">Sitemap</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
						<form action="../search" method="get" name="searchform">
                            <div class="form-group">
								<input class="form-control" placeholder="Search a keyword and hit enter..." type="search" name="q" id="search">
								<input type="hidden" name="sa" value="Search" />
								<input type="hidden" name="cx" value="<?php echo $SearchID;?>" />
								<input type="hidden" name="ie" value="UTF-8" />
                            </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- modernizr js -->
        <script src="../js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="../js/jquery.min.js"></script>
        <!-- bootstrap js -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="../js/owl.carousel.min.js"></script>
		<!-- slick.min js -->
        <script src="../js/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="../js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="../js/imagesloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="../js/wow.min.js"></script>
        <!-- counter top js -->
        <script src="../js/waypoints.min.js"></script>
        <script src="../js/jquery.counterup.min.js"></script>
        <!-- magnific popup -->
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <!-- rsmenu js -->
        <script src="../js/rsmenu-main.js"></script>
        <!-- plugins js -->
        <script src="../js/plugins.js"></script>
        <!-- main js -->
        <script src="../js/main.js"></script>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 08:11:02 GMT -->
</html>