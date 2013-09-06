<!DOCTYPE html >
<html>
<head>
   
    
    <script src="RGraph.common.core.js" ></script>
    <script src="RGraph.thermometer.js" ></script>
    
    <title>COMPOSE Basic Sensor Demo</title>
    
    <meta name="keywords" content="COMPOSE Basic Sensor Demo" />
    <meta name="description" content="COMPOSE Basic Sensor Demo" />
    <meta name="robots" content="noindex,nofollow" />
</head>
<body>

    <h1>COMPOSE Realtime Temperature Info</h1>

    <canvas id="cvs" width="100" height="400">[No canvas support]</canvas>
    
    <script>

	var temp_value = 0;
        function DrawMe()
        {
            var thermometer = new RGraph.Thermometer('cvs', 0,60,Number(temp_value))
            .Set('chart.value.label.decimals', 2)
	    .Set('chart.shadow',false)
	    .Draw();


	    thermometer = new RGraph.Thermometer('cvs', 0,60,Number(temp_value))
            .Set('chart.value.label.decimals', 2)
            .Set('chart.shadow',true)
            .Draw();

	     setTimeout('update()', 10000);
        }
	window.onload=update();
	

	function update()
	{
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		 }
		xmlhttp.onreadystatechange=function()
  		{
  			if (xmlhttp.readyState==4 && xmlhttp.status==200)
   			 {
    				temp_value  = xmlhttp.responseText;a
				DrawMe();
   			 }
 		 }
		xmlhttp.open("GET","hackathon.php",true);
		xmlhttp.send();
	}	





    </script>

    <p>        
    </p>

</body>
</html>
