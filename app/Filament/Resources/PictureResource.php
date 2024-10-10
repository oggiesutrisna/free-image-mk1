<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PictureResource\Pages;
use App\Models\Picture;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PictureResource extends Resource
{
    protected static ?string $model = Picture::class;

    protected static ?string $slug = 'pictures';

    protected static ?string $navigationGroup = 'Input';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->columnSpan('full')
                        ->default(fn() => auth()->id())
                        ->required(),

                    FileUpload::make('picture')
                        ->preserveFilenames()
                        ->image()
                        ->columnSpan('full')
                        ->imageEditor()
                        ->required(),

                    TextInput::make('picture_name')
                        ->maxLength(150)
                        ->debounce(500)
                        ->live(true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('picture_slug', \Str::slug($state)))
                        ->required(),

                    TextInput::make('picture_slug')
                        ->label('Picture Slug')
                        ->alphaDash()
                        ->required(),

                    RichEditor::make('picture_description')
                        ->required()
                        ->columnSpan('full'),

                    Select::make('picture_category')
                        ->options([
                            'phone' => 'Phone',
                            'PC' => 'PC',
                        ])
                        ->preload()
                        ->searchable()
                        ->columnSpan('full')
                        ->required(),

                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->content(fn(?Picture $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                    Placeholder::make('updated_at')
                        ->label('Last Modified Date')
                        ->content(fn(?Picture $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                ])->columns(2)->icon('heroicon-o-camera')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Author')
                    ->sortable(),

                ImageColumn::make('picture')
                    ->label('Image')
                    ->circular(),

                TextColumn::make('picture_slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('picture_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('picture_description')
                    ->limit(15),

                TextColumn::make('picture_category')
                    ->searchable()
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPictures::route('/'),
            'create' => Pages\CreatePicture::route('/create'),
            'edit' => Pages\EditPicture::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['user']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['user.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        return $details;
    }
}
