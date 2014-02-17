<?php
add_action( 'after_setup_theme', 'twelvewbt_setup', 11 );

function twelvewbt_setup() {
	// De-register nav menu setup in parent theme
	unregister_nav_menu( 'primary' );
	remove_theme_support( 'menus' );
	remove_theme_support( 'custom-background' );

	// Add theme specific CSS
	wp_enqueue_style( '12wbt', get_stylesheet_directory_uri() . '/12wbt.css', false, '2012-09-11' );

	// Add theme specific Javascript
	wp_enqueue_script( '12wbt', get_stylesheet_directory_uri() . '/12wbt.js', array( 'jquery' ), '2012-07-07' );
}

add_filter( 'get_comment_time', 'twelvewbt_get_comment_time' );

function twelvewbt_get_comment_time($date) {
	return twelvewbt_get_time_since(strtotime($date));
}

function twentyeleven_posted_on() {
	printf( __( '<small><span class="sep">Posted by </span><span class="by-author"><span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span> <span class="sep">on</span> <a href="%4$s" title="%5$s" rel="bookmark"><time class="entry-date" datetime="%6$s" pubdate>%7$s</time></a></small>', 'twentyeleven' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author(),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}

function twentyeleven_content_nav( $html_id ) {
	if ($html_id == 'nav-above') {
		return;
	}

	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<?php
				$avatar_size = 68;
				if ( '0' != $comment->comment_parent )
					$avatar_size = 39;

				echo get_avatar( $comment, $avatar_size );
			?>

			<div class="comment-content">

				<?php comment_text(); ?>

				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
							/* translators: 1: comment author, 2: date and time */
							printf( __( '%1$s %2$s', 'twentyeleven' ),
								sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
								sprintf( '<time pubdate datetime="%1$s"><small>%2$s</small></time>',
									get_comment_time( 'c' ),
									sprintf( __( '%1$s', 'twentyeleven' ), get_comment_time() )
								)
							);
						?>

						<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-author .vcard -->

					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
						<br />
					<?php endif; ?>

				</footer>

				<span class="stalk"></span>

			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}


function twelvewbt_get_time_since( $older_date, $newer_date = false ) {

	// Setup the strings
	$unknown_text = 'sometime';
	$right_now_text = 'right now';
	$ago_text = '%s ago';

	// array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , 'year',   'years'   ),
		array( 60 * 60 * 24 * 30 ,  'month',  'months'  ),
		array( 60 * 60 * 24 * 7,    'week',   'weeks'   ),
		array( 60 * 60 * 24 ,       'day',    'days'    ),
		array( 60 * 60 ,            'hour',   'hours'   ),
		array( 60 ,                 'minute', 'minutes' ),
		array( 1,                   'second', 'seconds' )
	);

	if ( !empty( $older_date ) && !is_numeric( $older_date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $older_date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $older_date ) );
		$older_date  = gmmktime( (int) $time_chunks[1], (int) $time_chunks[2], (int) $time_chunks[3], (int) $date_chunks[1], (int) $date_chunks[2], (int) $date_chunks[0] );
	}

	// $newer_date will equal false if we want to know the time elapsed
	// between a date and the current time. $newer_date will have a value if
	// we want to work out time elapsed between two known dates.
	$newer_date = ( !$newer_date ) ? strtotime( current_time( 'mysql' ) ) : $newer_date;

	// Difference in seconds
	$since = $newer_date - $older_date;

	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since ) {
		$output = $unknown_text;

	// We only want to output two chunks of time here, eg:
	//     x years, xx months
	//     x days, xx hours
	// so there's only two bits of calculation below:
	} else {

		// Step one: the first chunk
		for ( $i = 0, $j = count( $chunks ); $i < $j; ++$i ) {
			$seconds = $chunks[$i][0];

			// Finding the biggest chunk (if the chunk fits, break)
			$count = floor( $since / $seconds );
			if ( 0 != $count ) {
				break;
			}
		}

		// If $i iterates all the way to $j, then the event happened 0 seconds ago
		if ( !isset( $chunks[$i] ) ) {
			$output = $right_now_text;

		} else {

			// Set output var
			$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];

			// Step two: the second chunk
			if ( $i + 2 < $j ) {
				$seconds2 = $chunks[$i + 1][0];
				$name2    = $chunks[$i + 1][1];
				$count2   = floor( ( $since - ( $seconds * $count ) ) / $seconds2 );

				// Add to output var
				if ( 0 != $count2 ) {
					$output .= ( 1 == $count2 ) ? _x( ',', 'Separator in time since', 'wordpress' ) . ' 1 '. $name2 : _x( ',', 'Separator in time since', 'wordpress' ) . ' ' . $count2 . ' ' . $chunks[$i + 1][2];
				}
			}

			// No output, so happened right now
			if ( ! (int) trim( $output ) ) {
				$output = $right_now_text;
			}
		}
	}

	// Append 'ago' to the end of time-since if not 'right now'
	if ( $output != $right_now_text ) {
		$output = sprintf( $ago_text, $output );
	}

	return $output;
}

