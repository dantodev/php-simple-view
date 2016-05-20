<?php namespace Dtkahl\SimpleView;

class ViewRenderer
{

    private $_view_paths = [];

    /**
     * ViewRenderer constructor.
     * @param string|string[] $view_paths
     */
    public function __construct($view_paths = [])
    {
        $this->addViewPath($view_paths);
    }

    /**
     * @param string|string[] $view_paths
     * @return $this
     */
    public function addViewPath($view_paths)
    {
        $this->_view_paths = array_merge($this->_view_paths, (array)$view_paths);
        return $this;
    }

    /**
     * @param string $file
     * @param array $data
     * @return string
     */
    public function render($file, array $data = [])
    {
        foreach ($this->_view_paths as $path) {
            if (is_file($path . $file)) {
                $run = function ($file, $data) {
                    extract($data);
                    include $file;
                };
                ob_start();
                $run($path . $file, $data);
                return ob_get_clean();
            }
        }
        throw new \RuntimeException("View `$file` does not exist.");
    }

    /**
     * @param string $file
     * @param array $data
     * @return string
     */
    public function __invoke($file, array $data = [])
    {
        return $this->render($file, $data);
    }

}
