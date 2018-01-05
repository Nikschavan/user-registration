<?php
/**
 * Configure Email
 *
 * @class    UR_Settings_Registration_Approved_Email
 * @extends  UR_Settings_Email
 * @category Class
 * @author   WPEverest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'UR_Settings_Registration_Approved_Email', false ) ) :

/**
 * UR_Settings_Registration_Approved_Email Class.
 */
class UR_Settings_Registration_Approved_Email{

	
	public function __construct() {
		$this->id             = 'registration_approved_email';
		$this->title          = __( 'Configure Registration Approved Email', 'user-registration' );
	}

		/**
		 * Get settings
		 *
		 * @return array
		 */
		public function get_settings() {

		?><h2><?php echo esc_html__('Registration Approved Email','user-registration'); ?> <?php ur_back_link( __( 'Return to emails', 'user-registration' ), admin_url( 'admin.php?page=user-registration-settings&tab=email' ) ); ?></h2>

		<?php
			$settings = apply_filters(
				'user_registration_registration_approved_email', array(

					array(
						'type'  => 'title',
						'desc'  => '',
						'id'    => 'registration_approved_email',
					),

					array(
						'title'    => __( 'Enable this email', 'user-registration' ),
						'desc'     => __( 'Enable this email sent to admin after successfull user registration.', 'user-registration' ),
						'id'       => 'user_registration_enable_registration_approved_email',
						'default'  => 'yes',
						'type'     => 'checkbox',
						'autoload' => false,
					),

					array(
						'title'    => __( 'Email Content', 'user-registration' ),
						'desc'     => __( 'The email content you want to customize.', 'user-registration' ),
						'id'       => 'user_registration_registration_approved_email',
		 				'type'     => 'tinymce',
		 				'default'  => $this->ur_get_registration_approved_email(),
						'css'      => 'min-width: 350px;',
						'desc_tip' => true,
					),

					array(
						'type' => 'sectionend',
						'id'   => 'registration_approved_email',
					),

				)
			);

			return apply_filters( 'user_registration_get_settings_' . $this->id, $settings );
		}

	public function ur_get_registration_approved_email() {
	
		$message = apply_filters( 'user_registration_user_email_message', __( sprintf(

				'Hi {{user_name}},
 					<br/>
               <br/>
 					Your registration on <a href="{{home_url}}">{{blog_info}}</a>  has been approved.
 					<br/>
 					Please visit \'<b>My Account</b>\' page to edit your account details and create your user profile on <a href="{{home_url}}">{{blog_info}}</a>.
               <br/>
               <br/>
               Thank You!' ), 'user-registration' ) );

		return $message;
	}
}
endif;

return new UR_Settings_Registration_Approved_Email();
