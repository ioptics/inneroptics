<?php 
  if (count($nodes)) {
    foreach ($nodes as $node) {
      if (count($node->files)) {
        foreach ($node->files as $file) {
          if (eregi('_thumb', $file->filename)) {
            $src = base_path() . $file->filepath;

            print("<div class=\"featured-pic\"><img alt=\"$node->title\" src=\"$src\" /></div>");
            $li = 1;
          }           
        }
      }

  ?>
  <div class="featured-text"><h4><a href="<?php print url('node/'. $node->nid); ?>"><?php print $node->title; ?></a></h4>
  <?php print $node->teaser; ?>
  <a class="read-more" href="<?php print url('node/'. $node->nid); ?>">read more</a>
  </div>
<?php
    }

  }
  else {
    print $view->block_empty;
  }
?>
