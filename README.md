cricinfoPlayerStats
===================

cricinfoPlayerStats is a parser written in PHP to scrape a player's career statistics from <a href='http://www.espncricinfo.com'>Cricinfo's</a> player profiles and convert into json.

<h2>Purpose</h2>

<ul>
<li>Get the HTML snippets from player stats table and convert these elements into json</li>
</ul>

Note: This is a parser written very specifically for the cricinfo website and not a general webpage parser. 

(Additional features like scraping the player's latest individual scores, contributions against a particular team, etc will be added soon.)  

<h2>Examples</h2>

<h3>Initializing Class</h3>
<pre><code>include('parser.php');
$cp = new cricinfoPlayerStats();</code></pre>

<h3>Setting a URL</h3>
The URL can be set in one of the following two ways.
<ul>
<li>Passing the URL during the class initialization itself OR
<pre><code>$cp = new cricinfoPlayerStats('http://www.espncricinfo.com/ci/content/player/35320.html');</code></pre></li>

<li>Calling the set_url() function
<pre><code>$cp->set_url('http://www.espncricinfo.com/ci/content/player/35320.html');</code></pre></li>
</ul>

<h3>Scraping the Stats table</h3>

<pre><code>$jsonObj = $cp->html_parser();</code></pre>

<pre><code>$cp->create_file('/somepath/stats.json', $jsonObj); //Default path is './player-name.json'</code></pre>

json output:
<pre><code>{
  "Batting and Fielding": [
  	{
			"Format": "Tests",
			"Matches": "198",
			"Innings": "327",
			"Not-Outs": "33",
			"Runs": "15837",
			"High-Score": "248*",
			"Average": "53.86",
			"BF": "",
			"Strike-Rate": "",
			"100s": "51",
			"50s": "67",
			"4s": "",
			"6s": "69",
			"Catches": "115",
			"Stumpings": "0"
		},
		...
		...
		...
	],
	"Bowling": [
		{
			"Format": "Tests",
			"Matches": "198",
			"Innings": "142",
			"Balls": "4198",
			"Runs": "2461",
			"Wickets": "45",
			"BBI": "3 for 10",
			"BBM": "3 for 14",
			"Average": "54.68",
			"Economy": "3.51",
			"Strike-Rate": "93.2",
			"4w": "0",
			"5w": "0",
			"10w": "0"
		},
		...
		...
		...
	]
}</code></pre>
