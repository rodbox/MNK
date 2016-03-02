<?php

foreach ($d as $key => $menu) {
	$opt[$menu] = $menu;
}


form::select("menu",$opt); ?>