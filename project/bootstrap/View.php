<?php
namespace Core;

trait View
{
    public static function render($view, $params = [])
    {
        $position = strpos($view, ".");
        if ($position){
            $view = str_replace(".", "/", $view);
        }
        return View::generateView($view, $params);
    }

    private static function generateView($view, $params)
    {

        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        require_once APP_ROOT."/application/view/$view.php";
        echo ob_get_clean();
        return true;
    }
}
