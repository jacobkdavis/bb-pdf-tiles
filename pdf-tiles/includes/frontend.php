<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 *
 */

?>

<?php

$form_field_repeater = $settings->cb_link_list_form_field_repeater;

$icon_size = $settings->cb_link_list_icon_size;
$font = $settings->cb_link_list_font;
$line_height = $settings->cb_link_list_line_height;
$label_font_size = $settings->cb_link_list_label_font_size;
$filesize_font_size = $settings->cb_link_list_filesize_font_size;

?>

<div class="cb-link-list text-center">

	<div class="row-fluid">

		<?php foreach($form_field_repeater as $link) { ?>

			<?php

			$label = $link->cb_link_label;
			$icon = $link->cb_link_icon;
			$type = $link->cb_link_type;
			
			$link_url = wp_get_attachment_url( $link->cb_link_file );
			$attachment_meta = wp_prepare_attachment_for_js( $link->cb_link_file );
			
			$link_target = "_blank";
			
			$image = wp_get_attachment_image( $link->cb_link_file, 'large' );
			
			if ( $image ) {
			
			?>

			<div class="col-md-4 col-xs-12">
			
				<div class="fl-pdf-photo">
					<div class="fl-photo-content fl-photo-img">
						<?php if ( ! empty( $link_url ) ) : ?>
						<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" itemprop="url">
						<?php endif; ?>
						
						<?php echo $image; ?>
						
						<?php if ( ! empty( $link_url) ) : ?>
						</a>
						<?php endif; ?>
						
						<?php if ( ! empty( $label ) ) : ?>
						<div class="fl-photo-caption fl-photo-caption-hover" itemprop="caption"><?php echo $label; ?></div>
						<?php endif; ?>
					</div>

					<?php if ( $image && ! empty( $label ) ) : ?>
<!-- 					<div class="fl-photo-caption fl-photo-caption-below" itemprop="caption"><?php echo $label; ?></div> -->
					<?php endif; ?>

				</div>



			</div>
			
			<?php } ?>

		<?php } ?>

	</div>

</div>
