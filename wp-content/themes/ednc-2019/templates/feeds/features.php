<?php
/**
* Featured Stories Feed Template
*/

use Roots\Sage\Media;

// check day of week
$whichday = current_time('w');
// get today's date
$today = getdate();

// if today is Monday, set "yesterday" to Friday
if ($whichday == 1) {
  $yesterday = getdate(strtotime('-3 days'));
} else {
  $yesterday = getdate(strtotime('-1 days'));
}

// Get all featured posts between "yesterday" night and this morning
$features = new WP_Query([
  'posts_per_page' => -1,
  'post_type' => array('post', 'map', 'edtalk'),
  'tax_query' => array(
    array(
      'taxonomy' => 'appearance',
      'field' => 'slug',
      'terms' => 'featured'
    )
  ),
  'date_query' => array(
    array(
      'after' => "{$yesterday['year']}-{$yesterday['mon']}-{$yesterday['mday']} 8:59:59",
      'before' => "{$today['year']}-{$today['mon']}-{$today['mday']} 8:00:00"
    )
  )
]);

header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>
<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
xmlns:media="http://search.yahoo.com/mrss/"
<?php do_action('rss2_ns'); ?>>

<channel>
  <title><?php bloginfo_rss('name'); ?> - Featured Posts Feed</title>
  <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
  <link><?php bloginfo_rss('url') ?></link>
  <description><?php bloginfo_rss('description') ?></description>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
  <language>en-us</language>
  <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
  <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
  <?php do_action('rss2_head'); ?>
  <?php while($features->have_posts()) : $features->the_post(); ?>
    <item>
      <title><?php the_title_rss(); ?></title>
      <link><?php the_permalink_rss(); ?></link>
      <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
      <dc:creator><?php
      if ( function_exists( 'coauthors_posts_links' ) ) {
        coauthors();
      } else {
        the_author();
      }
      ?></dc:creator>
      <guid isPermaLink="false"><?php the_guid(); ?></guid>
      <?php
      $featured_image = Media\get_featured_image('small');
      ?>
      <media:content url="<?php echo $featured_image; ?>" width="564" height="239" medium="image" />
      <description><![CDATA[<?php get_template_part('templates/components/labels', 'feed'); ?>]]></description>
      <content:encoded><![CDATA[<?php the_advanced_excerpt('length=20&length_type=words&add_link=0&finish=exact'); ?>]]></content:encoded>
      <?php rss_enclosure(); ?>
      <?php do_action('rss2_item'); ?>
    </item>
  <?php endwhile; wp_reset_query(); ?>
</channel>

</rss>
