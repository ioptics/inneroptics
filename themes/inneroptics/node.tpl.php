      <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
        <?php if ($picture) {
          print $picture;
        }?>
        <?php if ($page == 0) { ?><h4 class="title"><a href="<?php print $node_url?>"><?php print $title?></a></h4><?php }; ?>    
        <div class="content-wrapper">
        <h2><?php print $title?></h2>
        <?php print $content?>
        </div>
      </div>
