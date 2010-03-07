<ul>
<?php foreach ($list as $node) { ?>
  <li><a href="<?php print url('node/'. $node->nid); ?>"><?php print $node->title; ?></a></li>
<?php } ?>
</ul>
