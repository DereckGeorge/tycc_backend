<?php

namespace App\Filament\Resources\PartnershipOpportunityResource\Pages;

use App\Filament\Resources\PartnershipOpportunityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnershipOpportunities extends ListRecords
{
    protected static string $resource = PartnershipOpportunityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
