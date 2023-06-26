<?php

namespace Devwael\RcpRegistrationFields\I18n;

/**
 * Load plugin text domain
 *
 * @package Devwael\RcpRegistrationFields\I18n
 */
class Languages {
	/**
	 * Load plugin text domain
	 *
	 * @return void
	 */
	public function load_text_domain(): void {
		$languages_dir_rel_path = dirname( \plugin_basename( __FILE__ ), 3 ) . '/languages';
		/**
		 * Load plugin text domain
		 */
		\load_plugin_textdomain( 'rcp-registration-fields', false, $languages_dir_rel_path );
	}

	/**
	 * Attach the class functions to WordPress hooks
	 *
	 * @return void
	 */
	public function init(): void {
		\add_action( 'plugins_loaded', [ $this, 'load_text_domain' ] );
	}
}
