<?php
	/*
     * Function to return an array of Installed Components
     *
	 * @return array           		An array of values from the components table
     */
	function getComps() {
		global $mysqli;
		$auths = array();

		$authqry = "SELECT * FROM components";
		$authres = mysqli_query($mysqli, $authqry) or die('Error: getComps() Function'.mysqli_error());

		while($authrow = mysqli_fetch_assoc($authres)) {
			$authrows = array_map(null, $authrow);
			$auths[] = $authrows;
		}
		return $auths;
	}

	/*
     * Function to check an array for a specific value
     *
     * @param string $val		 	The value to search for
     * @param var $arr			 	The array to search
	 * @return true/false           Boolean
     */
	function checkArray($val, $arr) {
		if (in_array($val, $arr)) {
			return true;
		}
		foreach($arr as $k) {
			if (is_array($k) && checkArray($val, $k)) {
				return true;
			}
		}
		return false;
	}
	
	/*
     * Functions to format Dates and/or Times from the database
	 * http://php.net/manual/en/function.date.php for a full list of format characters
	 * Uncomment (remove the double slash - //) from the one you want to use
	 * Comment (Add a double slash - //) to the front of the ones you do NOT want to use
     *
     * @param string $v   		The database value (ie. 2014-10-31 20:00:00)
     * @return string           The formatted Date and/or Time
     */
	function dateFormat($v) {
		// $theDate = date("Y-m-d",strtotime($v));				// 2014-10-31
		// $theDate = date("m-d-Y",strtotime($v));				// 10-31-2014
		$theDate = date("F d, Y",strtotime($v));				// October 31, 2014
		return $theDate;
	}
	function dateTimeFormat($v) {
		// $theDateTime = date("Y-m-d g:i a",strtotime($v));	// 2014-10-31 8:00 pm
		// $theDateTime = date("m-d-Y g:i a",strtotime($v));	// 10-31-2014 8:00 pm
		$theDateTime = date("F d, Y g:i a",strtotime($v));		// October 31, 2014 8:00 pm
		return $theDateTime;
	}
	function timeFormat($v) {
		// $theTime = date("g:i a",strtotime($v));				// 8:00 pm
		// $theTime = date("g:i a",strtotime($v));				// 8:00 pm
		$theTime = date("g:i a",strtotime($v));					// 8:00 pm
		return $theTime;
	}
	function shortMonthFormat($v) {
		$theDate = date("M d, Y",strtotime($v));				// Oct 31, 2014
		return $theDate;
	}
	function shortDateFormat($v) {
		$theDateTime = date("m/d/Y",strtotime($v));				// 10/31/2014
		return $theDateTime;
	}
	function shortDateTimeFormat($v) {
		$theDateTime = date("m/d/Y g:i a",strtotime($v));		// 10/31/2014 8:00 pm
		return $theDateTime;
	}
	function dbDateFormat($v) {
		$theTime = date("Y-m-d",strtotime($v));					// 2014-10-31
		return $theTime;
	}
	function dbTimeFormat($v) {
		$theTime = date("H:i",strtotime($v));					// 20:00
		return $theTime;
	}
	function dbDateTimeFormat($v) {
		$theTime = date("Y-m-d H:i",strtotime($v));				// 2014-10-31 20:00
		return $theTime;
	}
	
	/*
	 * Function to generate Hyperlinks
	 *
	 * @param 	string $val		 	The String to convert to a clickable Hyperlink
	 * @return 	string $val       	The Hyperlink URL
	 */
	function linkUrls($val){
		return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1" target="_blank">$1</a>', $val);
	}
	
	/*
     * Function to show an Alert type Message Box
     *
     * @param string $msg   	The Alert Message
     * @param string $icon      The Font Awesome Icon
     * @param string $type      The CSS style to apply
     * @return string           The Alert Box
     */
    function alertBox($msg, $icon = "", $type = "") {
        return "
				<div class=\"alertMsg $type\">
					<div class=\"msgIcon pull-left\">$icon</div>
					$msg
					<a class=\"msgClose\" title=\"Close\" href=\"#\"><i class=\"fa fa-times\"></i></a>
				</div>
			";
    }
	
	/*
     * Function to ellipse-ify text to a specific length
     *
     * @param string $text      The text to be ellipsified
     * @param int    $max       The maximum number of characters (to the word) that should be allowed
     * @param string $append    The text to append to $text
     * @return string           The shortened text
     */
    function ellipsis($text, $max = '', $append = '&hellip;') {
        if (strlen($text) <= $max) {
			return $text;
		}

        $replacements = array(
            '|<br /><br />|' => ' ',
            '|&nbsp;|' => ' ',
            '|&rsquo;|' => '\'',
            '|&lsquo;|' => '\'',
            '|&ldquo;|' => '"',
            '|&rdquo;|' => '"',
        );

        $patterns = array_keys($replacements);
        $replacements = array_values($replacements);

        // Convert double newlines to spaces.
        $text = preg_replace($patterns, $replacements, $text);

        // Remove any HTML.  We only want text.
        $text = strip_tags($text);

        $out = substr($text, 0, $max);
        if (strpos($text, ' ') === false) {
			return $out.$append;
		}

        return preg_replace('/(\W)&(\W)/', '$1&amp;$2', (preg_replace('/\W+$/', ' ', preg_replace('/\w+$/', '', $out)))).$append;
    }
	
	/*
     * Functions to Encode/Decode data
     *
     * @param string	$value		The text to be Encoded/Decoded
     * @return						The Encoded/Decoded text
     */
	$salt = "SELECT saltCode FROM sitesettings";
	$saltres = mysqli_query($mysqli, $salt) or die('encodeIt function Error' . mysqli_error());
	$saltrow = mysqli_fetch_assoc($saltres);
	$saltcode = $saltrow['saltCode'];

	// Encode Function
	function encodeIt($value) {
		global $saltcode;

		return trim(
			base64_encode(
				mcrypt_encrypt(
					MCRYPT_RIJNDAEL_256,
					$saltcode,
					$value,
					MCRYPT_MODE_ECB,
					mcrypt_create_iv(
						mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB),
						MCRYPT_RAND
					)
				)
			)
		);
	}

	// Decode Function
	function decodeIt($value) {
		global $saltcode;

		return trim(
			mcrypt_decrypt(
				MCRYPT_RIJNDAEL_256,
				$saltcode,
				base64_decode($value),
				MCRYPT_MODE_ECB,
				mcrypt_create_iv(
					mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB),
					MCRYPT_RAND
				)
			)
		);
	}
	
	/*
     * Function to strip slashes for displaying database content
     *
     * @param string	$value		The string to be stripped
     * @return						The stripped text
     */
	function clean($value) {
		$str = str_replace('\\', '', $value);

		return $str;
	}
	
	/*
     * Function to insert Recent Activity
     *
     * @param string $uid	 		The User's ID
     * @param string $type		 	The Activity Type
     * @param string $title			The Activity Title
     */
	function updateActivity($uid,$type,$title) {
		global $mysqli;
		$activityIp = $_SERVER['REMOTE_ADDR'];

		$stmt = $mysqli->prepare("
							INSERT INTO
								activity(
									userId,
									activityType,
									activityTitle,
									activityDate,
									ipAddress
								) VALUES (
									?,
									?,
									?,
									NOW(),
									?
								)
		");
		$stmt->bind_param('ssss',
							$uid,
							$type,
							$title,
							$activityIp
		);
		$stmt->execute();
		$stmt->close();
	}