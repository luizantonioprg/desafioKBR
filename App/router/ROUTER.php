<?php

class App{ 


	protected $controller = 'SignInController';
	protected $metodo = 'index';
	protected $parametros = [];

	public function __construct(){
		$url = $this->pegarUrl(); 

		if(file_exists('../../App/controllers/'.$url[1].'.php')){
			$this->controller = $url[1];
			unset($url[1]);
		}

		require_once '../../App/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		if(isset($url[2])){
			if(method_exists($this->controller,$url[2])){
				$this->metodo = $url[2];
				unset($url[2]);
				unset($url[0]);
			}
		}
  

		$this->parametros = $url ? array_values($url) : [];
		call_user_func_array([$this->controller,$this->metodo],$this->parametros);
	}

	public function pegarUrl(){
		return explode('/',filter_var($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL));
	}


}