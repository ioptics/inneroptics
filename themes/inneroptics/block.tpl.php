<?php
  switch ($block->region) {
    default: ?>
  <div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
    <h3 class="section"><?php print $block->subject; ?></h3>
    <div class="content"><?php print $block->content; ?></div>
  </div>
<?php break;
    case 'bottom':?>
  <div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
    <div class="padding">
      <h3><?php print $block->subject; ?></h3>
      <?php print $block->content; ?>
    </div>
  </div>
<?php break;
    case 'right': 
    if ($block->subject == 'Navigation') {
      if ($user->uid) { ?>
  <div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
    <h3><?php print $block->subject; ?></h3>
    <div class="padding">
      <?php print $block->content; ?>
    </div>
  </div>
<?php }
      else { ?>
      
<?php }
    } 
  else { ?>    
  <div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
    <h3><?php print $block->subject; ?></h3>
    <div class="padding">
      <?php print $block->content; ?>
    </div>
  </div>
<?php } ?>
<?php break;
  }
?>
