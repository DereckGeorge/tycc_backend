<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershipApplicationResource\Pages;
use App\Filament\Resources\MembershipApplicationResource\RelationManagers;
use App\Models\MembershipApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembershipApplicationResource extends Resource
{
    protected static ?string $model = MembershipApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Membership Applications';
    
    protected static ?string $modelLabel = 'Membership Application';
    
    protected static ?string $pluralModelLabel = 'Membership Applications';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Application Information')
                    ->schema([
                        Forms\Components\TextInput::make('application_id')
                            ->label('Application ID')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'under_review' => 'Under Review',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('member_id')
                            ->label('Member ID')
                            ->disabled()
                            ->dehydrated(false),
                    ])->columns(3),

                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->required(),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('nationality')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('region')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('district')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(1000),
                    ])->columns(2),

                Forms\Components\Section::make('Education Information')
                    ->schema([
                        Forms\Components\Select::make('highest_level')
                            ->options([
                                'primary' => 'Primary School',
                                'secondary' => 'Secondary School',
                                'diploma' => 'Diploma',
                                'bachelor' => 'Bachelor\'s Degree',
                                'master' => 'Master\'s Degree',
                                'phd' => 'PhD',
                                'other' => 'Other',
                            ]),
                        Forms\Components\TextInput::make('institution')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('field_of_study')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('graduation_year')
                            ->numeric()
                            ->minValue(1950)
                            ->maxValue(date('Y') + 10),
                    ])->columns(2),

                Forms\Components\Section::make('Business Information')
                    ->schema([
                        Forms\Components\Toggle::make('has_business')
                            ->label('Do you have a business?'),
                        Forms\Components\TextInput::make('business_name')
                            ->maxLength(255)
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                        Forms\Components\Select::make('business_type')
                            ->options([
                                'technology' => 'Technology',
                                'agriculture' => 'Agriculture',
                                'manufacturing' => 'Manufacturing',
                                'services' => 'Services',
                                'retail' => 'Retail',
                                'healthcare' => 'Healthcare',
                                'education' => 'Education',
                                'other' => 'Other',
                            ])
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                        Forms\Components\Select::make('business_stage')
                            ->options([
                                'idea' => 'Idea Stage',
                                'startup' => 'Startup',
                                'established' => 'Established',
                                'scaling' => 'Scaling',
                            ])
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                        Forms\Components\Select::make('registration_status')
                            ->options([
                                'unregistered' => 'Unregistered',
                                'registered' => 'Registered',
                                'in_process' => 'In Process',
                            ])
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                        Forms\Components\TextInput::make('employees_count')
                            ->numeric()
                            ->minValue(0)
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                        Forms\Components\TextInput::make('annual_revenue')
                            ->maxLength(255)
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                        Forms\Components\Textarea::make('business_description')
                            ->maxLength(1000)
                            ->visible(fn (Forms\Get $get): bool => $get('has_business')),
                    ])->columns(2),

                Forms\Components\Section::make('Interests & Skills')
                    ->schema([
                        Forms\Components\CheckboxList::make('programs_of_interest')
                            ->options([
                                'entrepreneurship' => 'Entrepreneurship',
                                'leadership' => 'Leadership',
                                'networking' => 'Networking',
                                'mentorship' => 'Mentorship',
                                'training' => 'Training Programs',
                                'funding' => 'Funding Opportunities',
                                'market_access' => 'Market Access',
                                'policy_advocacy' => 'Policy Advocacy',
                            ])
                            ->columns(2),
                        Forms\Components\CheckboxList::make('skills_to_develop')
                            ->options([
                                'business_planning' => 'Business Planning',
                                'financial_management' => 'Financial Management',
                                'marketing' => 'Marketing',
                                'digital_skills' => 'Digital Skills',
                                'leadership' => 'Leadership',
                                'communication' => 'Communication',
                                'project_management' => 'Project Management',
                                'innovation' => 'Innovation',
                            ])
                            ->columns(2),
                        Forms\Components\Toggle::make('mentorship_interest')
                            ->label('Interested in mentorship?'),
                        Forms\Components\Toggle::make('volunteer_interest')
                            ->label('Interested in volunteering?'),
                    ])->columns(2),

                Forms\Components\Section::make('Documents & Agreements')
                    ->schema([
                        Forms\Components\FileUpload::make('id_document')
                            ->label('ID Document')
                            ->acceptedFileTypes(['image/*', 'application/pdf'])
                            ->maxSize(5120),
                        Forms\Components\FileUpload::make('cv')
                            ->label('CV/Resume')
                            ->acceptedFileTypes(['image/*', 'application/pdf'])
                            ->maxSize(5120),
                        Forms\Components\FileUpload::make('business_certificate')
                            ->label('Business Certificate')
                            ->acceptedFileTypes(['image/*', 'application/pdf'])
                            ->maxSize(5120),
                        Forms\Components\Toggle::make('terms_and_conditions')
                            ->label('I agree to Terms and Conditions')
                            ->required(),
                        Forms\Components\Toggle::make('privacy_policy')
                            ->label('I agree to Privacy Policy')
                            ->required(),
                        Forms\Components\Toggle::make('code_of_conduct')
                            ->label('I agree to Code of Conduct')
                            ->required(),
                        Forms\Components\Toggle::make('newsletter_subscription')
                            ->label('Subscribe to newsletter'),
                    ])->columns(2),

                Forms\Components\Section::make('Review Information')
                    ->schema([
                        Forms\Components\DateTimePicker::make('reviewed_at')
                            ->label('Reviewed At'),
                        Forms\Components\KeyValue::make('status_history')
                            ->label('Status History')
                            ->keyLabel('Date')
                            ->valueLabel('Status'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('application_id')
                    ->label('Application ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                        'info' => 'under_review',
                    ]),
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
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'under_review' => 'Under Review',
                    ]),
                Tables\Filters\SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ]),
                Tables\Filters\Filter::make('has_business')
                    ->query(fn (Builder $query): Builder => $query->where('has_business', true)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (MembershipApplication $record) {
                        $record->update([
                            'status' => 'approved',
                            'reviewed_at' => now(),
                        ]);
                    })
                    ->visible(fn (MembershipApplication $record): bool => $record->status !== 'approved'),
                Tables\Actions\Action::make('reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (MembershipApplication $record) {
                        $record->update([
                            'status' => 'rejected',
                            'reviewed_at' => now(),
                        ]);
                    })
                    ->visible(fn (MembershipApplication $record): bool => $record->status !== 'rejected'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('approve_selected')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update([
                                    'status' => 'approved',
                                    'reviewed_at' => now(),
                                ]);
                            });
                        }),
                    Tables\Actions\BulkAction::make('reject_selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update([
                                    'status' => 'rejected',
                                    'reviewed_at' => now(),
                                ]);
                            });
                        }),
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
            'index' => Pages\ListMembershipApplications::route('/'),
            'create' => Pages\CreateMembershipApplication::route('/create'),
            'edit' => Pages\EditMembershipApplication::route('/{record}/edit'),
        ];
    }
}
