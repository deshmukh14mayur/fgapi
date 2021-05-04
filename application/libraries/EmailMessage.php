<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EmailMessage {

	protected $connection;
	protected $messageNumber;
	
	public $bodyHTML = '';
	public $bodyPlain = '';

	public $hasAttachment;
	public $attachments;
	
	public $getAttachments = true;
	
	public function __construct($params) {
	
		$CI =&get_instance();
		$this->connection = $params['connection'];
		$this->messageNumber = $params['messageNumber'];
				
	}

	public function fetch() {
		
		$structure = @imap_fetchstructure($this->connection, $this->messageNumber);

		// echo "<pre>";
		// print_r(array($structure,$this->connection,$this->messageNumber));
		// echo "</pre>";
		if(!$structure) {
			return false;
		}
		else {
			// echo "<pre>";
			// print_r($structure->parts);
			// echo "</pre>";
			$this->hasAttachment = 0;
			$this->recurse($structure->parts);
			return array(
				'bodyHTML'=> $this->bodyHTML,
				'bodyPlain'=> $this->bodyPlain,
				'hasAttachment'=> $this->hasAttachment,
				'attachments'=> $this->attachments

			);
		}
		
	}
	
	public function recurse($messageParts, $prefix = '', $index = 1, $fullPrefix = true) {

		foreach($messageParts as $part) {
			
			$partNumber = $prefix . $index;
			
			if($part->type == 0) {
				if($part->subtype == 'PLAIN') {
					$this->bodyPlain .= $this->getPart($partNumber, $part->encoding);
				}
				else if($part->subtype == 'CSV')
				{
					$this->attachments[] = array(
						'type' => $part->type,
						'subtype' => $part->subtype,
						'filename' => $this->getFilenameFromPart($part),
						'data' => $this->getPart($partNumber, $part->encoding),
						// 'data' => $this->getAttachments ? $this->getPart($partNumber, $part->encoding) : '',
						'inline' => false,
					);
				}
				else {
					$this->bodyHTML .= $this->getPart($partNumber, $part->encoding);
				}
			}
			elseif($part->type == 2) {
				$msg = new EmailMessage($this->connection, $this->messageNumber);
				$msg->getAttachments = $this->getAttachments;
				$msg->recurse($part->parts, $partNumber.'.', 0, false);
				$this->attachments[] = array(
					'type' => $part->type,
					'subtype' => $part->subtype,
					'filename' => '',
					'data' => $msg,
					'inline' => false,
				);
			}
			elseif(isset($part->parts)) {
				if($fullPrefix) {
					$this->recurse($part->parts, $prefix.$index.'.');
				}
				else {
					$this->recurse($part->parts, $prefix);
				}
			}
			elseif($part->type > 2) {
				$this->hasAttachment = 1;
				if(isset($part->id)) {
					$id = str_replace(array('<', '>'), '', $part->id);
					$this->attachments[$id] = array(
						'type' => $part->type,
						'subtype' => $part->subtype,
						'filename' => $this->getFilenameFromPart($part),
						'data' => $this->getPart($partNumber, $part->encoding),
						// 'data' => $this->getAttachments ? $this->getPart($partNumber, $part->encoding) : '',
						'inline' => true,
					);
				}
				else {
					// var_dump(expression)
					$this->attachments[] = array(
						'type' => $part->type,
						'subtype' => $part->subtype,
						'filename' => $this->getFilenameFromPart($part),
						'data' => $this->getPart($partNumber, $part->encoding),
						// 'data' => $this->getAttachments ? $this->getPart($partNumber, $part->encoding) : '',
						'inline' => false,
					);
				}
			}
			
			$index++;
			
		}
		
	}
	
	function getPart($partNumber, $encoding) {

		// echo "<pre>";
		// print_r($partNumber);
		// echo "</pre>";
		$data = imap_fetchbody($this->connection, $this->messageNumber, $partNumber);

		switch($encoding) {
			case 0: return $data; // 7BIT
			case 1: return $data; // 8BIT
			case 2: return $data; // BINARY
			case 3: return $data;//base64_decode($data); // BASE64
			case 4: return quoted_printable_decode($data); // QUOTED_PRINTABLE
			case 5: return $data; // OTHER
		}


	}
	
	function getFilenameFromPart($part) {

		$filename = '';

		if($part->ifdparameters) {
			foreach($part->dparameters as $object) {
				if(strtolower($object->attribute) == 'filename') {
					$filename = $object->value;
				}
			}
		}

		if(!$filename && $part->ifparameters) {
			foreach($part->parameters as $object) {
				if(strtolower($object->attribute) == 'name') {
					$filename = $object->value;
				}
			}
		}

		return $filename;

	}

}