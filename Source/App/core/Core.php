<?php

/*
 *
 * App core class
 * Creates URL & Loads core controller
 * URL FORMAT -/controller/method/params
 *
 */

class Core
{
    /**
     * @var mixed|string
     */
    protected mixed $currentController = 'Home';
    /**
     * @var string
     */
    protected string $currentMethod = 'index';
    /**
     * @var array|string[]
     */
    protected array $params = [];

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $url = $this->getUrl();
        // look if controller is exist or not :
        if (isset($url[0])) {
            if (file_exists('../App/controllers/' . ucwords($url[0]) . '.php')) {
                // if exist set as controller :
                $this->currentController = ucwords($url[0]);
                // and we should unset the value of index 0 in url:
                unset($url[0]);
                //require controller :
            } else {
                $this->currentController = 'E404';
            }
        }
        require_once "../App/controllers/" . $this->currentController . '.php';
        //instantiate controller class :
        $this->currentController = new $this->currentController();

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
            // else the method reset the index
        }
        // get the params :
        $this->params = $url ? array_values($url) : [];
        //call a callback with array of params :
        call_user_func([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * @return string[]
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // for deleting all illegal character from $url variable :
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }
}