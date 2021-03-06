<?php

//////////////////////////////////////////////////////////////////////////////80
// Atheos Dialog
//////////////////////////////////////////////////////////////////////////////80
// Copyright (c) Atheos & Liam Siira (Atheos.io), distributed as-is and without
// warranty under the MIT License. See [root]/LICENSE.md for more.
// This information must remain intact.
//////////////////////////////////////////////////////////////////////////////80
// Authors: Atheos Team, @hlsiira
//////////////////////////////////////////////////////////////////////////////80

require_once('common.php');

//////////////////////////////////////////////////////////////////////////////80
// Verify Session or Key
//////////////////////////////////////////////////////////////////////////////80
Common::checkSession();

$action = Common::data("action");
$target = Common::data("target");

if (!$action || !$target) {
	Common::sendJSON("E401m"); die;
}

if (file_exists("components/$target/dialog.php")) {
	require("components/$target/dialog.php");
} elseif (file_exists("plugins/$target/dialog.php")) {
	require("plugins/$target/dialog.php");
} else {
	Common::sendJSON("E401m"); die;
}