<?php

/**
 * Lost Pass 
 *
 * @package bbPress
 * @subpackage Serverus
 */

?>

	<a href="#" class="bbp-lost-pass-btn">Lost Password?</a>

	<script>
		$(document).ready(function () {

			function toggle_lostpass_form() {
				$(".serverus-lost-pass-form").toggleClass("show hidden");
			}

			$(".bbp-lost-pass-btn").click( function(e){
				e.preventDefault();
				toggle_lostpass_form();
				$(this).toggleClass("active");
			});

		});
	</script>
