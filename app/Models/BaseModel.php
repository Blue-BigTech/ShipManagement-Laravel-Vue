<?php

namespace App\Models;

use App\Traits\BaseCrud;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use BaseCrud;
}
