<?php

namespace Devwael\RcpRegistrationFields\FrontEnd;

class UserFields {
	/**
	 * Add fields to the registration form
	 *
	 * @return void
	 */
	public function fields(): void {
		$president_email   = \get_user_meta( \get_current_user_id(), 'rcprf_president_email', true );
		$club_province     = \get_user_meta( \get_current_user_id(), 'rcprf_club_province', true );
		$number_of_members = \get_user_meta( \get_current_user_id(), 'rcprf_number_of_members', true );
		$newsletter_email  = \get_user_meta( \get_current_user_id(), 'rcprf_newsletter_email', true );
		?>
		<p>
			<label for="president_email">
			<?php
				\esc_html_e( 'President email', 'rcp-registration-fields' );
			?>
				</label>
			<input name="president_email" id="president_email" type="email" value="
			<?php
			echo \esc_attr( $president_email );
			?>
			"/>
		</p>
		<p>
			<label for="club_province">
			<?php
				\esc_html_e( 'Club Province', 'rcp-registration-fields' );
			?>
				</label>
			<input name="club_province" id="club_province" type="text" value="
			<?php
			echo \esc_attr( $club_province );
			?>
			"/>
		</p>
		<p>
			<label for="number_of_members">
			<?php
				\esc_html_e( 'Number of Members', 'rcp-registration-fields' );
			?>
				</label>
			<input name="number_of_members" id="number_of_members" type="number" min="0" step="1" value="
			<?php
			echo \esc_attr( $number_of_members );
			?>
			"/>
		</p>
		<p>
			<label for="newsletter_email">
			<?php
				\esc_html_e( 'Newsletter Email', 'rcp-registration-fields' );
			?>
				</label>
			<input name="newsletter_email" id="newsletter_email" type="email" value="
			<?php
			echo \esc_attr( $newsletter_email );
			?>
			"/>
		</p>
		<?php
	}

	/**
	 * Attach the class functions to WordPress hooks
	 *
	 * @return void
	 */
	public function init(): void {
		\add_action( 'rcp_after_password_registration_field', [ $this, 'fields' ] );
		\add_action( 'rcp_profile_editor_after', [ $this, 'fields' ] );
	}
}
