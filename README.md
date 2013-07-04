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
		{
			"Format": "ODIs",
			"Matches": "463",
			"Innings": "452",
			"Not-Outs": "41",
			"Runs": "18426",
			"High-Score": "200*",
			"Average": "44.83",
			"BF": "21367",
			"Strike-Rate": "86.23",
			"100s": "49",
			"50s": "96",
			"4s": "2016",
			"6s": "195",
			"Catches": "140",
			"Stumpings": "0"
		},
		{
			"Format": "T20Is",
			"Matches": "1",
			"Innings": "1",
			"Not-Outs": "0",
			"Runs": "10",
			"High-Score": "10",
			"Average": "10.00",
			"BF": "12",
			"Strike-Rate": "83.33",
			"100s": "0",
			"50s": "0",
			"4s": "2",
			"6s": "0",
			"Catches": "1",
			"Stumpings": "0"
		},
		{
			"Format": "First-class",
			"Matches": "307",
			"Innings": "486",
			"Not-Outs": "50",
			"Runs": "25228",
			"High-Score": "248*",
			"Average": "57.86",
			"BF": "",
			"Strike-Rate": "",
			"100s": "81",
			"50s": "114",
			"4s": "",
			"6s": "",
			"Catches": "186",
			"Stumpings": "0"
		},
		{
			"Format": "List A",
			"Matches": "551",
			"Innings": "538",
			"Not-Outs": "55",
			"Runs": "21999",
			"High-Score": "200*",
			"Average": "45.54",
			"BF": "",
			"Strike-Rate": "",
			"100s": "60",
			"50s": "114",
			"4s": "",
			"6s": "",
			"Catches": "175",
			"Stumpings": "0"
		},
		{
			"Format": "Twenty20",
			"Matches": "91",
			"Innings": "91",
			"Not-Outs": "11",
			"Runs": "2727",
			"High-Score": "100*",
			"Average": "34.08",
			"BF": "2239",
			"Strike-Rate": "121.79",
			"100s": "1",
			"50s": "16",
			"4s": "351",
			"6s": "36",
			"Catches": "28",
			"Stumpings": "0"
		}
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
		{
			"Format": "ODIs",
			"Matches": "463",
			"Innings": "270",
			"Balls": "8054",
			"Runs": "6850",
			"Wickets": "154",
			"BBI": "5 for 32",
			"BBM": "5 for 32",
			"Average": "44.48",
			"Economy": "5.10",
			"Strike-Rate": "52.2",
			"4w": "4",
			"5w": "2",
			"10w": "0"
		},
		{
			"Format": "T20Is",
			"Matches": "1",
			"Innings": "1",
			"Balls": "15",
			"Runs": "12",
			"Wickets": "1",
			"BBI": "1 for 12",
			"BBM": "1 for 12",
			"Average": "12.00",
			"Economy": "4.80",
			"Strike-Rate": "15.0",
			"4w": "0",
			"5w": "0",
			"10w": "0"
		},
		{
			"Format": "First-class",
			"Matches": "307",
			"Innings": "",
			"Balls": "7563",
			"Runs": "4353",
			"Wickets": "70",
			"BBI": "3 for 10",
			"BBM": "",
			"Average": "62.18",
			"Economy": "3.45",
			"Strike-Rate": "108.0",
			"4w": "",
			"5w": "0",
			"10w": "0"
		},
		{
			"Format": "List A",
			"Matches": "551",
			"Innings": "",
			"Balls": "10230",
			"Runs": "8478",
			"Wickets": "201",
			"BBI": "5 for 32",
			"BBM": "5 for 32",
			"Average": "42.17",
			"Economy": "4.97",
			"Strike-Rate": "50.8",
			"4w": "4",
			"5w": "2",
			"10w": "0"
		},
		{
			"Format": "Twenty20",
			"Matches": "91",
			"Innings": "8",
			"Balls": "93",
			"Runs": "123",
			"Wickets": "2",
			"BBI": "1 for 12",
			"BBM": "1 for 12",
			"Average": "61.50",
			"Economy": "7.93",
			"Strike-Rate": "46.5",
			"4w": "0",
			"5w": "0",
			"10w": "0"
		}
	]
}</code></pre>
