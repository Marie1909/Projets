<?php

	class Template {
		const THEME_DIR = 'public';
		const TEMPLATE_name = 'default';
		const EXTENSION_TEMPLATE = 'html';
		
		private $OS;
		private $filename;
		private $aParser;
		private $directory;
		private $theme_dir;
		private $name;
		private $core;
		
		public function __construct($core,$name = null,$theme_dir = null, $directory = null) {

			$this->core = $core;
			$this->OS = substr(php_uname('s'), 0, 3);
			
			$this->name = (is_null($name)) ? self::TEMPLATE_name : $name;
			$this->theme_dir = (is_null($theme_dir)) ? self::THEME_DIR : $theme_dir;
			
			$this->directory = $this->convert((is_null($directory)) ? sprintf('%s/%s', ROOT_PATH, $this->theme_dir) : sprintf('%s/%s', ROOT_PATH, $directory));
		}
		
		public function setCore($core) {
			$this->core = $core;
		}

		public function setdirectory($directory) {
			$this->directory = $directory . $this->theme_dir;
		}

		private function load() {
			
		if($this->core != '') {
			$this->core = "\\" . $this->core;
		}

		$root = $this->convert(sprintf("%s\%s\%s%s\%s.%s",
			$this->directory, 
			$this->name, 
			'templates',
			$this->core,
			$this->filename, 
			self::EXTENSION_TEMPLATE));
			
			if(defined('DEBUG')) {
				if(DEBUG == true) {
					var_dump($root);
				}
			}
			return @file_get_contents($root);
		}
		
		private function parse($Template, $aParser = array()) {
			if(floatval(phpversion()) <= 5.3) {
				if(!isset($aParser[1])) {
					$aParser[1] = null;
				}
				
				return preg_replace('#\{([a-z0-9\-_]*?)\}#Ssie', '( ( isset($aParser[\'\1\']) ) ? $aParser[\'\1\'] : \'\1\' );', $Template);
			}
			else {
				return preg_replace_callback('#\{([a-z0-9\-_]*?)\}#Ssi', function ($M) use ($aParser) {
					if(!isset($aParser[$M[1]])) {
						$aParser[$M[1]] = (!isset($_GET['DEBUG'])) ? null : $M[1];
					}
					
					return $aParser[$M[1]];
				}, $Template);
			}
		}
		
		public function display($filename, $aParser) {
			$this->filename = $this->convert($filename);

			// DIRECTORY_SEPARATOR
			$this->aParser = $aParser;

			return $this->parse($this->load(), $this->aParser);
		}
		
		private function convert($text) {
			if ($this->OS == "Win") {
				if (preg_match("#/#m",$text)) {
					$patterns = array();
					$patterns[0] = "#/#";
					$replacements = array();
					$replacements[2] = '\\';
					return preg_replace($patterns, $replacements, $text);
				}
				else 
				{
					return $text;
				}
			}
			else{
				if (preg_match("#\\\\#m",$text)) {
					$patterns = array();
					$patterns[0] = "#\\\\#";
					$replacements = array();
					$replacements[2] = '/';
					return preg_replace($patterns, $replacements, $text);
				}
				else 
				{
					return $text;
				}
			}
		}
	}
?>