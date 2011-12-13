<?php defined('_JEXEC') or die('Restricted access'); 
/**
* Copyright:	Copyright (C) 2010 Cory Webb Media, LLC. All rights reserved.
* License:	GNU/GPL
* Motif is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
?>

	<?php message(); ?>
	<div id="frame" class="outline">
		<?php if (getLogo()) : ?><img src="<?php echo getLogo(); ?>" alt="<?php echo getSiteName(); ?>" align="middle" /><?php endif; ?>
		<h1>
			<?php echo getSiteName(); ?>
		</h1>
	<p>
		<?php echo $mainframe->getCfg('offline_message'); ?>
	</p>
	<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
	<?php JHTML::_('script', 'openid.js'); ?>
<?php endif; ?>
	<form action="index.php" method="post" name="login" id="form-login">
	<fieldset class="input">
		<p id="form-login-username">
			<label for="username"><?php echo JText::_('Username') ?></label><br />
			<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('Username') ?>" size="18" />
		</p>
		<p id="form-login-password">
			<label for="passwd"><?php echo JText::_('Password') ?></label><br />
			<input type="password" name="passwd" class="inputbox" size="18" alt="<?php echo JText::_('Password') ?>" id="passwd" />
		</p>
		<p id="form-login-remember">
			<label for="remember"><?php echo JText::_('Remember me') ?></label>
			<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('Remember me') ?>" id="remember" />
		</p>
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('LOGIN') ?>" />
	</fieldset>
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="login" />
	<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
	</form>
	</div>
