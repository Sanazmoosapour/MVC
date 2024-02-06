<?php

namespace Core;

use App\controller\menuController;

class MVC
{
    use Router, UrlEngine;

    public function run()
    {

        $callable = $this->match($this->method(), $this->path());

        if (!$callable){
            throw new \Exception('Oops! you are lost', 404);
        }

        $class = "App\\controller\\".$callable['class'];

        if (!class_exists($class)){
            throw new \Exception('Class does not exist', 500);
        }

        $method = $callable['method'];

        if (!is_callable($class, $method)){
            throw new \Exception("$method is not a valid method in class $callable[class]", 500);
        }
        $class = new $class();


        $class->$method();
    }

    private function match($method, $url)
    {
        foreach (self::$map[$method] as $uri=>$call){
            if (substr($url, -1) === '/' && $uri != '/'){
                $url = substr($url, 0, -1);
            }
            if ($url == $uri){
                return $call;
            }
        }
        return false;
    }
}