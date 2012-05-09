<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to JagFRAME</title>
		<style type="text/css">
			* {
				margin: 0px;
				padding: 0px;
				font-family: Ariel, Helvetica;
			}
			body {
				background: #DDD;
			}
			#wrapper {
				position: relative;
				margin: 0 auto;
				background: #EEE;
				width: 698px;
				min-height: 500px;
				padding: 20px;
			}
			
			#welcome {
				display: block;
				text-align: center;
				margin-bottom: 20px;
			}
			
			#version {
				position: absolute;
				bottom: 20px;
				right: 20px;
				
				font-size: 10px;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
		
			<h1 id="welcome">
				Welcome to JagFRAME!
			</h1>
			
			<p>JagFRAME is a small, simple to use unassuming PHP MVC 
			(Model > View Controller) Framework, designed to help you maintain 
			organization of your files, get off the ground running with a high
			level of built in functionality, while maintaining a very tiny
			footprint in filesize and memory usage.<br /><br />
			To get started, you already have! You can start using JagFRAME 
			straight away. If you need Database access, check out 
			/config/config.php to enable and set that up, otherwise, please enjoy!
			<br /><br />Sincerely,<br /><br /><br /><br />Kyle</p>
			
			<div id="version">
				v.0.9.5
			</div>
		</div>
	</body>
</html>
