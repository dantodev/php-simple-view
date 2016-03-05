<?php namespace Dtkahl\SimpleView;

class ViewRenderer {

  private $_view_paths = [];

  public function __construct($view_paths = [])
  {
    $this->addViewPath($view_paths);
  }

  public function addViewPath($view_paths)
  {
    $this->_view_paths = is_array($view_paths) ? $view_paths : [$view_paths];
  }

  public function render($file, $data = [])
  {
    foreach ($this->_view_paths as $path) {
      if (is_file($path.$file)) {
        $run = function ($file, $data) {
          extract($data);
          include $file;
        };
        ob_start();
        $run($path.$file, $data);
        return ob_get_clean();
      }
    }
    throw new \RuntimeException("View `$file` does not exist.");
  }

}
