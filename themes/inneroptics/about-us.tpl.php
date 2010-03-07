            <?php 
              if (count($items)) {            
                foreach ($items as $node) {
            ?>
              <div class="contentItem">                
                <?php print $node->body; ?>
              </div>
            <?php
                }
              }
            ?>
