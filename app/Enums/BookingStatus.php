<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BookingStatus extends Enum
{
    const Pending = 'Chưa xác nhận';
    const Canceled = 'Bị hủy bỏ';
    const Expired  = 'Hết hạn giải quyết';
    const Confirmed = 'Đã xác nhận';
    const Completed = 'Hoàn thành';
    const Failed = 'Thất bại';
}
