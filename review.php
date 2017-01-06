<!DOCTYPE html>
<html>
<head>
   <title>Scholarships</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php
//$scraped_website=file_get_contents("http://www.gograd.org/financial-aid/scholarships/women/");
//echo "start"."<br>";
     // Defining the basic cURL function
    function curl($url) {
        // Assigning cURL options to an array
        $options = Array(
            CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
            CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
            CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
            CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
            CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
            CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
            CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
        );
         
        $ch = curl_init();  // Initialising cURL 
        curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL 
        return $data;   // Returning the data from the function 
    }
   $scraped_website = curl("https://yocket.in/universities/reviews/2659/alcorn-state-university/engineering");
   echo $scraped_website;
   if (strpos($scraped_website, 'verdict') !== false) {
    echo 'text';
}
   //echo $scraped_website;   // Executing our curl function to scrape the webpage http://www.example.com and return the results into the $scraped_website variable
   //Defining the basic scraping function
   $datanext=$scraped_website;
   $count=1;
   $start='<h3>Verdict</h3>';
   $end='</p>';
   $data=$scraped_website;
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
        //echo $data."<br>";
      
    
   }
   echo $data;
   echo '<script type="text/javascript">alert("It works.");</script>';
?>
</body>
</html>