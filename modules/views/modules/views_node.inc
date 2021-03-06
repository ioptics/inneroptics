<?php
// $Id: views_node.inc,v 1.7 2006/04/23 19:17:04 merlinofchaos Exp $

/**
 * This include file implements views functionality on behalf of node.module
 */

function node_views_tables() {
  $tables['node'] = array(
    'name' => 'node',
    'provider' => 'internal', // won't show up in external list.
    'fields' => array(
      'title' => array(
        'name' => t('Node: Title'),
        'handler' => array(
          'views_handler_field_nodelink'           => t('Normal'),
          'views_handler_field_nodelink_with_mark' => t('With updated mark')
        ),
        'sortable' => true,
        'addlfields' => array('changed'),
        'help' => t('Display the title of the node.'),
      ),
      'created' => array(
        'name' => t('Node: Created Time'),
        'sortable' => true,
        'handler' => array(
          'views_handler_field_date_small' => t('As Short Date'),
          'views_handler_field_date'       => t('As Medium Date'),
          'views_handler_field_date_large' => t('As Long Date'),
          'views_handler_field_since'      => t('As Time Ago'),
        ),
        'help' => t('Display the post time of the node.'),
      ),
      'changed' => array(
        'name' => t('Node: Updated Time'),
        'sortable' => true,
        'handler' => array(
          'views_handler_field_date_small' => t('As Short Date'),
          'views_handler_field_date'       => t('As Medium Date'),
          'views_handler_field_date_large' => t('As Long Date'),
          'views_handler_field_since'      => t('As Time Ago'),
        ),
        'help' => t('Display the last time the node was updated.'),
      ),
      'type' => array(
        'name' => t('Node: Type'),
        'handler' => 'views_handler_nodetype',
        'sortable' => true,
        'help' => t("The Node Type field will display the type of a node (for example, 'blog entry', 'forum post', 'story', etc)"),
      ),
    ),
    'sorts' => array(
      'nid' => array(
        'name' => t('Node: ID'),
        'help' => t('Sort by the database ID of the node.'),
       ),
      'created' => array(
        'name' => t('Node: Created Time'),
        'help' => t('Sort by the submission date of the node.'),
       ),
      'changed' => array(
        'name' => t('Node: Last Updated Time'),
        'help' => t('Sort by the last update date of the node.'),
      ),
      'sticky' => array(
        'name' => t('Node: Sticky'),
        'help' => t('Sort by whether or not the node is sticky. Choose descending to put sticky nodes at the top.'),
      ),
      'title' => array(
        'name' => t('Node: Title'),
        'help' => t('Sort by the node title, alphabetically'),
      ),
      'random' => array(
        'name' => t('Random'),
        'handler' => 'views_handler_sort_random',
        'help' => t('By choosing random, nodes will be ordered completely randomly. This is a good way to choose X random nodes from a group of nodes.'),
      ),
    ),
    'filters' => array(
      'status' => array(
        'name' => t('Node: Published'),
        'operator' => array('=' => 'Equals'),
        'list' => 'views_handler_operator_yesno',
        'list-type' => 'select',
        'help' => t('Filter by whether or not the node is published. This is recommended for most Views!'),
      ),
      'promote' => array(
        'name' => t('Node: Front Page'),
        'operator' => array('=' => 'Equals'),
        'list' => 'views_handler_operator_yesno',
        'list-type' => 'select',
        'help' => t('Filter by whether or not the node has been promoted to Front Page.'),
      ),
      'sticky' => array(
        'name' => t('Node: Sticky'),
        'operator' => array('=' => 'Equals'),
        'list' => 'views_handler_operator_yesno',
        'list-type' => 'select',
        'help' => t('Filter by whether or not the node is set sticky.'),
      ),
      'moderate' => array(
        'name' => t('Node: Moderated'),
        'operator' => array('=' => 'Equals'),
        'list' => 'views_handler_operator_yesno',
        'list-type' => 'select',
        'help' => t('Filter by whether or not the node is moderated.'),
      ),
      'type' => array(
        'name' => t('Node: Type'),
        'list' => 'views_handler_filter_nodetype',
        'list-type' => 'list',
        'operator' => 'views_handler_operator_or',
        'value-type' => 'array',
        'help' => t('Include or exclude nodes of the selected types.'),
      ),
      'anon' => array(
        'field' => 'uid',
        'name' => t('Node: Author is Anonymous'),
        'operator' => 'views_handler_operator_eqneq',
        'list' => 'views_handler_filter_useranon',
        'value-type' => 'array',
        'help' => t('This allows you to filter by whether or not the node author is anonymous.'),
      ),
      'currentuid' => array(
        'field' => 'uid',
        'name' => t('Node: Author is Current User'),
        'operator' => 'views_handler_operator_eqneq',
        'list' => 'views_handler_filter_usercurrent',
        'list-type' => 'select',
        'help' => t('This allows you to filter by whether or not the node was authored by the logged in user of the view.'),
      ),
      'currentuidtouched' => array(
        'field' => 'uid',
        'name' => t('Node: Current User Authored or Commented'),
        'operator' => array('=' => 'touched by'),
        'list' => 'views_handler_filter_usercurrent',
        'list-type' => 'select',
        'handler' => 'views_handler_filter_uid_touched',
        'help' => t('This allows you to filter by whether or not the logged in user authored or commented on the node.'),
      ),
      'distinct' => array(
        'name' => t('Node: Distinct'),
        'operator' => array('=' => 'is'),
        'list' => array('distinct' => 'distinct'),
        'handler' => 'views_handler_filter_distinct',
        'value-type' => 'array',
        'help' => t('This filter ensures that each node may only be listed once, even if it matches multiple criteria. Use this if multiple taxonomy matches return duplicated nodes.'),
      ),
      'title' => array(
        'name' => t('Node: Title'),
        'operator' => 'views_handler_operator_like',
        'handler' => 'views_handler_filter_like',
        'help' => t('This filter allows nodes to be filtered by their title.'),
      ),
    ),
  );

  // By default history table assumes current user.
  $tables['history'] = array(
    'name' => 'history',
    'provider' => 'internal',
    'join' => array(
      'left' => array(
        'table' => 'node',
        'field' => 'nid'
      ),
      'right' => array(
        'field' => 'nid'
      ),
      'extra' => array(
        'uid' => '***CURRENT_USER***'
      )
    ),
    'filters' => array(
      'timestamp' => array(
        'name' => t('Node: Has New Content'),
        'operator' => array('Has'),
        'list' => array('New Content'),
        'handler' => 'views_handler_filter_isnew',
        'value-type' => 'array',
        'help' => t('Including this filter will reduce the node set to nodes that have been updated or have new content since the user last read the node, as well as unread nodes.'),
      ),
    ),
  );

  return $tables;
}

