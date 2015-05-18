<?php
/*
= Footer for LuxCal event calendar pages - Normal =

© Copyright 2009-2014 LuxSoft - www.LuxSoft.eu
*/
?>
</div>
<footer class="noPrint">
<?php
echo "<span class='floatR'><a href='http://www.luxsoft.eu' target='_blank'><span title='V".LCV."'>p</span>owered by <span class='footLB'>Lux</span><span class='footLR'>Soft</span></a></span>\n";
if ($privs > 0 and $set['rssFeed']) {
	echo "<span class='floatL'><a href='rssfeed.php".$cF."' title='RSS feed' target='_blank'>RSS</a></span>\n";
}
?>
</footer>
</body>
</html>
