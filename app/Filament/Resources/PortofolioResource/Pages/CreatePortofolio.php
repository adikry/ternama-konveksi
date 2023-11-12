<?php

namespace App\Filament\Resources\PortofolioResource\Pages;

use App\Filament\Resources\PortofolioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePortofolio extends CreateRecord
{
    protected static string $resource = PortofolioResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        $data['content'] = array_filter($data['content'], function ($element) {
            return $element['content'] !== null;
        });

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