function node_views_arguments() {
  $arguments = array(
    'nodetype' => array(
      'name' => t('Node: Type'),
      'handler' => 'views_handler_arg_nodetype',
      'help' => t('The node type argument allows users to filter a view by specifying the type of node.'),
    ),
    'nodeletter' => array(
      'name' => t('Node: Title'),
      'handler' => 'views_handler_arg_nodeletter',
      'option' => 'string',
      'help' => t('The argument will filter by the node title. For this argument, set the option to the number of characters, using 0 for full term; use 1 for an A/B/C style glossary.'),
    ),
    'year' => array(
      'name' => t('Node: Posted Year'),
      'handler' => 'views_handler_arg_year',
      'help' => t('This argument allows users to filter by what year the node was posted, in the form of CCYY.'),
    ),
    'month' => array(
      'name' => t('Node: Posted Month'),
      'handler' => 'views_handler_arg_month',
      'help' => t("Months are specified by the numbers 1-12. Since this argument does not specify a year, it is recommended that it usually follow a 'Year' argument."),
    ),
    'week' => array(
      'name' => t('Node: Posted Week'),
      'handler' => 'views_handler_arg_week',
      'help' => t("This allows the user to filter a view by the week number from 1-52. It is recommended this argument follow a 'Year' argument."),
    ),
    'monthyear' => array(
      'name' => t('Node: Posted Month + Year'),
      'handler' => 'views_handler_arg_monthyear',
      'help' => t('This argument combines Month and Year into a single argument, specified in the form CCYYMM.'),
    ),
    'fulldate' => array(
      'name' => t('Node: Posted Full Date'),
      'handler' => 'views_handler_arg_fulldate',
      'help' => t('This argument is a complete date in the form of CCYYMMDD.'),
    ),
    'nid' => array(
      'name' => t('Node: ID'),
      'handler' => 'views_handler_arg_nid',
      'help' => t('This argument is a single Node ID.'),
    ),
  );
  return $arguments;
}


function node_views_default_views() {

  $view = new stdClass();
  $view->name = 'frontpage';
  $view->description = t('The basic front page view.');
  $view->page = true;
  $view->url = 'frontpage';
  $view->page_title = '';
  $view->page_type = 'teaser';
  $view->use_pager = true;
  $view->nodes_per_page = variable_get('default_nodes_main', 10);
  $view->block = false;
  $view->menu = false;
  $view->breadcrumb_no_home = true;
  $view->sort = array (
    array (
      'tablename' => 'node',
      'field' => 'sticky',
      'sortorder' => 'DESC',
      'options' => '',
    ),
    array (
      'tablename' => 'node',
      'field' => 'created',
      'sortorder' => 'DESC',
      'options' => '',
    ),
  );
  $view->argument = array (
  );
  $view->field = array (
  );
  $view->filter = array (
    array (
      'tablename' => 'node',
      'field' => 'promote',
      'operator' => '=',
      'options' => '',
      'value' => '1',
    ),
    array (
      'tablename' => 'node',
      'field' => 'status',
      'operator' => '=',
      'options' => '',
      'value' => '1',
    ),
  );
  $views[$view->name] = $view;
  return $views;
}