function twentyeleven_header_style()
{
	return false;
}


// create custom plugin settings menu
add_action('admin_menu', 'twelvewbt_create_menu');

function twelvewbt_create_menu()
{
	// Create new top-level menu
	add_menu_page('12WBT Theme Settings', '12WBT Settings', 'administrator', 'twelvewbt_settings_page', 'twelvewbt_settings_page');

	//call register settings function
	add_action('admin_init', 'twelvewbt_register_settings');
}

function twelvewbt_settings_page()
{
?>
<div class="wrap">
	<h2>12WBT Theme Settings</h2>
	<form method="post" action="options.php">

		<?php
		settings_fields('twelvewbt-settings-group');
		do_settings_fields('twelvewbt', 'default');
		?>

		<table class="form-table">

			<tr valign="top">
				<th scope="row">Blog type</th>
				<td>
					<select name="twelvewbt_blog_type">
						<?php
							$blog_types = array(
								'blog'  => 'Blog',
								'media' => 'Media'
							);
							$saved_option = get_option('twelvewbt_blog_type');
							foreach ($blog_types as $_k => $_v) {
								$_s = false;
								if ($saved_option == $_k) {
									$_s = ' selected="selected"';
								}
						?>
						<option value="<?php echo($_k); ?>"<?php echo($_s); ?>><?php echo($_v); ?></option>
						<?php
							}
							unset($blog_types, $_k, $_v, $_s, $saved_option);
						?>
					</select>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Public signups status</th>
				<td>
					<select name="twelvewbt_public_signups">
						<?php
							$signup_states = array(
								'opened' => 'Opened',
								'closed' => 'Closed'
							);
							$saved_option = get_option('twelvewbt_public_signups');
							foreach ($signup_states as $_k => $_v) {
								$_s = false;
								if ($saved_option == $_k) {
									$_s = ' selected="selected"';
								}
						?>
						<option value="<?php echo($_k); ?>"<?php echo($_s); ?>><?php echo($_v); ?></option>
						<?php
							}
							unset($signup_states, $_k, $_v, $_s, $saved_option);
						?>
					</select>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Public signups subscription code</th>
				<td>
					<input name="twelvewbt_subscribe_code" type="text" id="twelvewbt_subscribe_code" value="<?php echo esc_attr(get_option('twelvewbt_subscribe_code')); ?>" class="regular-text code" />
					<p class="description">This is the unique code for the list at Campaign Monitor</p>
				</td>
			</tr>

		</table>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
<?php
}

function twelvewbt_register_settings()
{
	register_setting('twelvewbt-settings-group', 'twelvewbt_blog_type');
	register_setting('twelvewbt-settings-group', 'twelvewbt_public_signups');
	register_setting('twelvewbt-settings-group', 'twelvewbt_subscribe_code');
}



require_once(dirname(__FILE__) . '/widgets.php');

