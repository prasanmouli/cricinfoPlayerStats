<?php

class cricinfoPlayerStats{

  private $_url, $_html, $_dataArray, $_playerName, $_batTitles, $_bowlTitles, $_bowlArray, $_batArray, $_bat, $_bowl;

  public function __construct($player_url=""){
  
    if($player_url){
      $this->check_url($player_url);
      $this->_url = $player_url;
    }
    
    $this->_playerName = "Player Name";
    $this->_batArray = array();    
    $this->_bowlArray = array();
    $this->_dataArray = array();
    
    $this->_batTitles = array('Format', 'Matches', 'Innings', 'Not-Outs', 'Runs', 'High-Score', 'Average', 'BF', 'Strike-Rate', '100s', '50s', '4s', '6s', 'Catches', 'Stumpings');
    
    $this->_bowlTitles = array('Format', 'Matches', 'Innings', 'Balls', 'Runs', 'Wickets', 'BBI', 'BBM', 'Average', 'Economy', 'Strike-Rate', '4w', '5w', '10w');
  
  }

  //function to set or modify url of the player stats page
  public function set_url($player_url){
  
    if($player_url){
      $this->check_url($player_url);
      $this->_url = $player_url;	 
    }
    else 
      $this->throw_errors("No URL given");

  } 

  private function check_url($player_url){
    
    //check:a general pattern needs to be written for string match  
    if(!strpos($player_url, "cricinfo.com/ci/content/player/"))
	$this->throw_errors("Invalid URL for a cricinfo player profile. <br/>Example URL : <a href='http://www.espncricinfo.com/india/content/player/35320.html'>Sachin Tendulkar</a>");
  
  }


  //using the curl library in PHP
  private function curl(){
    
      //create curl resource
      $ch = curl_init();
 
      //set url
      curl_setopt($ch, CURLOPT_URL, $this->_url);
    
      //instead of printing the response to the browser, return it as string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

      //$data contains the html response of $_url
      $data = curl_exec($ch);
      
      //check:improvement with strpos match needs to done
      if($data == false || strpos($data, "Page Not Found"))
        $this->throw_errors("A HTML response could not be obtained. Please check if the URL is valid.");
      else
        $this->_html = $data;
      
      curl_close($ch);
  
  }

  //parse the player profile page and retrieve career stats
  public function html_parser(){

    $this->curl();
    
    //using DOM extension in PHP
 
    //initialise DOM parser and load html
    $dom = new DOMDocument;
    @$dom->loadHTML($this->_html);
    
    /* 
       The statistics table consists of 12 rows of information - 6 each on the player's (batting&fielding) and (bowling) under the className 'data1'.
       Batting & Fielding: Cateogry,Mat,Inns,NO,Runs,HS,Ave,BF,SR,100s,50s,4s,6s,Ct
       Bowling: Category,Mat,Inns,Balls,Runs,Wkts,BBI,BBM,Ave,Econ,SR,4w,5w,10w 
    */
    
    //a count on the number of rows of information 
    $i = 1;
    
    $names = $dom->getElementsByTagName('h1');
    foreach($names as $playerName){
      if(!strpos($playerName->firstChild->nodeValue, 'Players')) 
        $this->_playerName = $playerName->firstChild->nodeValue;
    }

    $tags = $dom->getElementsByTagName('tr');
    foreach($tags as $tag){
      
      $this->_bat = array();
      $this->_bowl = array();        

      //select those rows with class name 'data1'
      if($tag->getAttribute('class') == 'data1' && $i<13){
        
        //get the child nodes
        $abs = $tag->childNodes;

        foreach($abs as $index => $ab)
	  if($ab->nodeType == 1){
          $ab->nodeValue = str_replace("/"," for ",$ab->nodeValue);
                        
            if($i<=6){
              $key = $this->_batTitles[$index/2];
              $this->_bat[$key] = $ab->nodeValue;
            }
            else{
              $key = $this->_bowlTitles[$index/2];
	      $this->_bowl[$key] = $ab->nodeValue;
            }

          }	  

        if($i<=6)
          array_push($this->_batArray, $this->_bat);
	else
          array_push($this->_bowlArray, $this->_bowl);
	 
        $i++;

      }
    }
    $this->_dataArray['Batting and Fielding'] = $this->_batArray;
    $this->_dataArray['Bowling'] = $this->_bowlArray;
    return json_encode($this->_dataArray);

  }

  //Save the json string in a file
  public function create_file($filePath = "", $json = ""){
    if($filePath == "")
      $filePath = str_replace(" ","-",$this->_playerName).".json";
    if(fopen($filePath, 'w') == false)
      $this->throw_errors("Cannot open file. Check if the path is valid.");
    fwrite($f = fopen($filePath, 'w'), $json);
    fclose($f);
  } 

  //display errors
  private function throw_errors($msg){
    if($msg)
      die("<b>Error:</b> ".$msg);
  }

}

?>