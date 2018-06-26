<?php
/*
 * create Controller load models and view
 */

class Controller
{
    public function model($model)
    {

        require_once '../app/models/' . $model . '.php';

        // instantiate models
        return new $model;

    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('view dose not exit');
        }
    }
}