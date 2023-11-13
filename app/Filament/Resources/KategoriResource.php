<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Kategori;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KategoriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KategoriResource\RelationManagers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Konten';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->debounce()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\Hidden::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\FileUpload::make('display')
                    ->required()
                    ->image()
                    ->resize(50)
                    ->optimize('webp')
                    ->maxSize(1024)
                    ->directory('kategori-display'),
                Forms\Components\FileUpload::make('sizeChart')
                    ->required()
                    ->image()
                    ->resize(50)
                    ->optimize('webp')
                    ->maxSize(1024)
                    ->directory('kategori-sizeChart'),
                Forms\Components\TextInput::make('desc')
                    ->maxLength(255),
                Forms\Components\Toggle::make('isActive')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('display')
                    ->height(60),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
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
                        if ($record->display != $data['display']) {
                            Storage::delete($record->display);
                        }

                        if ($record->sizeChart != $data['sizeChart']) {
                            Storage::delete($record->sizeChart);
                        }
                    }),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Storage::delete($record->display);
                        Storage::delete($record->sizeChart);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            foreach ($records as $item) {
                                Storage::delete($item->display);
                                Storage::delete($item->sizeChart);
                            }
                        }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKategoris::route('/'),
        ];
    }
}
