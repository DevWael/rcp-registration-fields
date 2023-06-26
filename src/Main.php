<?php

namespace Devwael\RcpRegistrationFields;

use Devwael\RcpRegistrationFields\Data\Save;
use Devwael\RcpRegistrationFields\Data\Validation;
use Devwael\RcpRegistrationFields\FrontEnd;
use Devwael\RcpRegistrationFields\Admin;
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
	 * @var FrontEnd\UserFields instance of user fields.
	 */
	private FrontEnd\UserFields $user_fields;

	/**
	 * UserFields instance of user fields.
	 *
	 * @var Admin\UserFields instance of user fields.
	 */
	private Admin\UserFields $admin_user_fields;

	/**
	 * Validation instance of validation.
	 *
	 * @var Validation instance of validation.
	 */
	private Validation $validation;

	/**
	 * Save instance of save.
	 *
	 * @var Save instance of save.
	 */
	private Save $save;


	/**
	 * User_Listing constructor.
	 *
	 * @param Languages           $languages         Languages instance of languages and text domain loader.
	 * @param FrontEnd\UserFields $user_fields       UserFields instance of user fields.
	 * @param Admin\UserFields    $admin_user_fields UserFields instance of user fields.
	 * @param Validation          $validation        Validation instance of validation.
	 * @param Save                $save              Save instance of save.
	 */
	private function __construct(
		Languages $languages,
		FrontEnd\UserFields $user_fields,
		Admin\UserFields $admin_user_fields,
		Validation $validation,
		Save $save
	) {
		$this->languages         = $languages;
		$this->user_fields       = $user_fields;
		$this->admin_user_fields = $admin_user_fields;
		$this->validation        = $validation;
		$this->save              = $save;
	}

	/**
	 * Get the unique instance of the Main class.
	 *
	 * @param Languages|null        $languages         Languages instance of languages and text domain loader.
	 * @param UserFields|null       $user_fields       UserFields instance of user fields.
	 * @param Admin\UserFields|null $admin_user_fields UserFields instance of user fields.
	 * @param Validation|null       $validation        Validation instance of validation.
	 * @param Save|null             $save              Save instance of save.
	 *
	 * @return self
	 */
	public static function instance(
		Languages $languages = null,
		FrontEnd\UserFields $user_fields = null,
		Admin\UserFields $admin_user_fields = null,
		Validation $validation = null,
		Save $save = null
	): self {
		if ( null === self::$instance ) {
			$languages_object         = $languages ?? new Languages(); // new instance of Languages object.
			$user_fields_object       = $user_fields ?? new FrontEnd\UserFields(); // new instance of UserFields object.
			$admin_user_fields_object = $admin_user_fields ?? new Admin\UserFields(); // new instance of UserFields object.
			$validation_object        = $validation ?? new Validation(); // new instance of Validation object.
			$save_object              = $save ?? new Save(); // new instance of Save object.
			self::$instance           = new self( $languages_object, $user_fields_object, $admin_user_fields_object, $validation_object, $save_object );
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
		$this->admin_user_fields->init(); // load all user fields.
		$this->validation->init(); // load all user fields.
		$this->save->init(); // load all user fields.
	}
}
