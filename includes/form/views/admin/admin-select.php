<?php
/**
 * Form View: Select
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$options = isset( $this->admin_data->advance_setting->options ) ? explode( ',', trim( $this->admin_data->advance_setting->options, ',' ) ) : array();


?>
<div class="ur-input-type-select ur-admin-template">

	<div class="ur-label">
		<label><?php echo $this->get_general_setting_data( 'label' ); ?></label>

	</div>
	<div class="ur-field" data-field-key="select">


		<select id="ur-input-type-select">

			<?php
			foreach ( $options as $option ) {

				echo "<option value='" . $option . "'>" . $option . '</option>';

			}
			?>
		</select>

	</div>
	<?php

	  UR_Select::get_instance()->get_setting();

	?>
</div>

