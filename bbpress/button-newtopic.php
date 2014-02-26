<?php

/**
 * Newtopic 
 *
 * @package bbPress
 * @subpackage Serverus
 */

?>
<?php if ( bbp_current_user_can_access_create_topic_form() ) { ?>

	<a href="#" class="btn btn-default bbp-new-topic-btn">New Topic</a>

	<script>
		$(document).ready(function () {

			function toggle_topic_form() {
				$(".bbp-topic-form").toggleClass("show hidden");
			}

			$(".bbp-new-topic-btn").click( function(e){
				e.preventDefault();
				toggle_topic_form();
				$(this).toggleClass("active");
			});

		});
	</script>

<?php } elseif ( bbp_is_forum_closed() ) { ?>

	<a href="#" class="btn btn-default bbp-new-topic-btn disabled">Forum closed</a>

<?php } elseif ( is_user_logged_in() ) { ?>

	<!-- CANNOT CREATE NEW TOPICS -->
	<a href="#" class="btn btn-default bbp-new-topic-btn disabled">New Topic</a>

<?php } else { ?>

	<!-- NOT LOGGED IN -->
	<a href="#" class="btn btn-default bbp-new-topic-btn disabled">New Topic</a>

<?php } ?>