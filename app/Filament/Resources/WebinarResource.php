<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebinarResource\Pages;
use App\Filament\Resources\WebinarResource\RelationManagers;
use App\Models\Webinar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebinarResource extends Resource
{
    protected static ?string $model = Webinar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->options([
                                'business' => 'Business',
                                'technology' => 'Technology',
                                'marketing' => 'Marketing',
                                'finance' => 'Finance',
                                'leadership' => 'Leadership',
                                'general' => 'General',
                            ])
                            ->default('general')
                            ->required(),
                        Forms\Components\TextInput::make('duration')
                            ->required(),
                        Forms\Components\DatePicker::make('date')
                            ->required(),
                        Forms\Components\TimePicker::make('time'),
                        Forms\Components\TextInput::make('speaker')
                            ->required(),
                        Forms\Components\Toggle::make('featured')
                            ->default(false),
                        Forms\Components\Select::make('status')
                            ->options([
                                'published' => 'Published',
                                'draft' => 'Draft',
                                'archived' => 'Archived',
                            ])
                            ->default('published')
                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required(),
                        Forms\Components\Textarea::make('full_description'),
                        Forms\Components\Textarea::make('speaker_bio'),
                    ]),
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\TextInput::make('video_url')
                            ->required(),
                        Forms\Components\FileUpload::make('thumbnail'),
                        Forms\Components\TagsInput::make('tags'),
                        Forms\Components\KeyValue::make('resources'),
                    ])->columns(2),
                Forms\Components\Section::make('Registration')
                    ->schema([
                        Forms\Components\Toggle::make('registration_required')
                            ->default(false),
                        Forms\Components\TextInput::make('max_attendees')
                            ->numeric()
                            ->visible(fn (callable $get) => $get('registration_required')),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'business' => 'success',
                        'technology' => 'info',
                        'marketing' => 'warning',
                        'finance' => 'danger',
                        'leadership' => 'primary',
                        'general' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('speaker')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('views')
                    ->sortable(),
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'published',
                        'warning' => 'draft',
                        'danger' => 'archived',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListWebinars::route('/'),
            'create' => Pages\CreateWebinar::route('/create'),
            'edit' => Pages\EditWebinar::route('/{record}/edit'),
        ];
    }
}
