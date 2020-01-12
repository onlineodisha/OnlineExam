<?php
/**
 * Email 0.2
 *
 * @author		JREAM
 * @link		http://jream.com
 * @copyright		2010 Jesse Boyer (contact@jream.com)
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details:
 * http://www.gnu.org/licenses/
 *
 * @uses

		$email = new Email();
		$email->send($to_email,$from_email,$subject,$message);
		echo $email->result;

	// To see the result (boolean)
	echo $email->result;
 *
 */

class Email
{

	/** For checking if the email sent after you use Send() */
	public $result = 0;

	/**	Sending Details */
	private $_To;
	private $_From;
	private $_bcc;
	
	/** Content Details */
	private $_subject;
	private $_message;
	
	/**
	 * @param <string> $to Who is the email going to?
	 * @param <string> $from Who is the email coming from? (You)
	 */
	public function __construct()
	{
	//	echo "construct";
	$this->bcc("webrains@gmail.com");
	}


	/**
	 * @param <string> $bcc Use CSV format for BCC
	 */	
	public function bcc($bcc)
	{
		$this->_bcc = $bcc;
	}

	
	/**
	 * @desc Sends the email, by default this is sent in HTML format just because it will revert to text
	 * 		 if the users html feature is disabled.
	 */	
	public function send($to, $from, $subject, $message)
	{
		$this->_To = $to;
		$this->_From = $from;
		$this->_subject = $subject;
		//$this->_subject .= "<br /><br />".EMAIL_DISCLAIMER;
		$this->_message = $message;
		//$this->_message .= "<br /><br />parent::EMAIL_DISCLAIMER";
	//	echo "mail(".$this->_To.", ".$this->_subject.", ".$this->_message.",)";
		$headers =	"From: {$this->_From}" . "\r\n";
		$headers .=	"Reply-To: {$this->_From}" . "\r\n";
		$headers .=	"Bcc: {$this->_Bcc}" . "\r\n";
		$headers .=	'MIME-Version: 1.0' . "\r\n" ;
		$headers .=	'Content-type: text/html; charset=iso-8859-1' . "\r\n" ;
		$headers .=	'X-Mailer: PHP/' . phpversion();

	
		if (mail($this->_To, $this->_subject, $this->_message, $headers))
		$this->result = 1;
	}

}