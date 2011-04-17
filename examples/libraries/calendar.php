<?php

require_once('../../Smoke.class.php');

$smoke = smoke();

$link_data = array(
               3  => 'http://example.com/news/article/2006/03/',
               7  => 'http://example.com/news/article/2006/07/',
               13 => 'http://example.com/news/article/2006/13/',
               26 => 'http://example.com/news/article/2006/26/'
);

$out = <<< HTML
<p>
	<h2>Current Date</h2> 
	{$smoke->calendar->generate()}
</p>

<p>
</p>
<p>
	<h2>February 2005</h2> 
	{$smoke->calendar->generate(2005, 2)}
</p>
<p>
	<h2>Links</h2> 
	{$smoke->calendar->generate(2005, 2, $link_data)}
</p>
HTML;

// See the Code Igniter documentation at:
// 
// http://codeigniter.com/user_guide/libraries/calendar.html
// 
// for more examples
// 
// Note: "Showing Next/Previous Month Links" will not work
// 
// Due to URI routing being disabled in Smoke

smoke()->out($out);
smoke()->display();

?>

