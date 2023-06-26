<?php

namespace Devwael\RcpRegistrationFields\Data;

class Validation {

	/**
	 * Validate the posted data
	 *
	 * @param array $posted_data array The posted data from the registration form ($_POST).
	 *
	 * @return void
	 */
	public function validate( array $posted_data ): void {
		if ( ! empty( $posted_data['president_email'] ) && ! \is_email( $posted_data['president_email'] ) ) {
			\rcp_errors()->add( 'president_email', __( 'Please enter a president email', 'rcp-registration-fields' ) );
		}

		if ( ! empty( $posted_data['club_province'] ) && ! \is_string( $posted_data['club_province'] ) ) {
			\rcp_errors()->add( 'club_province', __( 'Please enter a club province', 'rcp-registration-fields' ) );
		}

		if ( ! empty( $posted_data['number_of_members'] ) ) {
			if ( ! \is_numeric( $posted_data['number_of_members'] ) || $posted_data['number_of_members'] < 0 ) {
				\rcp_errors()->add(
					'number_of_members',
					__( 'Please enter a number of members', 'rcp-registration-fields' )
				);
			}
		}

		if ( ! empty( $posted_data['newsletter_email'] ) && ! \is_email( $posted_data['newsletter_email'] ) ) {
			\rcp_errors()->add(
				'newsletter_email',
				__( 'Please enter a newsletter email', 'rcp-registration-fields' )
			);
		}
	}

	/**
	 * Attach the class functions to WordPress hooks
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'rcp_form_errors', [ $this, 'validate' ] );
	}
}
