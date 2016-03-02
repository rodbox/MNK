<?php

foreach ($d as $key => $tool) {
	$opt[$tool] = $tool;
}


form::select("tool",$opt); ?>