/*
 * Format a field as a link to a node.
 */
function views_handler_field_nodelink($fieldinfo, $fielddata, $value, $data) {
  return l($value, "node/$data->nid");
}

/*
 * Format a field as a link to a 'mark', stating whether or not the node has
 * updated since it was last viewed by the user.
 */
function views_handler_field_nodelink_with_mark($fieldinfo, $fielddata, $value, $data) {
  return l($value, "node/$data->nid") .' '. theme('mark', node_mark($data->nid, $data->node_changed));
}

/*
 * Format a field as a node type.
 */
function views_handler_nodetype($fieldinfo, $fielddata, $value, $data) {
  return node_get_name($value);
}

/*
 * Format a field as a number of comments, plus the number of unread comments.
 */
function views_handler_comments_with_new($fieldinfo, $fielddata, $value, $data) {
  $comments = intval($value);
  if (module_exist('comment') && $comments && $new = comment_num_new($data->nid)) {
    $comments .= '<br />';
    $comments .= l(t('%num new', array('%num' => $new)), "node/$data->nid", NULL, NULL, 'new');
  }
  return $comments;
}

/*
 * Handle the node type argument.
 */
function views_handler_arg_nodetype($op, &$query, $argtype, $arg = '') {
  switch($op) {
    case 'summary':
      $query->add_field("type");
      $query->add_groupby("node.type");
      $fieldinfo['field'] = "node.type";
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby('node', 'type', $argtype);
      break;
    case 'filter':
      $where = db_escape_string($arg);
      $query->add_where("node.type = '$where'");
      break;
    case 'link':
      return l(node_get_name($query->type), "$arg/$query->type");
    case 'title':
      return $query;
  }
}

function views_handler_arg_nodeletter($op, &$query, $argtype, $arg = '') {
  switch($op) {
    case 'summary':
      $len = intval($arg);
      $fieldinfo['field'] = ($len <= 0 ? "node.title" : $fieldinfo['field'] = "LEFT(node.title, $len)");
      $fieldinfo['fieldname'] = 'letter';
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby('node', 'title', $argtype);
      break;
    case 'filter':
      $len = intval($argtype['options']);
      if ($len <= 0) {
        $query->add_where("node.title = '$arg'");
      } else {
        $query->add_where("LEFT(node.title, $len) = '$arg'");
      }
      break;
    case 'link':
      return l(strtoupper($query->letter), "$arg/$query->letter");
    case 'title':
      return strtoupper($query);
  }
}

