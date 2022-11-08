<?php
	
	$row_setting= $db->rawQueryOne("select * from #_setting limit 0,1");

	$logo = $db->rawQueryOne("select photo_$lang as photo from #_bannerqc where hienthi=1 and type=? limit 0,1",array('logo'));

	$bannertop = $db->rawQueryOne("select photo_$lang as photo from #_bannerqc where hienthi=1 and type=? limit 0,1",array('banner_top'));

	$bannerbottom = $db->rawQueryOne("select photo_$lang as photo from #_bannerqc where hienthi=1 and type=? limit 0,1",array('banner_bottom'));



?>