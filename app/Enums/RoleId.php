<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RoleId extends Enum
{
    const ADMIN = 1;
    const LENDER = 2;
    const VIEWER = 3;
}
