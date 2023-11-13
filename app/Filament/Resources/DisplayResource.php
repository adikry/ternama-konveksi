<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DisplayResource\Pages;
use App\Filament\Resources\DisplayResource\RelationManagers;
use App\Models\Display;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class DisplayResource extends Resource
{
    protected static ?string $model = Display::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Display Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('konten')
                    ->required()
                    ->options([
                        'Portofolio' => 'Portofolio',
                        'Blog' => 'Blog',
                        'Tentang' => 'Tentang',
                        'Kontak' => 'Kontak',
                    ])
                    ->label('Display Konten Page')
                    ->searchable(),
                Forms\Components\Toggle::make('isActive')
                    ->required(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->image()
                    ->resize(50)
                    ->optimize('webp')
                    ->maxSize(1024)
                    ->directory('display-thumb'),
                Textarea::make('desc')
                    ->rows(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->height(60),
                Tables\Columns\TextColumn::make('konten')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('isActive'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->before(function (Model $record, array $data) {
                        if ($record->thumbnail != $data['thumbnail']) {
                            Storage::delete($record->thumbnail);
                        }
                    }),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Storage::delete($record->thumbnail);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            foreach ($records as $record) {
                                Storage::delete($record->thumbnail);
                            }
                        }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        return $data;
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDisplays::route('/'),
        ];
    }
}
