<?php

namespace App;

class Applicaiton extends \Illuminate\Foundation\Application
{
    public function publicPath()
    {
        return dirname($this->basePath) . DIRECTORY_SEPARATOR;
    }
}
