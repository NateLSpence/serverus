<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form role="search" method="get" id="bbp-search-form" class="form-inline bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div class="clearfix">
		<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search forums:', 'bbpress' ); ?></label>
		<input type="hidden" name="action" value="bbp-search-request" />
		<input tabindex="<?php bbp_tab_index(); ?>" type="text" class="form-control bbp_search" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" placeholder="Search Forums" />
		<!-- <input tabindex="<?php bbp_tab_index(); ?>" class="button btn btn-default bbp_search_submit" type="submit" id="bbp_search_submit" value="<?php esc_attr_e( 'Search', 'bbpress' ); ?>" /> -->
		<button tabindex="<?php bbp_tab_index(); ?>" class="button btn btn-default bbp_search_submit" type="submit" id="bbp_search_submit" value="<?php esc_attr_e( 'Search', 'bbpress' ); ?>"><span class="glyphicon glyphicon-chevron-right"></span></button>
	</div>
</form>
