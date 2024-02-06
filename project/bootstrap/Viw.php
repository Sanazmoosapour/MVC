<?php
namespace Core;

class Viw
{
    public function render($view, $params = [])
    {
        $position = strpos($view, ".");
        if ($position){
            $view = str_replace(".", "/", $view);
        }
        echo APP_ROOT . "/application/view/$view.php";
        return $this->generateView($view, $params);
    }

    private function generateView($view, $params)
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        require_once APP_ROOT."/application/view/$view.php";
        echo ob_get_clean();
        return true;    }
}
