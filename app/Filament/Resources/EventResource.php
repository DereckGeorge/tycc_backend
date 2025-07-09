<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

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
                                'conference' => 'Conference',
                                'workshop' => 'Workshop',
                                'seminar' => 'Seminar',
                                'networking' => 'Networking',
                                'training' => 'Training',
                                'exhibition' => 'Exhibition',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('location')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(500),
                    ])->columns(2),

                Forms\Components\Section::make('Date & Time')
                    ->schema([
                        Forms\Components\DatePicker::make('date')
                            ->required(),
                        Forms\Components\DatePicker::make('end_date'),
                        Forms\Components\TimePicker::make('time'),
                        Forms\Components\TimePicker::make('end_time'),
                    ])->columns(2),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(500),
                        Forms\Components\RichEditor::make('full_description')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Registration & Pricing')
                    ->schema([
                        Forms\Components\TextInput::make('attendees_limit')
                            ->numeric(),
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->prefix('$'),
                        Forms\Components\TextInput::make('currency')
                            ->default('USD')
                            ->maxLength(3),
                        Forms\Components\Toggle::make('registration_open')
                            ->label('Registration Open'),
                        Forms\Components\DatePicker::make('registration_deadline'),
                    ])->columns(2),

                Forms\Components\Section::make('Additional Information')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('events'),
                        Forms\Components\TagsInput::make('agenda')
                            ->separator(','),
                        Forms\Components\TagsInput::make('speakers')
                            ->separator(','),
                        Forms\Components\TagsInput::make('sponsors')
                            ->separator(','),
                        Forms\Components\TagsInput::make('requirements')
                            ->separator(','),
                    ])->columns(2),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('featured')
                            ->label('Featured Event'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'upcoming' => 'Upcoming',
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                                'draft' => 'Draft',
                            ])
                            ->default('upcoming')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'conference' => 'primary',
                        'workshop' => 'success',
                        'seminar' => 'info',
                        'networking' => 'warning',
                        'training' => 'danger',
                        'exhibition' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('registered_attendees')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('attendees_limit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('registration_open')
                    ->boolean(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'upcoming',
                        'info' => 'ongoing',
                        'warning' => 'completed',
                        'danger' => 'cancelled',
                        'gray' => 'draft',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'conference' => 'Conference',
                        'workshop' => 'Workshop',
                        'seminar' => 'Seminar',
                        'networking' => 'Networking',
                        'training' => 'Training',
                        'exhibition' => 'Exhibition',
                    ]),
                Tables\Filters\TernaryFilter::make('featured'),
                Tables\Filters\TernaryFilter::make('registration_open'),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                        'draft' => 'Draft',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
