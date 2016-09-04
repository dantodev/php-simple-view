<?php namespace Dtkahl\SimpleView;

class ViewRenderer
{

    private $_view_paths = [];
    private $_global_data = [];

    /**
     * ViewRenderer constructor.
     * @param string|array $view_paths
     * @param array $global_data
     */
    public function __construct($view_paths = [], array $global_data = [])
    {
        $this->addViewPath($view_paths);
        $this->_global_data = $global_data;
    }

    /**
     * @param string|array $view_paths
     * @return $this
     */
    public function addViewPath($view_paths)
    {
        $this->_view_paths = array_merge($this->_view_paths, (array)$view_paths);
        return $this;
    }

    /**
     * @param $file
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function render($file, array $data = [])
    {
        $data = array_merge($this->_global_data, $data);
        foreach ($this->_view_paths as $path) {
            if (is_file($path . $file)) {
                $run = function ($file, $data) {
                    extract($data);
                    include $file;
                };
                ob_start();
                try {
                    $run($path . $file, $data);
                } catch (\Exception $e) {
                    ob_clean();
                    throw $e;
                }
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
