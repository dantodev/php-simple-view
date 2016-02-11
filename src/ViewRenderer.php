<?php namespace Dtkahl\SimplePhpView;

class ViewRenderer {

  private $view_path;

  public function __construct($templatePath = "")
  {
    $this->view_path = $templatePath;
  }

  public function render($file, $data = [])
  {
    if (!is_file($this->view_path . $file)) {
      throw new \RuntimeException("View `$file` does not exist.");
    }

    $run = function ($file, $data) {
      extract($data);
      include $file;
    };

    ob_start();
    $run($this->view_path.$file, $data);
    return ob_get_clean();
  }

}