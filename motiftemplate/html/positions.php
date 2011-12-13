<?php
/**
* Copyright:	Copyright (C) 2010 Cory Webb Media, LLC. All rights reserved.
* License:	GNU/GPL
* Motif is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/


/* File used for defining module position chrome */
defined('_JEXEC') or die('Restricted access');

function positions_none( $positions ) {
	foreach($positions as $position)
	{
		modulePosition($position);
	}
}

function positions_allornothing( $positions ) {
	foreach($positions as $position) {
		if (!hasModules($position['name'])) {
			return;
		}
	}
	foreach($positions as $position)
	{
		echo '<div class="position">';
		modulePosition($position);
		echo '</div>';
	}
}

function positions_columns( $positions ) {
	?>
		<div class="columns<?php echo count($positions); ?>">
		<?php foreach($positions as $position) { ?>
			<div class="column">
				<?php modulePosition($position); ?>
			</div>
		<?php } ?>
		</div>
	<?php
}