<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use App\Models\BookingDetail;
use Filament\Resources\Pages\Page;

class DetailBooking extends Page
{
    protected static string $resource = BookingResource::class;

    protected static ?string $model = BookingDetail::class;

    protected static string $view = 'filament.resources.booking-resource.pages.detail-booking';

    public $booking;
    public $booking_detail;

    public function mount($record)
    {
        $this->booking = Booking::find($record);
        $this->booking_detail = BookingDetail::where('booking_id', $record)->get();
    }
}
