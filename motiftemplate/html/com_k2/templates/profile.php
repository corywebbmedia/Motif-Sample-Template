<?php
/**
 * @version		$Id: profile.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<script type="text/javascript">
	//<![CDATA[
	window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) {
			return ($('password').value == value);
		});
	});
	//]]>
</script>

<!-- K2 user profile form -->

<form action="<?php echo JRoute::_( 'index.php' ); ?>" enctype="multipart/form-data" method="post" name="userform" autocomplete="off" class="form-validate">

  <?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
  <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
  	<?php echo $this->escape($this->params->get('page_title')); ?>
  </div>
  <?php endif; ?>

  <div id="k2Container" class="k2AccountPage">

	  <table cellpadding="0" cellspacing="0">
	  	<tr>
	  		<th colspan="2"><?php echo JText::_( 'Account details' ); ?></th>
	  	</tr>
	    <tr>
      	<td><label for="username"> <?php echo JText::_( 'User Name' ); ?></label></td>
      	<td><span><?php echo $this->user->get('username');?></span></td>
	    </tr>
	    <tr>
	      <td><label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?></label></td>
	      <td><input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' )); ?>" class="inputbox required" maxlength="50" /></td>
	    </tr>
	    <tr>
	      <td><label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?></label></td>
	      <td><input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" /></td>
	    </tr>
	    <tr>
	      <td><label id="pwmsg" for="password"><?php echo JText::_( 'Password' ); ?></label></td>
	      <td><input class="inputbox validate-password" type="password" id="password" name="password" size="40" value="" /></td>
	    </tr>
	    <tr>
	      <td><label id="pw2msg" for="password2"><?php echo JText::_( 'Verify Password' ); ?></label></td>
	      <td><input class="inputbox validate-passverify" type="password" id="password2" name="password2" size="40" value="" /></td>
	    </tr>
	  	<tr>
	  		<th colspan="2"><?php echo JText::_( 'Personal details' ); ?></th>
	  	</tr>
			<!-- K2 attached fields -->
	    <tr>
	      <td><label id="gendermsg" for="gender"><?php echo JText::_( 'Gender' ); ?></label></td>
	      <td><?php echo $this->lists['gender']; ?></td>
	    </tr>
	    <tr>
	      <td><label id="descriptionmsg" for="description"><?php echo JText::_( 'Description' ); ?></label></td>
	      <td><?php echo $this->editor; ?></td>
	    </tr>
	    <tr>
	      <td><label id="imagemsg" for="image"><?php echo JText::_( 'User image (avatar)' ); ?></label></td>
	      <td><input type="file" id="image" name="image"/>
	        <?php if ($this->K2User->image): ?>

	        <img class="k2AccountPageImage" src="<?php echo JURI::root().'media/k2/users/'.$this->K2User->image; ?>" alt="<?php echo $this->user->name; ?>" />
	        <input type="checkbox" name="del_image" id="del_image" />
	        <label for="del_image"><?php echo JText::_('Check this box to delete current image or just upload a new image to replace the existing one'); ?></label>
	        <?php endif; ?></td>
	    </tr>
	    <tr>
	      <td><label id="urlmsg" for="url"><?php echo JText::_( 'URL' ); ?></label></td>
	      <td><input type="text" size="50" value="<?php echo $this->K2User->url; ?>" name="url" id="url"/></td>
	    </tr>
	    <?php if(count(array_filter($this->K2Plugins))): ?>
	    <!-- K2 Plugin attached fields -->
	  	<tr>
	  		<th colspan="2"><?php echo JText::_( 'Additional details' ); ?></th>
	  	</tr>
	    <?php foreach ($this->K2Plugins as $K2Plugin):?>
	    <?php if(!is_null($K2Plugin)):?>
	    <tr>
	      <td colspan="2"><?php echo $K2Plugin->fields; ?></td>
	    </tr>
	    <?php endif;?>
	    <?php endforeach; ?>
	    <?php endif; ?>
	  </table>

		<?php if(isset($this->params)): ?>
		<h3><?php echo JText::_( 'Administrative details' ); ?></h3>
		<?php echo $this->params->render('params'); ?>
		<?php endif; ?>

	  <div class="k2AccountPageUpdate">
	  	<button class="button validate" type="submit" onclick="submitbutton( this.form );return false;">
	  		<?php echo JText::_('Save'); ?>
	  	</button>
	  </div>

  </div>

  <input type="hidden" name="username" value="<?php echo $this->user->get('username');?>" />
  <input type="hidden" name="id" value="<?php echo $this->user->get('id');?>" />
  <input type="hidden" name="gid" value="<?php echo $this->user->get('gid');?>" />
  <input type="hidden" name="option" value="com_user" />
  <input type="hidden" name="task" value="save" />
  <input type="hidden" name="K2UserForm" value="1" />
  <?php echo JHTML::_( 'form.token' ); ?>
</form>
