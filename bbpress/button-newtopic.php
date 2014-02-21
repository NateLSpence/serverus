<?php

/**
 * Newtopic 
 *
 * @package bbPress
 * @subpackage Serverus
 */

?>

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