<?php
/**
* Copyright:	Copyright (C) 2010 Cory Webb Media, LLC. All rights reserved.
* License:	GNU/GPL
* Motif is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

defined('_JEXEC') or die('Restricted access');
/* INCLUDE FRAMEWORK CLASS */
global $motif;
require_once(JPATH_SITE.'plugins'.DS.'system'.DS.'motif'.DS.'motif.php');
$motif = new motif($this, 'component');
$motif->load();
?>