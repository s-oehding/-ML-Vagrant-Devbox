<?php

class Server extends Controller {

	function index()
	{
		$template = $this->loadView('server_view');
		$template->set('phpExtensions', $this->getPhpExtensions());
		$template->render();
	}

	public function getPhpExtensions()
	{
		$extensions = get_loaded_extensions();
		return $extensions;
	}

	public function getExtensionFunctions($module_name)
	{
		$functions = get_extension_funcs($module_name);
		return json_encode($functions);
	}

	function getApacheModules()
	{
		return json_encode(apache_get_modules());
	}
}

?>
