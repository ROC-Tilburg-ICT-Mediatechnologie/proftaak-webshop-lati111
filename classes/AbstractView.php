<?php

namespace webshop;

abstract class AbstractView
{

    public function showView(string $viewName, array $vars)
    {
        foreach ($vars as $key=>$val){
            $$key = $val;
        }
        include("./views/$viewName.php");
    }
}