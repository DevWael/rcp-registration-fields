<?php

namespace Devwael\RcpRegistrationFields\Admin;

class UserFields {

	/**
	 * Add the fields to the user profile
	 *
	 * @param int $user_id int|null The ID of the user.
	 *
	 * @return void
	 */
	public function fields( int $user_id = 0 ): void {
		$president_email   = \get_user_meta( $user_id, 'rcprf_president_email', true );
		$club_province     = \get_user_meta( $user_id, 'rcprf_club_province', true );
		$number_of_members = \get_user_meta( $user_id, 'rcprf_number_of_members', true );
		$newsletter_email  = \get_user_meta( $user_id, 'rcprf_newsletter_email', true );
		?>
		<tr>
			<th scope="row">
				<label for="president_email"><?php \esc_html_e( 'President email', 'rcp-registration-fields' ); ?></label>
			</th>
			<td>
				<input name="president_email" id="president_email" type="email" value="<?php echo \esc_attr( $president_email ); ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="club_province"><?php \esc_html_e( 'Club Province', 'rcp-registration-fields' ); ?></label>
			</th>
			<td>
				<input name="club_province" id="club_province" type="text" value="<?php echo \esc_attr( $club_province ); ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="number_of_members"><?php \esc_html_e( 'Number of Members', 'rcp-registration-fields' ); ?></label>
			</th>
			<td>
				<input name="number_of_members" id="number_of_members" type="number" min="0" step="1" value="<?php echo \esc_attr( $number_of_members ); ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="newsletter_email"><?php \esc_html_e( 'Newsletter Email', 'rcp-registration-fields' ); ?></label>
			</th>
			<td>
				<input name="newsletter_email" id="newsletter_email" type="email" value="<?php echo \esc_attr( $newsletter_email ); ?>"/>
			</td>
		</tr>
		<?php
	}

	/**
	 * Attach the class functions to WordPress hooks
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'rcp_edit_member_after', [ $this, 'fields' ] );
	}
}
