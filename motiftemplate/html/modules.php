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

global $motif;
if ($motif) $motif->loadModuleChrome();

/*
 * xhtml (divs and font headder tags)
 */
function modChrome_motifxhtml($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="motifmoduletable moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php if ($module->showtitle != 0) : ?>
			<h3><?php echo $module->title; ?></h3>
		<?php endif; ?>
			<div class="modulecontent">
				<?php echo $module->content; ?>
			</div>
		</div>
	<?php endif;
}

/*
 * Module chrome that allows for rounded corners by wrapping in nested div tags
 */
function modChrome_motifrounded($module, &$params, &$attribs)
{ ?>
		<div class="motifmodule module<?php echo $params->get('moduleclass_sfx'); ?>">
			<div class="rounded_sub1">
				<div class="rounded_sub2">
					<div class="rounded_sub3">
						<?php if ($module->showtitle != 0) : ?>
							<h3><?php echo $module->title; ?></h3>
						<?php endif; ?>
					<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</div>
	<?php
}

?>
