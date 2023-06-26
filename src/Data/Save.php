<?php

namespace Devwael\RcpRegistrationFields\Data;

class Save {

	/**
	 * Save the posted data
	 *
	 * @param array $posted  array The posted data from the registration form ($_POST).
	 * @param int   $user_id int The user ID.
	 *
	 * @return void
	 */
	public function save( array $posted, int $user_id ): void {

		if ( ! empty( $posted['president_email'] ) ) {
			\update_user_meta( $user_id, 'rcprf_president_email', \wp_unslash( \sanitize_text_field( $posted['president_email'] ) ) );
		}

		if ( ! empty( $posted['club_province'] ) ) {
			\update_user_meta( $user_id, 'rcprf_club_province', \wp_unslash( \sanitize_text_field( $posted['club_province'] ) ) );
		}

		if ( ! empty( $posted['number_of_members'] ) ) {
			\update_user_meta( $user_id, 'rcprf_number_of_members', \wp_unslash( \sanitize_text_field( $posted['number_of_members'] ) ) );
		}

		if ( ! empty( $posted['newsletter_email'] ) ) {
			\update_user_meta( $user_id, 'rcprf_newsletter_email', \wp_unslash( \sanitize_text_field( $posted['newsletter_email'] ) ) );
		}
	}

	/**
	 * Save the posted data from the profile page
	 *
	 * @param int $user_id int The user ID.
	 *
	 * @return void
	 */
	public function profile_save( int $user_id ): void {

		// phpcs:disable
		if ( ! empty( $_POST['president_email'] ) ) {
			\update_user_meta( $user_id, 'rcprf_president_email', \wp_unslash( \sanitize_text_field( $_POST['president_email'] ) ) );
		}

		if ( ! empty( $_POST['club_province'] ) ) {
			\update_user_meta( $user_id, 'rcprf_club_province', \wp_unslash( \sanitize_text_field( $_POST['club_province'] ) ) );
		}

		if ( ! empty( $_POST['number_of_members'] ) ) {
			\update_user_meta( $user_id, 'rcprf_number_of_members', \wp_unslash( \sanitize_text_field( $_POST['number_of_members'] ) ) );
		}

		if ( ! empty( $_POST['newsletter_email'] ) ) {
			\update_user_meta( $user_id, 'rcprf_newsletter_email', \wp_unslash( \sanitize_text_field( $_POST['newsletter_email'] ) ) );
		}
		// phpcs:enable
	}

	/**
	 * Attach the class functions to WordPress hooks
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'rcp_form_processing', [ $this, 'validate' ] );
		add_action( 'rcp_user_profile_updated', [ $this, 'profile_save' ] );
		add_action( 'rcp_edit_member', [ $this, 'profile_save' ] );
	}
}
