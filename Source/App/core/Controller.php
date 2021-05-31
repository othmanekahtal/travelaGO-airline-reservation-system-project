<?php

/*
 *
 * base Controller
 * Loads the models and views
 *
 */

class Controller
{

    /**
     *
     * Controller constructor.
     *
     **/

    //load model
    /**
     * @param $model
     * @return mixed
     */
    protected function model($model)
    {
        // require model :
        require_once "../App/models/" . $model . '.php';
        return new $model();

    }

    //load view : 

    /**
     * @param $view
     * @param array $data
     */
    protected function view($view, $data = [])
    {
        // check file is exist in views folder :
        if (file_exists("../App/views/" . $view . '.php')) {
            require_once "../App/views/" . $view . '.php';
//            echo 'exist!';
        } else {
            // the views is not exists:
            die("view is not exists !");
        }
    }
}