<?php

namespace Devwael\RcpRegistrationFields;

use Devwael\RcpRegistrationFields\FrontEnd\UserFields;
use Devwael\RcpRegistrationFields\I18n\Languages;

class Main {
	/**
	 * Unique instance of the Main class.
	 *
	 * @var Main|null
	 */
	private static ?Main $instance = null;

	/**
	 * Languages instance of languages and text domain loader.
	 *
	 * @var Languages instance of languages and text domain loader.
	 */
	private Languages $languages;

	/**
	 * UserFields instance of user fields.
	 *
	 * @var UserFields instance of user fields.
	 */
	private UserFields $user_fields;


	/**
	 * User_Listing constructor.
	 *
	 * @param Languages  $languages Languages instance of languages and text domain loader.
	 * @param UserFields $user_fields UserFields instance of user fields.
	 */
	private function __construct(
		Languages $languages,
		UserFields $user_fields
	) {
		$this->languages   = $languages;
		$this->user_fields = $user_fields;
	}

	/**
	 * Get the unique instance of the Main class.
	 *
	 * @param Languages|null  $languages Languages instance of languages and text domain loader.
	 * @param UserFields|null $user_fields UserFields instance of user fields.
	 *
	 * @return self
	 */
	public static function instance(
		Languages $languages = null,
		UserFields $user_fields = null
	): self {
		if ( null === self::$instance ) {
			$languages_object   = $languages ?? new Languages(); // new instance of Languages object.
			$user_fields_object = $user_fields ?? new UserFields(); // new instance of UserFields object.
			self::$instance     = new self( $languages_object, $user_fields_object );
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Initialize the logic
	 */
	public function init(): void {
		if ( \wp_installing() ) {
			return; // prevent loading when we are installing WordPress.
		}

		/**
		 * Load all admin side logic.
		 */

		$this->languages->init(); // load all languages.
		$this->user_fields->init(); // load all user fields.
	}
}
