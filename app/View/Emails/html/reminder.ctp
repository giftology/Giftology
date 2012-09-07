<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php
//$content = explode("\n", $content);

//foreach ($content as $line):
//	echo '<p> ' . $line . "</p>\n";
//endforeach;

echo "<h1>Reminder for ".$name."</h1>";
foreach ($reminders as $reminder) {
    echo "<img src=\"http://graph.facebook.com/".$reminder['Reminder']['friend_fb_id']."/picture?type=normal\">";
    echo "<p>".$reminder['Reminder']['friend_name']." ".substr($this->Time->niceShort($reminder['Reminder']['friend_birthday']), 0, -7)."</p>";
}

?>