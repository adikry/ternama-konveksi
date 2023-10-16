<?php

namespace App\Filament\Resources\LandingPageResource\Pages;

use App\Filament\Resources\LandingPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditLandingPage extends EditRecord
{
    protected static string $resource = LandingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    for ($i = 0; $i < count($record->content); $i++) {
                        Storage::delete($record->content[$i]['content']);
                    }
                }),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        $data['content'] = array_filter($data['content'], function ($element) {
            return $element['content'] !== null;
        });

        for ($i = 0; $i < count($record->content); $i++) {
            if ($record->content[$i]['content'] != $data['content'][$i]['content']) {
                Storage::delete($record->content[$i]['content']);
            }
        }

        $record->update($data);

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
