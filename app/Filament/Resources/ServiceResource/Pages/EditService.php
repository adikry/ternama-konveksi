<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    Storage::delete($record->thumbnail);

                    for ($i = 0; $i < count($record->content); $i++) {
                        if (Storage::exists($record->content[$i]['content_'])) {
                            Storage::delete($record->content[$i]['content_']);
                        }
                    }
                }),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        $data['content'] = array_filter($data['content'], function ($element) {
            return $element['content_'] !== null;
        });

        $diff = array_udiff($record->content, $data['content'], function ($dataRecord, $newData) {
            return $dataRecord['content_'] <=> $newData['content_'];
        });

        foreach ($diff as $element) {
            $index = array_search($element, $record->content);
            if ($index !== false) {

                if ($record->content[$index]['content_'] && Storage::exists($record->content[$index]['content_'])) {
                    Storage::delete($record->content[$index]['content_']);
                }
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
