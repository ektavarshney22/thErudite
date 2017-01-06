<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style type="text/css">
	body{
		background-image: url("php-mysql.jpg");
	}
	.btn-primary-outline {
  border: 1px solid #fff;
  border-radius: 8px;
  color: #fff;
  font-size: 14px;
  font-weight: 600;
  padding: 15px 125px;
  margin-left: 70px;
  background-color: transparent;
  text-transform: uppercase;
}

.btn-primary-outline:hover {
  color: #fff;
  background-color: #017fb5;
}
</style>
</head>
<body>

<bold>
<div id="scholar" style="color:white">
	
</div>
</bold>
<?php
$review = "bad";
$command = 'curl -X POST --form "text='.$review.'" --form "language=eng" --form "apikey=21c1a3d0-f57e-490d-8b18-72c26518c6d1" https://api.havenondemand.com/1/api/sync/analyzesentiment/v2';
$output = shell_exec($command);
//echo "<pre>$output</pre>";

?>

<script type="text/javascript">
//	var x='curl -X POST --form "file=@C:\xampp\htdocs\lady\upload\Akanksha_Diwedy.docx" --form "extract_metadata=true" --form "extract_text=true" --form "extract_xmlattributes=false" --form "apikey=8a96043b-61ae-4b02-9dca-e835655bc159" https://api.havenondemand.com/1/api/sync/extracttext/v1';
//	console.log(x);
var x="";
x = '<?php echo $output; ?>';
var obj = JSON.parse(x);
//console.log(obj);
for(var key in obj)
 	{
 		obj1=obj[key];
 		for( var key2 in obj1)
 		{
 			for( var key3 in obj1[key2])
 			{
 				//document.getElementById("user").innerHTML=obj1[key2][reference];

 				if (key3=="aggregate")

        {
          for(var key4 in obj1[key2][key3]){

            if(key4=="score"){
              var scre = obj1[key2][key3][key4];
              if(scre>0){
                document.getElementById("scholar").innerHTML="pos with score = "+scre;
              }
              else{
                document.getElementById("scholar").innerHTML="neg with score = "+scre;
              }
            }
            //console.log(key4);
          }
        
        }
       // console.log(key3);
 			}
 		}
 	}
</script>
</body>
</html>