<?php

namespace App\Nova;

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
use Laravel\Nova\Http\Requests\NovaRequest;

class Venue extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Venue>
     */
    public static $model = \App\Models\Venue::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'tittle';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','tittle','country_code','address',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            // $table->string('description');

            Slug::make('Slug')
                ->from('tittle')
                ->required()
                ->withMeta(['extraAttributes' => ['readonly' => true]])
                ->showOnPreview()
                ->sortable(),
            Text::make('Venue Tittle', 'tittle')->sortable()->required()
            ->showOnPreview()
            ->help('Type your Venue Tittle'),
            Markdown::make('Description')
            ->showOnPreview(),
            Text::make('Venue Type','type')
            ->showOnPreview(),
            Markdown::make('Address')
            ->showOnPreview(),
            Place::make('City'),
            Text::make('State'),
            Country::make('Country','country_code'),
            Text::make('Zip Code','zipcode'),
            Text::make('Latitude'),
            Text::make('Longitude'),
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
            ->showOnPreview(),
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