            <div id="intro">
              <h2><?php print $title; ?></h2>
              <p><?php print $intro; ?></p>
            </div>
            <div id="blog">
              <h2>Our Latest Ramblings</h2>

            <?php 
              if (count($news)) {            
                foreach ($news as $node) {
            ?>
              <div class="blogItem">
                <h3><a href="<?php print url('node/'. $node->nid); ?>"><?php print check_plain($node->title); ?></a></h3>
                <p class="blogDate"><?php print format_date($node->created); ?> <small>by <?php print $node->name; ?></small></p>
                <?php print $node->teaser ? $node->teaser : $node->body; ?>
                <?php if ($node->links) { ?><div class="links"><?php print $node->links; ?></div><?php }; ?>
              </div>
            <?php
                }
              }
            ?>
            </div>
