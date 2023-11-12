<?php

namespace App\Filament\Resources\PortofolioResource\Pages;

use App\Filament\Resources\PortofolioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditPortofolio extends EditRecord
{
    protected static string $resource = PortofolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    Storage::delete($record->thumbnail);
                    for ($i = 0; $i < count($record->content); $i++) {
                        Storage::delete($record->content[$i]['content']);
                    }
                }),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        if ($record->thumbnail != $data['thumbnail']) {
            Storage::delete($record->thumbnail);
        }

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
