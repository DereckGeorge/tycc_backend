<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\News;
use App\Models\Partner;
use App\Models\Program;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Programs', Program::count())
                ->description('Active programs in the system')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),
            
            Stat::make('Total News Articles', News::count())
                ->description('Published news articles')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),
            
            Stat::make('Total Events', Event::count())
                ->description('Upcoming and past events')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('warning'),
            
            Stat::make('Total Partners', Partner::count())
                ->description('Registered partners')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
        ];
    }
}
