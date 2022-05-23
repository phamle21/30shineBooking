<?php

namespace App\Filament\Resources\EmployeeDetailResource\Pages;

use App\Filament\Resources\EmployeeDetailResource;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeDetails extends ListRecords
{
    protected static string $resource = EmployeeDetailResource::class;
}
