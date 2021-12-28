<?php

    require_once "../bootstrap.php";

    $request = new Src\Request;

    $router->resolve($request);

?>