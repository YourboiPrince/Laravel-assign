<?php

namespace App\Filament\Resources\ContactsResource\Pages;

use App\Filament\Resources\ContactsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContacts extends CreateRecord
{
    protected static string $resource = ContactsResource::class;
}
