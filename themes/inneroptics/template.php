<?php

function _inneroptics_prepare_nodes($nodes) {
  foreach ($nodes as $item) {
    $node = node_load(array('nid' => $item->nid));
    $node = node_prepare($node, $node->teaser);
    
    $node->readmore = (strlen($node->teaser) < strlen($node->body));
    
    if ($node->readmore) {
      $links = array(l(t('read more'), "node/$node->nid", array('title' => t('Read the rest of this posting.'), 'class' => 'read-more')));
      $node->links = theme('links', $links);
    } 
    
    $_nodes[] = $node;
  }
  
  return $_nodes;
}

function phptemplate_menu_item_link($item, $link_item) {
  
  $class = $item['title'];
  $class = strtolower($class);
  $class = str_replace(' ', '-', $class);

  return '            <li class="'. $class .'">'. active_link('<span>'. $item['title'] .'</span>', $link_item['path'], ($item['description'] != '') ? array('title' => $item['description']) : array(), NULL, NULL, FALSE, TRUE) ."</li>\n";
}

function active_link($text, $path, $attributes = array(), $query = NULL, $fragment = NULL, $absolute = FALSE, $html = FALSE) {
  $active_url = check_url(url($_GET['q']));
  $link_url = check_url(url($path, $query, $fragment, $absolute));
  if ($link_url == $active_url) {
    if (isset($attributes['class'])) {
      $attributes['class'] .= ' active';
    }
    else {
      $attributes['class'] = 'active';
    }
  } else if (strpos( $active_url, $link_url) === 0 ) {
    if (isset($attributes['class'])) {
      $attributes['class'] .= ' active';
    }
    else {
      $attributes['class'] = 'active';
    }
  }

return l($text, $path, $attributes, $query, $fragment, $absolute, $html);
}

function phptemplate_views_view_frontpage($view, $type, $nodes, $level = NULL, $args = NULL) {
  
  $nodes = _inneroptics_prepare_nodes($nodes);

  $vars = array('news'  => $nodes, 
                'title' => $view->page_title, 
                'intro' => $view->page_header,
                'view'  => $view);
  return _phptemplate_callback('frontpage', $vars);
}

function phptemplate_views_view_blog($view, $type, $nodes, $level = NULL, $args = NULL) {

  $nodes = _inneroptics_prepare_nodes($nodes);

  $vars = array('news' => $nodes, 
                'title' => $view->page_title, 
                'intro' => $view->page_header,
                'view'  => $view);
  return _phptemplate_callback('blog', $vars);
}

function phptemplate_views_view_latestproject($view, $type, $nodes, $level = NULL, $args = NULL) {

  $nodes = _inneroptics_prepare_nodes($nodes);

  if ($type == 'block') {
    return _phptemplate_callback('latest_project_block', array('view' => $view, 'nodes' => $nodes));
  }
}

function phptemplate_views_view_ourwork($view, $type, $nodes, $level = NULL, $args = NULL) {

  foreach ($nodes as $node) {
    $items[] = node_load(array('nid' => $node->nid));
  }

  $vars = array('items' => $items, 
                'title' => $view->page_title, 
                'intro' => $view->page_header,
                'view'  => $view);
  return _phptemplate_callback('our_work', $vars);
}

function phptemplate_views_view_aboutus($view, $type, $nodes, $level = NULL, $args = NULL) {

  foreach ($nodes as $node) {
    $items[] = node_load(array('nid' => $node->nid));
  }

  $vars = array('items' => $items, 
                'title' => $view->page_title, 
                'intro' => $view->page_header,
                'view'  => $view);
  return _phptemplate_callback('about-us', $vars);
}

function phptemplate_views_view_featuredprojects($view, $type, $nodes, $level = NULL, $args = NULL) {

  foreach ($nodes as $node) {
    $projects[] = node_load(array('nid' => $node->nid));
  }

  if ($type == 'block') {
    return _phptemplate_callback('featured_projects_block', array('view' => $view, 'nodes' => $projects));
  }
}

function phptemplate_views_view_articles($view, $type, $nodes, $level = NULL, $args = NULL) {
  switch ($type) {
    case 'block':
      return phptemplate_views_footer_lists($view, $type, $nodes, $level, $args);
    break;
    case 'page':
      $nodes = _inneroptics_prepare_nodes($nodes);

      $vars = array('items' => $nodes, 
                    'title' => $view->page_title, 
                    'intro' => $view->page_header,
                    'view'  => $view);
      return _phptemplate_callback('articles', $vars);
    break;
  }
}

function phptemplate_views_view_whatwelike($view, $type, $nodes, $level = NULL, $args = NULL) {
  switch ($type) {
    case 'block':
      return phptemplate_views_footer_lists($view, $type, $nodes, $level, $args);
    break;
    case 'page':
      $nodes = _inneroptics_prepare_nodes($nodes);

      $vars = array('items' => $nodes, 
                    'title' => $view->page_title, 
                    'intro' => $view->page_header,
                    'view'  => $view);
      return _phptemplate_callback('what-we-like', $vars);
    break;
  }
}

function phptemplate_views_view_intheworks($view, $type, $nodes, $level = NULL, $args = NULL) {
  switch ($type) {
    case 'block':
      return phptemplate_views_footer_lists($view, $type, $nodes, $level, $args);
    break;
    case 'page':
      $nodes = _inneroptics_prepare_nodes($nodes);

      $vars = array('items' => $nodes, 
                    'title' => $view->page_title, 
                    'intro' => $view->page_header,
                    'view'  => $view);
      return _phptemplate_callback('in-the-works', $vars);
    break;
  }
}

function phptemplate_views_footer_lists($view, $type, $nodes, $level = NULL, $args = NULL) {
  foreach ($nodes as $node) {
    $list[] = node_load(array('nid' => $node->nid));
  }
  return _phptemplate_callback('footer_list', array('list' => $list));
}

?>
