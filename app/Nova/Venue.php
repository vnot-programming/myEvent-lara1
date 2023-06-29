<?php

namespace App\Nova;

use App\Models\Event;
use App\Models\Venue as ModelsVenue;
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
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Venue extends Resource
{
    public static $model = ModelsVenue::class;
    public static $title = 'tittle';
    public static $search = [
        'id','tittle','country_code','address',
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
    public function fields(NovaRequest $request)
    {
        return [
            // $table->string('description');

            Slug::make('Slug')
                ->from('tittle')
                ->rules('required')
                ->updateRules('required','unique:venues,slug,{{resourceId}}')
                ->creationRules('unique:venues,tittle,{{resourceId}}')
                ->withMeta(['extraAttributes' => ['readonly' => true]])
                ->showOnPreview()
                ->sortable(),
            Text::make('Venue Tittle', 'tittle')->sortable()->required()
            ->showOnPreview()
            ->help('Type your Venue Tittle'),
            Markdown::make('Description')
            ->showOnPreview(),
            Text::make('Venue Type','type')
            ->showOnPreview()->hideFromIndex(),
            Markdown::make('Address')
            ->showOnPreview(),
            Place::make('City'),
            Text::make('State')->hideFromIndex(),
            Country::make('Country','country_code')->hideFromIndex(),
            Text::make('Zip Code','zipcode')->hideFromIndex(),
            Text::make('Latitude')->hideFromIndex(),
            Text::make('Longitude')->hideFromIndex(),
            Image::make('Images')
            ->disk('public')
            ->path('images/venues')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->showOnPreview()
            ->prunable(),
           // Image::make('Thumb'),
            Boolean::make('Status','status')
            ->trueValue('1')
            ->falseValue('0')
            ->withMeta(['value' => $this->status ?? true])
            ->showOnPreview(),

            HasMany::make('Events')
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