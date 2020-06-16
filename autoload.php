<?php

function controllers_autoload($claseName) {
    include 'controllers/'.$claseName.'.php';
}

spl_autoload_register('controllers_autoload');