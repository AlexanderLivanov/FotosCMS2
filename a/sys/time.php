<?php

$dt = new DateTime();
$tz = new DateTimeZone("Europe/Moscow");
$dt->setTimezone($tz); 
$current_time = $dt->format('d.m.Y, H:i:s');