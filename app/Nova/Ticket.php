<?php

namespace App\Nova;

use App\Models\Ticket as ModelsTicket;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

// use Locale;
// use Symfony\Polyfill\Intl\Icu\Locale;


class Ticket extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Ticket>
     */
    public static $model = ModelsTicket::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','slug','tittle','sale_start_date','sale_end_date',
    ];
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }
    public static function redirectAfterDelete(NovaRequest $request)
    {
        return null;
    }
    public static $tableStyle = 'tight';
    public static $clickAction = 'select';
    public static $perPageOptions = [10,20,50];
    public static $trafficCop = true;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            // ID::make()->sortable(),
            Slug::make('Slug')
                ->from('tittle')
                ->rules('required')
                ->updateRules('required','unique:events,slug,{{resourceId}}')
                ->creationRules('unique:events,tittle,{{resourceId}}')
                ->withMeta(['extraAttributes' => ['readonly' => true]])
                ->showOnPreview()
                ->sortable()
                ->hideFromIndex(),
            Text::make('Ticket Tittle', 'tittle')
                ->rules('required')
                ->updateRules('required','unique:tickets,tittle,{{resourceId}}')
                ->creationRules('unique:tickets,tittle,{{resourceId}}')
                ->sortable()->showOnPreview()
                ->help('Type your Ticket Tittle'),
            Currency::make('Price')
                ->sortable()->showOnPreview()
                ->symbol('Rp.')
                ->nullable()
                ->min(100)->max(1000000)->step(100),
            Number::make('Quantity')
                ->sortable()->showOnPreview(),
            Markdown::make('Description'),
            Number::make('Buying Limit', 'customer_limit')
                ->sortable()->showOnPreview(),
            DateTime::make('Sale Start Date', 'sale_start_date')
                ->displayUsing(fn ($value) => $value ? $value->format('d/m/Y, g:ia') : '')
                ->sortable()->showOnPreview()
                ->hideFromIndex(),
            DateTime::make('Sale End Date', 'sale_end_date')
                ->displayUsing(fn ($value) => $value ? $value->format('d/m/Y, g:ia') : '')
                ->sortable()->showOnPreview()
                ->hideFromIndex(),
            Boolean::make('Donation?', 'is_donation'),
            Boolean::make('Status'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}