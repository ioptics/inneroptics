<?php
  switch ($node->title) {
    default: ?>
      <div class="node">
        <?php if ($page == 0) { ?><h4 class="title"><a href="<?php print $node_url?>"><?php print $title?></a></h4><?php }; ?>   
        <div class="content-wrapper">
        <h2><?php print $title?></h2>
        <?php print $content?>
        </div>
      </div>
<?php break;
    case 'Our Work': ?>
      <div class="node">
        <?php print $content?>
        </div>
<?php break;
    case 'About Us': ?>
      <div class="node">
        <?php print $content?>
        </div>  
<?php break;
  }
?>
