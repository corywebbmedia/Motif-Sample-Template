<?php
/**
 * @version		$Id: generic.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Generic Layout -->
<div id="k2Container" class="genericView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if($this->params->get('userFeed')): ?>
	<!-- RSS feed icon -->
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('Subscribe to this RSS feed'); ?>">
			<span><?php echo JText::_('Subscribe to this RSS feed'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<?php if(count($this->items)): ?>
	<div class="genericItemList">
		<?php foreach($this->items as $item): ?>

		<!-- Start K2 Item Layout -->
		<div class="genericItemView">

			<div class="genericItemHeader">
				<?php if($item->params->get('genericItemDateCreated')): ?>
				<!-- Date created -->
				<span class="genericItemDateCreated">
					<?php echo JHTML::_('date', $item->created , JText::_('DATE_FORMAT_LC2')); ?>
				</span>
				<?php endif; ?>
			
			  <?php if($item->params->get('genericItemTitle')): ?>
			  <!-- Item title -->
			  <h2 class="genericItemTitle">
			  	<?php if ($item->params->get('genericItemTitleLinked')): ?>
					<a href="<?php echo $item->link; ?>">
			  		<?php echo $item->title; ?>
			  	</a>
			  	<?php else: ?>
			  	<?php echo $item->title; ?>
			  	<?php endif; ?>
			  </h2>
			  <?php endif; ?>
		  </div>

		  <div class="genericItemBody">
			  <?php if($item->params->get('genericItemImage') && !empty($item->imageGeneric)): ?>
			  <!-- Item Image -->
			  <div class="genericItemImageBlock">
				  <span class="genericItemImage">
				    <a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>">
				    	<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
				    </a>
				  </span>
				  <div class="clr"></div>
			  </div>
			  <?php endif; ?>
			  
			  <?php if($item->params->get('genericItemIntroText')): ?>
			  <!-- Item introtext -->
			  <div class="genericItemIntroText">
			  	<?php echo $item->introtext; ?>
			  </div>
			  <?php endif; ?>

			  <div class="clr"></div>
		  </div>
		  
		  <div class="clr"></div>
		  
		  <?php if($item->params->get('genericItemExtraFields') && count($item->extra_fields)): ?>
		  <!-- Item extra fields -->  
		  <div class="genericItemExtraFields">
		  	<h4><?php echo JText::_('Additional Info'); ?></h4>
		  	<ul>
				<?php foreach ($item->extra_fields as $key=>$extraField): ?>
				<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
					<span class="genericItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
					<span class="genericItemExtraFieldsValue"><?php echo $extraField->value; ?></span>		
				</li>
				<?php endforeach; ?>
				</ul>
		    <div class="clr"></div>
		  </div>
		  <?php endif; ?>
		  
			<?php if($item->params->get('genericItemCategory')): ?>
			<!-- Item category name -->
			<div class="genericItemCategory">
				<span><?php echo JText::_('Published in'); ?></span>
				<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
			</div>
			<?php endif; ?>
			
			<?php if ($item->params->get('genericItemReadMore')): ?>
			<!-- Item "read more..." link -->
			<div class="genericItemReadMore">
				<a class="k2ReadMore" href="<?php echo $item->link; ?>">
					<?php echo JText::_('Read more...'); ?>
				</a>
			</div>
			<?php endif; ?>

			<div class="clr"></div>
		</div>
		<!-- End K2 Item Layout -->
		
		<?php endforeach; ?>
	</div>

	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="k2Pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<div class="clr"></div>
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>

	<?php endif; ?>
	
</div>
<!-- End K2 Generic Layout -->
