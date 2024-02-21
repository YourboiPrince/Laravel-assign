<?php

namespace App\Filament\Resources\DealStageResource\Pages;

use App\Filament\Resources\DealStageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDealStages extends ListRecords
{
    protected static string $resource = DealStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
