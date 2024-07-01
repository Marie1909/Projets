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
			$this->OS = substr(php_uname('s'), 0, 3);;
			
			$this->name = (is_null($name)) ? self::TEMPLATE_name : $name;
			$this->theme_dir = (is_null($theme_dir)) ? self::THEME_DIR : $theme_dir;
			
			if ($this->OS == "Win") {
				$this->directory = (is_null($directory)) ? sprintf('%s\%s', ROOT_PATH, $this->theme_dir) : sprintf('%s\%s', ROOT_PATH, $directory);
			}
			else {
				$this->directory = (is_null($directory)) ? sprintf('%s/%s', ROOT_PATH, $this->theme_dir) : sprintf('%s/%s', ROOT_PATH, $directory);
			}
		}
		
		public function setCore($core) {
			$this->core = $core;
		}

		public function setdirectory($directory) {
			$this->directory = $directory . $this->theme_dir;
		}

		private function load() {
			
			if ($this->OS == "Win") {
				$root = sprintf("%s\%s\%s\%s\%s.%s",
					$this->directory, 
					$this->name, 
					'templates',
					$this->core,
					$this->filename, 
					self::EXTENSION_TEMPLATE);
			}else{
				$root = sprintf("%s/%s/%s/%s/%s.%s",
					$this->directory, 
					$this->name, 
					'templates',
					$this->core,
					$this->filename, 
					self::EXTENSION_TEMPLATE);
			}

				
			var_dump($root);
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
			$this->filename = $filename;
			
			$this->aParser = $aParser;

			return $this->parse($this->load(), $this->aParser);
		}
	}
?>