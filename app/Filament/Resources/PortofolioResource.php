<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Portofolio;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PortofolioResource\Pages;
use App\Filament\Resources\PortofolioResource\RelationManagers;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                    ->maxLength(255)
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                        if (($get('slug') ?? '') !== Str::slug($old)) {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\Toggle::make('isActive')
                                    ->required()
                                    ->inline(false),
                                Forms\Components\Hidden::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                Forms\Components\RichEditor::make('desc')
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                    ])
                                    ->required(),
                                Forms\Components\FileUpload::make('thumbnail')
                                    ->required()
                                    ->image()
                                    ->optimize('webp')
                                    ->maxSize(1024)
                                    ->directory('head-porto'),
                                Forms\Components\Select::make('kategori_id')
                                    ->relationship('kategori', 'nama')
                                    ->searchable(['nama'])
                                    ->preload()
                                    ->required(),
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->required()
                                    ->default(now()),
                                Repeater::make('content')
                                    ->columnSpanFull()
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\FileUpload::make('content')
                                                    ->image()
                                                    ->maxSize(1024)
                                                    ->optimize('webp')
                                                    ->directory('content-porto'),
                                            ])
                                    ])
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
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->since()
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Storage::delete($record->thumbnail);
                        for ($i = 0; $i < count($record->content); $i++) {
                            Storage::delete($record->content[$i]['content']);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            foreach ($records as $record) {
                                Storage::delete($record->thumbnail);
                                for ($i = 0; $i < count($record->content); $i++) {
                                    Storage::delete($record->content[$i]['content']);
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
            'index' => Pages\ListPortofolios::route('/'),
            'create' => Pages\CreatePortofolio::route('/create'),
            'edit' => Pages\EditPortofolio::route('/{record}/edit'),
        ];
    }
}
