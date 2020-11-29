<?php
namespace Library;

abstract class Controller
{
	private static $layout = 'default_layout.php';

	protected $container;

	public function setContainer(Container $container)
	{
		$this->container = $container;
	}
	public function get($key){
		return $this->container->get($key);
	}
	public static function setAdminLayout()
	{
		self::$layout = 'admin_layout.php';
	}

    public function render($view, array $args = array())
	{
		extract($args);
		$classDir = str_replace(['Controller', '\\'], ['', '/'], get_class($this));
        $classDir = ltrim($classDir, '/');
		$tplDir = VIEW_DIR . $classDir . DS;
		ob_start();
		require $tplDir . $view;
		$content = ob_get_clean();

		ob_start();
		require VIEW_DIR . self::$layout;
		return ob_get_clean();
	}
}