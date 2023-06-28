<?php


function bb_pdf_field( $name, $value, $field ) { ?>
	<?php $pdf = FLBuilderPhoto::get_attachment_data($value); ?>
	
	<div class="fl-pdf-field fl-builder-custom-field<?php if(empty($value) || !$pdf) echo ' fl-pdf-empty'; if(isset($field['class'])) echo ' ' . $field['class']; ?>">
		
		<a class="fl-pdf-select" href="javascript:void(0);" onclick="return false;"><?php _e('Select File', 'cb-custom-modules'); ?></a>
		
		<div class="fl-pdf-preview">
			<?php if(!empty($value) && $pdf) : ?>
				<div class="fl-pdf-preview-img">
					<img src="<?php echo $pdf->icon; ?>" />
				</div>
				
				<span class="fl-pdf-preview-filename"><?php echo $pdf->filename; ?></span>
				
			<?php else : ?>
				
				<div class="fl-pdf-preview-img">
					<img src="<?php echo FL_BUILDER_URL; ?>img/spacer.png" />
				</div>
				
				<span class="fl-pdf-preview-filename"></span>
				
			<?php endif; ?>
			
			<br />
			
			<a class="fl-pdf-replace" href="javascript:void(0);" onclick="return false;"><?php _e('Replace File', 'cb-custom-modules'); ?></a>
			
			<a class="fl-pdf-remove" href="javascript:void(0);" onclick="return false;"><?php _e('Remove File', 'cb-custom-modules'); ?></a>
			
			<div class="fl-clear"></div>
		</div>
		
		<input name="<?php echo $name; ?>" type="hidden" value='<?php echo $value; ?>' />
		
	</div>
	
	<?php
}
add_action( 'fl_builder_control_pdf-field', 'bb_pdf_field', 1, 3 );


function bb_pdf_field_assets() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_style( 'pdf-field', TBPT_CUSTOM_MODULE_URL . 'includes/pdf-field.css', array(), '' );
		wp_enqueue_script( 'pdf-field', TBPT_CUSTOM_MODULE_URL . 'includes/pdf-field.js', array(), '' );
	}
}
add_action( 'wp_enqueue_scripts', 'bb_pdf_field_assets' );
