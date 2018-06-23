<?php
/*
 * create Controller load model and view
 */

class Controller
{
    public function model($model)
    {
        if (file_exists('../app/controller/' . $model . '.php')) {
            require_once '../app/controller/' . $model . '.php';

            // instantiate model
            return new $model;
        }
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/'. $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('view dose not exit');
        }
    }
}