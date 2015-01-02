<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<title>Webcams in Hamburg</title>
		<style type="text/css">
			@font-face
			{
				font-family: "Roadgeek2005SeriesD";
				src: url("http://panic.com/fonts/Roadgeek 2005 Series D/Roadgeek 2005 Series D.otf");
			}
			
			body, *
			{
			
			}
			body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td
			{ 
				margin: 0;
				padding: 0;
			}
				
			fieldset,img
			{ 
				border: 0;
			}
			
				
			/* Settin' up the page */
			
			html, body, #main
			{
				overflow: hidden; /* */
			}
			
			body
			{
				color: white;
				font-family: 'Roadgeek2005SeriesD', sans-serif;
				font-size: 20px;
				line-height: 24px;
			}
			body, html, #main
			{
				background: transparent !important;
			}
			
			img {
				width: 300px;
			}
			#main {
				margin:10px;
			}
			
		</style>
	


	</head>
	
	<body onload="changeCam();">
		<div id="main">
			<img src="http://www.hamburger-rathausmarkt.de/rathausmarkt.jpg" id="cam" alt="Webcam Live Image" />
		</div>
		<script type="text/javascript" charset="utf-8">
		var cams =  new Array(
			"http://www.hamburger-rathausmarkt.de/rathausmarkt.jpg", 
			"http://my.dal.biz/cgi-bin/webcam/getpics.cgi?Cam=west", 
			"http://my.dal.biz/cgi-bin/webcam/getpics.cgi?Cam=south", 
			"http://my.dal.biz/cgi-bin/webcam/getpics.cgi?Cam=west", 
			"http://www.capsandiego.de/cam1/hugesize.jpg", 
			"http://bruhn-shipbrokers.de/webcam/webcam.jpg"
			);
			
		var index = 0;
		window.setInterval(function () {changeCam()}, 10000);
		function changeCam(){
			if(index + 1 > cams.length){
				index = 0;
			}
			document.getElementById("cam").src = cams[index];
			index++;
		}		
		</script>
	</body>
</html>
