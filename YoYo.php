<?php
/*
** @script		YoYo class for text encryption with password v1.2
** @author 		Glitch3R(YoYo)
** @copyright	Copyright (C) 2020
*/

class YoYo {
	
	
	public $compress = false; # compression (BETA) v0.1 
	
	
	public $gzip = false; # compression with gzip
	
	
	public $base64 = false; # encode/decode with base64
	
	
	private	$zero = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
	
	
	private	$one = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	
	
	private	function inArray($object, $array) {
		$key = false;
		while (($key = array_search($object, $array)) !== NULL){
			break;
		}
		return $key;
	}
	
	
	private function TTA($text) {
		$var = array();
		for($i=0; strlen($text)>$i; $i++){
			$var[] = ord($text[$i]);
		}
		return implode(' ', $var);
	}
	
	
	private function ATT($ascii) {
		$var = array();
		$ascii = explode(' ',$ascii);
		for($i=0; count($ascii)>$i; $i++) {
			$var[] = chr($ascii[$i]);
		}
		return implode($var);
	}
	
	
	private function NumbersToBinary($object) {
		$ch = array('0', '1', 'z', 'u', '2', '3', '4', '5', '6', '7', '8', '9', ' ');
		$bi = array('z', 'u', '0000', '1000', '0100', '0010', '0001', '1100', '0110', '0011', '1110', '0111', '1111');
		$objsplit = str_split($object, 1);
		$objcount = count($objsplit)-1;
		for($i=0;$i<=$objcount;$i++) {
			$obj[] = str_replace($ch,$bi,$objsplit[$i]);
		}
		$return = implode($obj);
		return $return;
	}
	
	
	private function BinaryToNumbers($object) {
		$ch = array("1111", "0111", "1110", "0011", "0110", "1100", "0001", "0010", "0100", "1000", "0000", "u", "z");
		$bi = array(' ', "9", "8", "7", "6", "5", "4", "3", "2", "u", "z", "1", "0");
		$objsplit = str_split($object, 4);
		$objcount = count($objsplit)-1;
		for($i=0;$i<=$objcount;$i++) {
			$obj[] = str_replace($ch,$bi,$objsplit[$i]);
		}
		$return = implode($obj);
		return $return;
	}
	
	
	private function YoYoAction($number, $object, $order='ASC') {
		if($number == '0') {
			$objreturn = $object;
		}
		else {
			$objsplit = str_split($object, $number);
			$objcount = count($objsplit)-1;
			if($order == 'ASC') {
				for($i=0;$i<=$objcount;$i++) {
					$obj[] = $objsplit[$i];
				}
			}
			else if($order == 'DESC') {
				for ($i=$objcount; $i>=0; $i--) {
					$obj[] = $objsplit[$i];
				}
			}
			$return = implode($obj);
		}
		return $return;
	}
	
	
	# the algorithm
	private function Algorithm($Password, $Text, $Type='encode') {
		
		if($Type == 'encode') {
			$Password = $this->TTA($Password);
		}
		else if($Type == 'decode') {
			$Password = strrev($this->TTA($Password));
		}
		
		$PassSplit = str_split($Password, 1);
		$PassCount = count($PassSplit)-1;
		
		for($i=0;$i<=$PassCount;$i++) {
		
			if($i == '0') {
				$TC = $Text;
			}
			else{
				$TC = $TC_Refolosire;
			}
			
			if($Type == 'encode'){
	
				if($PassSplit[$i] == '0') {
					$TC = strrev($TC);
				}
				else if($PassSplit[$i] == '1') {
					$TC = $this->YoYoAction('2', $TC, 'DESC');
				}
				else if($PassSplit[$i] == '2') {
					$TC = $this->YoYoAction('3', $TC, 'DESC');
				}
				else if($PassSplit[$i] == '3') {
					$TC = $this->YoYoAction('4', $TC, 'DESC');
				}
				else if($PassSplit[$i] == '4') {
					$TC = $this->YoYoAction('5', $TC, 'DESC');
				}
				else if($PassSplit[$i] == '5') {
					$TC = $this->YoYoAction('6', $TC, 'DESC');
				}
				else if($PassSplit[$i] == '6') {
					$TC = $this->YoYoAction('5', $TC, 'DESC');
					$TC = $this->YoYoAction('6', $TC, 'ASC');
				}
				else if($PassSplit[$i] == '7') {
					$TC = $this->YoYoAction('4', $TC, 'DESC');
					$TC = $this->YoYoAction('5', $TC, 'ASC');
				}
				else if($PassSplit[$i] == '8') {
					$TC = $this->YoYoAction('3', $TC, 'DESC');
					$TC = $this->YoYoAction('4', $TC, 'ASC');
				}
				else if($PassSplit[$i] == '9') {
					$TC = $this->YoYoAction('2', $TC, 'DESC');
					$TC = $this->YoYoAction('3', $TC, 'ASC');
				}
				else {
					$TC = $TC;
				}
				
			}
			else if($Type=='decode') {
				
				if($PassSplit[$i] == '0') {
					$TC = strrev($TC);
				}
				else if($PassSplit[$i] == '1') {
					$TC = strrev($this->YoYoAction('2', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '2') {
					$TC = strrev($this->YoYoAction('3', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '3') {
					$TC = strrev($this->YoYoAction('4', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '4') {
					$TC = strrev($this->YoYoAction('5', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '5') {
					$TC = strrev($this->YoYoAction('6', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '6') {
					$TC = strrev($this->YoYoAction('6', strrev($TC), 'ASC'));
					$TC = strrev($this->YoYoAction('5', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '7') {
					$TC = strrev($this->YoYoAction('5', strrev($TC), 'ASC'));
					$TC = strrev($this->YoYoAction('4', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '8') {
					$TC = strrev($this->YoYoAction('4', strrev($TC), 'ASC'));
					$TC = strrev($this->YoYoAction('3', strrev($TC), 'DESC'));
				}
				else if($PassSplit[$i] == '9') {
					$TC = strrev($this->YoYoAction('3', strrev($TC), 'ASC'));
					$TC = strrev($this->YoYoAction('2', strrev($TC), 'DESC'));
				}
				else {
				$TC = $TC;
				}
				
			}
			
			$TC_Refolosire = $TC;
			
		}
		
		return $TC;
		
	}
	
	
	# Compression
	private function compress($string) {
		$split_compress = str_split($string, 1);
		$count = count($split_compress)-1;
		for($i=0;$i<=$count;$i++) {
			if($split_compress[$i] == '0') {
				$array = $this->zero;
			}
			else if($split_compress[$i] == '1') {
				$array = $this->one;
			}
			if($i > 0 && $split_compress[$i] == $split_compress[$i-1]) {
				if($NR == 26) {
					$NR = 1;
				}
				else {
					$NR ++;
				}
			}
			else {
				$NR = 1;
			}
			$last = false;
			if(!isset($split_compress[$i+1]) || isset($split_compress[$i+1]) && $split_compress[$i+1] != $split_compress[$i] || $NR == 26) {
				$last = true;
			}
			if($last) {
				$compressed[] = $array[$NR-1];
			}
		}
		return implode($compressed);
	}

	
	# Decompression
	private function decompress($content) {
		$split_uncompress = str_split($content, 1);
		$count = count($split_uncompress)-1;
		for($i=0;$i<=$count;$i++) {
			$char = $split_uncompress[$i];
			if(ctype_lower($char)) {
				$what = '0';
				$howMany = (($this->inArray($char, $this->zero))+1);
			}
			else if(ctype_upper($char)){
				$what = '1';
				$howMany = (($this->inArray($char, $this->one))+1);
			}
			for($iii=1;$iii<=$howMany;$iii++) {
				$uncompress[] = $what;
			}
		}
		return implode($uncompress);
	}
	
	
	# encrypt
	public function encrypt($password,$content) {
		$content = $this->Algorithm($password, $this->NumbersToBinary($this->TTA($content)));
		if($this->compress) { $content = $this->compress($content); }
		if($this->gzip) { $content = gzdeflate($content,9); }
		if($this->base64) { $content = base64_encode($content); }
		return $content;
	}
	
	
	# decrypt
	public function decrypt($password, $content) {
		if($this->base64) { $content = base64_decode($content); }
		if($this->gzip) { $content = gzinflate($content); }
		if($this->compress) { $content = $this->decompress($content); }
		$content = $this->ATT($this->BinaryToNumbers($this->Algorithm($password, $content, 'decode')));
		return $content;
	}
	
	
}
