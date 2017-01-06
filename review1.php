<!DOCTYPE html>
<html>
<head>
	<title>Scholarships</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div id="scholar">
    
</div>
<?php
$scraped_website=file_get_contents("https://yocket.in/universities/reviews/2658/alabama-a-and-m-university/engineering");
//echo $scraped_website;
$data=$scraped_website;
$count=1;
$start='<h3>Verdict</h3>';
$end='</p>';
   while($count--){
     // Scraping downloaded dara in $scraped_page for content between <title> and </title> tags
      // Echoing $scraped data, should show "The Internet Movie Database (IMDb)"
    // document.get_called_class(scholarship_wmn-block
     $data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
      //$datanext=substr($data,$stop+strlen($end));
      //echo $datanext;
      $data=substr($data,0,$stop);
       // $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
    //    echo $data;
      
    
   }
   //echo $data;
   $data=stristr($data," ");
$review = $data;
//echo $review;
$command = 'curl -X POST --form "text='.$review.'" --form "language=eng" --form "apikey=21c1a3d0-f57e-490d-8b18-72c26518c6d1" https://api.havenondemand.com/1/api/sync/analyzesentiment/v2';
//echo $command;
$output = shell_exec($command);
//echo "<pre>$output</pre>";
//echo $output;
?>

<script type="text/javascript">
//  var x='curl -X POST --form "file=@C:\xampp\htdocs\lady\upload\Akanksha_Diwedy.docx" --form "extract_metadata=true" --form "extract_text=true" --form "extract_xmlattributes=false" --form "apikey=8a96043b-61ae-4b02-9dca-e835655bc159" https://api.havenondemand.com/1/api/sync/extracttext/v1';
//  console.log(x);
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