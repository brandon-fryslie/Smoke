<?php

require_once('../../Smoke.class.php');

// Strings to test with
$a = "All";
$b = "Your";
$c = "Base";
$d = "Are";
$e = "Belong";
$f = "To";
$g = "Us";

// Set a mark
// Can compute the difference between any two marks with $smoke->benchmark->elapsed_time
smoke()->benchmark->mark('single_quote_concat_start');

for ($i = 0; $i < 100000; $i++) { $tmp = $a.' '.$b.' '.$c.' '.$d.' '.$e.' '.$f.' '.$g; }

smoke()->benchmark->mark('single_quote_concat_end');

smoke()->benchmark->mark('double_quote_concat_start');

for ($i = 0; $i < 100000; $i++) { $tmp = $a." ".$b." ".$c." ".$d." ".$e." ".$f." ".$g; }

smoke()->benchmark->mark('double_quote_concat_end');

smoke()->benchmark->mark('double_quote_embed_start');

for ($i = 0; $i < 100000; $i++) { $tmp = "$a $b $c $d $e $f $g"; }

smoke()->benchmark->mark('double_quote_embed_end');

$smoke = smoke();

$out = <<< HTML
<p>
	Single Quote Concat: {$smoke->benchmark->elapsed_time('single_quote_concat_start', 'single_quote_concat_end')}
</p>

<p>
	Double Quote Concat: {$smoke->benchmark->elapsed_time('double_quote_concat_start', 'double_quote_concat_end')}
</p>
<p>
	Double Quote Embed: {$smoke->benchmark->elapsed_time('double_quote_embed_start', 'double_quote_embed_end')}
</p>
<p>
	Total String Processing Time: {$smoke->benchmark->elapsed_time('single_quote_concat_start', 'double_quote_embed_end')}
</p>
<!-- 
	Note: Elasped Time is a psuedo variable only available using Code Igniter's output class
	Use smoke()->out() and smoke()->display() to run your output through the output class
 -->
<p>
	Total Elapsed Time: {elapsed_time}
</p>
HTML;

smoke()->out($out);
smoke()->display();

?>

