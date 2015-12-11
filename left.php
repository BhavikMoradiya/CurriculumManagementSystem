<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>


<script type="text/javascript">


ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: false, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: true, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

<style type="text/css">

.arrowlistmenu{
width: 250px; /*width of accordion menu*/
}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 14px Arial;
color: #FFFFFF;
background: #990000 url(titlebar.png) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 10px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;
}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
background-image: url(titlebar-active.png);
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 20px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 5px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li a{
color: #990000 ;
background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
display: block;
padding: 2px 0;
padding-left: 19px; /*link text is indented 19px*/
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 90%;
}

.arrowlistmenu ul li a:visited{
color: #990000 ;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #e6b800;
background-color: #F2f2f2f2;
}

.style1 {font-size: 16px}
.style2 {font-size: large}
.style6 {
	color: #990000;
	font-weight: bold;
}
body {
	background-color: #F5F5F5;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head>

<body>

<div class="arrowlistmenu">

<h3 align="center" class="menuheader expandable style1">general</h3>
<ul class="categoryitems">
<li>
  <div align="center">
    <div align="center"><a href="admincp.php" target="main">Main Page </a></div>
    <a href="changepassword.php" target="main">Change Pssword </a></div>
</li>
<li>
  <div align="center"><a href="addnewmajor.php" target="main"><strong>Add New Major</strong></a>
    <div align="center"><a href="view_modfiymajor.php" target="main"><strong>View/Modify Majors </strong></a>
        <div align="center"></div>
    </div>
    <div align="center"></div>
  </div>
</li>
</ul>

<a href="index.php" target="rightFram"></a>
<h3 align="center" class="menuheader expandable">Curriculum Tracking </h3>
<ul class="categoryitems">
<li>
  <div align="center"><a href="addnewcur.php" target="main" class="style2">Add New Curriculums </a></div>
</li>
<li>
  <div align="center"><a href="view_modify.php" target="main">View/Modify Curriculums </a></div>
</li>
<li>
  <div align="center"><a href="addcourse.php" target="main">Add Courses </a>
    <div align="center"><a href="view_modify_courses.php" target="main"> View/Modify Courses</a>
      <div align="center"><a href="add_prereq_to_courses.php" target="main">Add Prerequisites To Courses </a></div>
    </div>
    <div align="center"></div>
  </div>
  <div align="center"><a href="addcourstocurriculum.php" target="main">Add Courses To Curriculums</a></div>
  </li>
</ul>


<h3 align="center" class="menuheader expandable style1">Course Description Tracking</h3>
<ul class="categoryitems">
<li>
  <div align="center"><a href="addcourstocurriculum.php" target="main" >Add/Tracking Course  Description</a></div>
</li>

</ul>
  <h3 align="center" class="menuheader expandable style1">reports center </h3>
  <ul class="categoryitems">
  <li>
   <div align="center"><a href="display_courses_needed.php" target="main" >Display  Courses Needed</a>  </div>  
  </ul>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>