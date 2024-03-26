<?php

namespace App\Filament\Resources\DealStageResource\Pages;

use App\Filament\Resources\DealStageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDealStage extends EditRecord
{
    protected static string $resource = DealStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
