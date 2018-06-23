<?php
/*
 * create Core class
 * format URL /controller/method/param
 * load controller & url
 */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $param = [];

    public function __construct()
    {
//        print_r($this->getUrl());

         // get url and set currentController

        $url = $this->getUrl();
        if (file_exists('../app/controller/' . $url[0] . '.php')) {
            $this->currentController = $url[0];
            unset($url[0]);
        }

        // require and instantiate controller
        require_once '../app/controller/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // get page method
        if (isset($url[1])) {
           if (method_exists($this->currentController, $url[1])) {
               $this->currentMethod = $url[1];
           }
           unset($url[1]);
        }
        // get param and send to function
        $this->param = $url ? $this->param = array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->param);

    }

    public function getUrl()
    {
        /*
         * get url and return
         */
        if (isset($_GET['url'])) {
            $url = ucfirst(filter_var(rtrim($_GET['url']), FILTER_SANITIZE_URL));
            $url = explode('/', $url);
            return $url;
        }
    }
}