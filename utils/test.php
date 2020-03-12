<?php

require_once('User.php');

$res = authUser('ardk','ark');

print $res==null;
