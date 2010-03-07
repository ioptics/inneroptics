            <div id="intro">
              <h2><?php print $title; ?></h2>
              <p><?php print $intro; ?></p>
            </div>

            <?php 
              if (count($items)) {            
                foreach ($items as $node) {
            ?>
              <div class="contentItem">
                <h3><a href="<?php print url('node/'. $node->nid); ?>"><?php print check_plain($node->title); ?></a></h3>
                <?php print $node->teaser ? $node->teaser : $node->body; ?>
                <?php if ($node->links) { ?><div class="links"><?php print $node->links; ?></div><?php }; ?>
              </div>
            <?php
                }
              }
            ?>
