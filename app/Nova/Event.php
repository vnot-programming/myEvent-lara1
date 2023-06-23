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
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Query\Search\SearchableText;
use Laravel\Nova\Query\Search\SearchableRelation;
use Laravel\Nova\Http\Requests\NovaRequest;



class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Event>
     */
    public static $model = \App\Models\Event::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'tittle';

    /**
     * Get the searchable columns for the resource.
     *
     * @return array
     */
    public static function searchableColumns()
    {
        return ['id', new SearchableRelation('venues', 'tittle')];
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            Slug::make('Slug')
                ->from('tittle')
                ->required()
                ->withMeta(['extraAttributes' => ['readonly' => true]])
                ->showOnPreview()
                ->sortable(),
            Text::make('Event Tittle', 'tittle')->sortable()->showOnPreview()
            ->help('Type your Event Tittle')->required(),
            Markdown::make('Description')->showOnPreview(),
            Image::make('Thumbnail')->disk('public')->path('images/events/thumbnail')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->showOnPreview()->prunable(),
            Image::make('Poster')->disk('public')->path('images/events/poster')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->showOnPreview()->prunable(),
            Image::make('Images')->disk('public')->path('images/events/images')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->showOnPreview()->prunable(),
            Text::make('Video Link', 'video_link')->sortable()->showOnPreview()->help('Type your Video Link'),
            // HasMany::make('Venues'),
            // belongsTo::make('Venues')->sortable()->searchable()->showOnPreview(),
            // BelongsTo::make('Venues')
            // ->relatableQueryUsing(function (NovaRequest $request, Builder $query) {
            //     $query->whereIn('tittle', ['images', 'tittle']);
            // })->sortable()->searchable()->showOnPreview(),
            // Select::make("Venues")
            // ->relationship("venues",Venue::class)->searchable()->preload(),
            belongsTo::make('Venues','venues',Venue::class)
                ->sortable()->searchable()->showOnPreview()
                ->help('Search the Venues'),
            Date::make(__('Start Date'), 'start_date')->sortable()->showOnPreview(),
            Date::make(__('End Date'), 'end_date')->sortable()->showOnPreview(),
            DateTime::make('Start Time','start_time')->sortable()->Carbon::today(),
            DateTime::make('End Time','end_time')->sortable()->showOnPreview(),
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