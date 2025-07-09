<?php

namespace App\Filament\Resources\PartnershipOpportunityResource\Pages;

use App\Filament\Resources\PartnershipOpportunityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnershipOpportunity extends EditRecord
{
    protected static string $resource = PartnershipOpportunityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
