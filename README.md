cricinfoPlayerStats
===================

cricinfoPlayerStats is a parser written in PHP to scrape a player's career statistics from <a href='http://www.espncricinfo.com'>Cricinfo's</a> player profiles and convert to a JSON object.

<h2>Functions</h2>

<ul>
<li>Get the HTML snippet from player stats table and convert these elements into json</li>
<li>A player search option if the specific profile url is not known.</li>
</ul>

Note: This is a parser written very specifically for the cricinfo website and not a general webpage parser.

<h2>Examples</h2>

<h3>Initializing Class</h3>
<pre><code>include('parser.php');
$cp = new cricinfoPlayerStats();</code></pre>

<h3>Setting a URL</h3>
The URL can be set in one of the following two ways.
<ul>
<li>Passing the URL as parameter during the class initialization itself OR
<pre><code>$cp = new cricinfoPlayerStats('http://www.espncricinfo.com/ci/content/player/35320.html');</code></pre></li>

<li>Calling the set_url() function
<pre><code>$cp->set_url('http://www.espncricinfo.com/ci/content/player/35320.html');</code></pre></li>
</ul>
