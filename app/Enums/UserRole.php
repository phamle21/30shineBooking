<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Support\Facades\Hash;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends Enum
{
    const Admin = 0;
    const Admin_Store = 1;
    const Customer = 2;
}
