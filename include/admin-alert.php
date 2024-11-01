<div class="notice notice-success is-dismissible <?php echo $this->plugin->name; ?>-notice-welcome">
	<p>Thank you for installing <?php echo $this->plugin->displayName; ?>. <a href="<?php echo $setting_page; ?>">Click here</a> to enable automated testing and monitoring.</p>
</div>
<script type="text/javascript">
	jQuery(document).ready( function($) {
		$(document).on( 'click', '.<?php echo $this->plugin->name; ?>-notice-welcome button.notice-dismiss', function( event ) {
			event.preventDefault();
			$.post( ajaxurl, {
				action: '<?php echo $this->plugin->name . '_dismiss_admin_alert'; ?>',
				nonce: '<?php echo wp_create_nonce( $this->plugin->name . '-nonce' ); ?>'
			});
			$('.<?php echo $this->plugin->name; ?>-notice-welcome').remove();
		});
	});
</script>
