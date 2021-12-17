<?php

namespace Dev\App\Models;

use Sketch\Framework\Database\Easer;

class User extends Easer
{
    protected $table = 'students';

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $classroom_id;
}