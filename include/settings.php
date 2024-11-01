<div class="wrap">

  <h2><?php echo $this->plugin->displayName; ?></h2>

  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">

      <div id="post-body-content">
        <div id="normal-sortables" class="meta-box-sortables ui-sortable">
          <div class="postbox">
            <h3 class="hndle">WordPress Automated Browser Testing &amp; Website Monitoring</h3>

            <div class="inside">
              <iframe name="WPAutoTestsFrame" src="<?php echo $this->plugin->start_url; ?>?s=<?php echo get_site_url(); ?>" width="100%" scrolling="no" onload="iFrameResize()"></iframe>
            </div>
          </div>

				</div>
      </div>

    </div>
	</div>
</div>