function views_handler_arg_year($op, &$query, $argtype, $arg = '') {
  $timezone = _views_get_timezone();

  switch($op) {
    case 'summary':
      $fieldinfo['field'] = "YEAR(FROM_UNIXTIME(node.created+$timezone))";
      $fieldinfo['fieldname'] = 'year';
      $query->add_field('created');
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby(NULL, 'year', $argtype);
      break;
    case 'filter':
      $year = intval($arg);
      $query->add_where("YEAR(FROM_UNIXTIME(node.created+$timezone)) = $year");
      break;
    case 'link':
      return l($query->year, "$arg/$query->year");
    case 'title':
      return $query;
  }
}
function views_handler_arg_month($op, &$query, $argtype, $arg = '') {
  $timezone = _views_get_timezone();

  switch($op) {
    case 'summary':
      $fieldinfo['field'] = "MONTH(FROM_UNIXTIME(node.created+$timezone))";
      $fieldinfo['fieldname'] = 'name';
      $query->add_field('created');
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby(NULL, 'name', $argtype);
      break;
    case 'filter':
      $month = intval($arg);
      $query->add_where("MONTH(FROM_UNIXTIME(node.created+$timezone)) = $month");
      break;
    case 'link':
      return l(format_date($query->created, 'custom', 'F'), "$arg/$query->name");
    case 'title':
      return format_date(strtotime("2005${query}01"), 'custom', 'F', 0);
  }
}
function views_handler_arg_week($op, &$query, $argtype, $arg = '') {
  $timezone = _views_get_timezone();

  switch($op) {
    case 'summary':
      // The 3 makes the week 1-53, the first week of the year has at least 3 days
      $fieldinfo['field'] = "WEEK(FROM_UNIXTIME(node.created+$timezone), 3)";
      $fieldinfo['fieldname'] = "name";
      $query->add_field('created');
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby(NULL, 'name', $argtype);
      break;
    case 'filter':
      // The 3 makes the week 1-53, the first week of the year has at least 3 days
      $week = intval($arg);
      $query->add_where("WEEK(FROM_UNIXTIME(node.created+$timezone), 3) = $week");
      break;
    case 'link':
      return l("Week $query->name", "$arg/$query->name");
    case 'title':
      return $query;
  }
}
function views_handler_arg_monthyear($op, &$query, $argtype, $arg = '') {
  $timezone = _views_get_timezone();

  switch($op) {
    case 'summary':
      $fieldinfo['field'] = "DATE_FORMAT(FROM_UNIXTIME(node.created+$timezone), '%Y%m')";
      $fieldinfo['fieldname'] = 'name';
      $query->add_field('created');
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby(NULL, "name", $argtype);
      break;
    case 'filter':
      $where = db_escape_string($arg);
      $query->add_where("DATE_FORMAT(FROM_UNIXTIME(node.created+$timezone), '%Y%m') = '$where'");
      break;
    case 'link':
      return l(format_date($query->created, 'custom', 'F, Y'), "$arg/$query->name");
    case 'title':
      return format_date(strtotime("${query}01"), 'custom', 'F, Y', 0);
  }
}
function views_handler_arg_fulldate($op, &$query, $argtype, $arg = '') {
  $timezone = _views_get_timezone();

  switch($op) {
    case 'summary':
      $fieldinfo['field'] = "DATE_FORMAT(FROM_UNIXTIME(node.created+$timezone), '%Y%m%%d')";
      $fieldinfo['fieldname'] = 'name';
      $query->add_field('created');
      return $fieldinfo;
      break;
    case 'sort':
      $query->add_orderby(NULL, 'name', $argtype);
      break;
    case 'filter':
      $where = db_escape_string($arg);
      $query->add_where("DATE_FORMAT(FROM_UNIXTIME(node.created+$timezone), '%Y%m%%%%d') = '$where'");
      break;
    case 'link':
      return l(format_date($query->created, 'custom', 'F j, Y'), "$arg/$query->name");
    case 'title':
      return format_date(strtotime($query), 'custom', 'F j, Y');
  }
}

function views_handler_arg_nid($op, &$query, $argtype, $arg = '') {
  switch($op) {
    case 'summary':
      $query->add_field('nid');
      $query->add_field("title");
      $fieldinfo['field'] = 'node.nid';
      return $fieldinfo;
    case 'sort':
      // do nothing here.
      break;
    case 'filter':
      $query->add_where("node.nid = %d", $arg);
      break;
    case 'link':
      return l($query->title, "$arg/$query->nid");
    case 'title':
      $node = db_fetch_object(db_query("SELECT title FROM {node} WHERE nid=%d", $query));
      return $node->title;
  }
}


/*
 * Custom filter for new content.
 */
function views_handler_filter_isnew($op, $filter, $filterinfo, &$query) {
  global $user;
  if (!$user || !$user->uid) {
    return;
  }

  // Hey, Drupal kills old history, so nodes that haven't been updated
  // since NODE_NEW_LIMIT are bzzzzzzzt outta here!

  $limit = NODE_NEW_LIMIT;

  $query->ensure_table('history');
  if (module_exist('comment')) {
    $query->ensure_table('node_comment_statistics');
    $clause = "OR node_comment_statistics.last_comment_timestamp > $limit";
    $clause2 = "OR history.timestamp < node_comment_statistics.last_comment_timestamp";
  }

  // NULL means a history record doesn't exist. That's clearly new content.
  // Unless it's very very old content.

  $query->add_where("(history.timestamp IS NULL AND (node.changed > $limit $clause)) OR history.timestamp < node.changed $clause2");
}

/*
 * Create a list of roles.
 */
function views_handler_filter_role() {
  $rids = array();
  $result = db_query("SELECT r.rid, r.name FROM {role} r ORDER BY r.name");
  while ($obj = db_fetch_object($result)) {
    $rids[$obj->rid] = $obj->name;
  }
  return $rids;
}

/*
 * Create a list of node types.
 */
function views_handler_filter_nodetype($op) {
  $nodes = array();
  foreach (node_get_types() as $type => $name) {
    $nodes[$type] = $name;
  }
  return $nodes;
}

/*
 * Set a query to be distinct as a filter handler
 */
function views_handler_filter_distinct($op, $filter, $filterinfo, &$query) {
  $query->set_distinct();
}

function views_handler_sort_random($action, &$query, $sortinfo, $sort) {
  switch ($GLOBALS['db_type']) {
    case 'mysql':
    case 'mysqli':
      $query->add_orderby('', "rand()", "ASC");
      break;
    case 'pgsql':
      $query->add_orderby('', "random()", "ASC");
      break;
  }
}

 


