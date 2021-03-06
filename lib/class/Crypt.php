<?php

	/**
	 * ==============================
	 * Crypt
	 * ==============================
	 */

	use Defuse\Crypto\Key;
	use Defuse\Crypto\Crypto;
	use Defuse\Crypto\Encoding;

	class Crypt {

		private static $key;

		public static function key ($key = null) {

			if ($key !== null) {
				if (is_string ($key)) {
					self::$key = Key::loadFromAsciiSafeString ($key);
				} else {
					self::$key = $key;
				}
			} else {
				return self::$key;
			}
		}

		public static function randomKey () {
			try {
				return Key::createNewRandomKey ();
			} catch (Exception $e) {
				echo $e;
			}
		}

		public static function encrypt ($plainText) {
			return Crypto::encrypt($plainText, self::$key);
		}

		public static function decrypt ($cipherText) {
			return Crypto::decrypt($cipherText, self::$key);
		}
	}
?>