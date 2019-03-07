<?php

namespace Roots\Sage\Widgets;

// Include new widget classes
$includes = [
  'lib/widgets/columns.php',
  // 'lib/widgets/editors-picks.php',
  // 'lib/widgets/events.php',
  'lib/widgets/features-recent-news.php',
  'lib/widgets/perspectives.php',
  // 'lib/widgets/press-releases.php',
  'lib/widgets/social-media.php',
  'lib/widgets/videos.php',
  'lib/widgets/spotlight.php',
  'lib/widgets/news.php',
  // 'lib/widgets/reach-nc-polls.php',
  'lib/widgets/reach.php',
  'lib/widgets/ad-blocks-3.php',
  'lib/widgets/ad-block.php',
  // 'lib/widgets/reach-questions.php',
  'lib/widgets/email-signup.php'
];

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Register widgets
add_action( 'widgets_init', function(){
  register_widget( __NAMESPACE__ . '\\EdNC_Columns' );
  // register_widget( __NAMESPACE__ . '\\Editors_Picks' );
  // register_widget( __NAMESPACE__ . '\\Events' );
  register_widget( __NAMESPACE__ . '\\Features_Recent_News' );
  register_widget( __NAMESPACE__ . '\\Perspectives' );
  register_widget( __NAMESPACE__ . '\\News' );
  register_widget( __NAMESPACE__ . '\\Videos' );
  // register_widget( __NAMESPACE__ . '\\Press_Releases' );
  register_widget( __NAMESPACE__ . '\\Ad_Blocks_3' );
  register_widget( __NAMESPACE__ . '\\Ad_Block' );
  register_widget( __NAMESPACE__ . '\\Social_Media' );
  register_widget( __NAMESPACE__ . '\\Spotlight' );
  register_widget( __NAMESPACE__ . '\\Reach' );
  // register_widget( __NAMESPACE__ . '\\Reach_NC_Polls' );
  // register_widget( __NAMESPACE__ . '\\Reach_Questions');
  register_widget( __NAMESPACE__ . '\\Email_Signup');
});
