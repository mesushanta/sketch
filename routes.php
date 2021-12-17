<?php

use Sketch\Framework\Routing\Route;

use Dev\App\Controllers\WelcomeController as Welcome;

Route::get('index.php', function() {
    Welcome::welcome();
});
