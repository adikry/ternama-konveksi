<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\RelationManagers;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Hidden;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->required()
                                    ->reactive()
                                    ->debounce()
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                        if (($get('slug') ?? '') !== Str::slug($old)) {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    })
                                    ->maxLength(255),
                                Hidden::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                Forms\Components\Toggle::make('isActive')
                                    ->required()
                                    ->inline(false),
                                Forms\Components\FileUpload::make('thumbnail')
                                    ->required()
                                    ->image()
                                    ->optimize('webp')
                                    ->maxSize(1024)
                                    ->directory('service-display'),
                                Forms\Components\Textarea::make('description')
                                    ->rows(4),
                            ]),
                        Grid::make(1)
                            ->schema([
                                Repeater::make('content')
                                    ->schema([
                                        FileUpload::make('content_')
                                            ->image()
                                            ->maxSize(1028)
                                            ->optimize('webp')
                                            ->directory('services_content'),
                                        Textarea::make('content_desc')
                                            ->autosize()
                                    ])
                                    ->defaultItems(1)
                                    ->columns(2)
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->height(60),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')->view('filament.tables.columns.service.content'),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Storage::delete($record->thumbnail);
                        for ($i = 0; $i < $record->content; $i++) {
                            if (Storage::exists($record->content[$i]['content_'])) {
                                Storage::delete($record->content[$i]['content_']);
                            }
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            foreach ($records as $record) {
                                Storage::delete($record->thumbnail);
                                for ($i = 0; $i < $record->content; $i++) {
                                    if (Storage::exists($record->content[$i]['content_'])) {
                                        Storage::delete($record->content[$i]['content_']);
                                    }
                                }
                            }
                        }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
