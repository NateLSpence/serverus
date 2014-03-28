<!-- <?php if ( post_password_required() ) : ?>
	<?php bbp_get_template_part( 'form', 'protected' ); ?>

<?php else : ?>

	<?php if ( bbp_has_topics( array(
		'post_type'      => bbp_get_topic_post_type(), // Narrow query down to bbPress topics
		'post_parent'    => $attr['forum_id'],	       // Forum ID
		'meta_key'       => '_bbp_last_active_time',   // Make sure topic has some last activity time
		'orderby'        => 'date',              	   // 'meta_value', 'author', 'date', 'title', 'modified', 'parent', rand',
		'order'          => 'DESC',                    // 'ASC', 'DESC'
		'posts_per_page' => $attr['posts_per_page'],   // Topics per page
		'paged'          => bbp_get_paged(),           // Page Number
		's'              => $default_topic_search,     // Topic Search
		'show_stickies'  => $attr['show_stickies'],    // Ignore sticky topics?
		'max_num_pages'  => false,                     // Maximum number of pages to show
	) ) ) : ?>

		<?php //bbp_get_template_part( 'loop',       'fronttopics'    ); ?>

		<?php //bbp_get_template_part( 'pagination', 'topics'    ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

	<?php endif; ?>

<?php endif; ?> -->