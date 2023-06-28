<?php

namespace App\Nova;

use App\Exports\EventsExport;
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
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Query\Search\SearchableText;
use Laravel\Nova\Query\Search\SearchableRelation;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Actions\ExportAsCsv;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
// use Illuminate\Notifications\Action;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\Facades\FastExcel;






class Event extends Resource
{
    /**
    * Return the location to redirect the user after creation.
    *
    * @param \Laravel\Nova\Http\Requests\NovaRequest $request
    * @param \App\Nova\Resource $resource
    * @return string
    */
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }

    /**
     * Return the location to redirect the user after update.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param \App\Nova\Resource $resource
     * @return string
     */
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }
     /**
     * Return the location to redirect the user after deletion.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return string|null
     */
    public static function redirectAfterDelete(NovaRequest $request)
    {
        return null;
    }

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
        'id','slug','tittle','venues',
    ];
    /**
     * The visual style used for the table. Available options are 'tight' and 'default'.
     *
     * @var string
     */
    public static $tableStyle = 'tight';
    public static $clickAction = 'select';
    public static $perPageOptions = [10,20,50];
    /**
     * Indicates whether Nova should check for modifications between viewing and updating a resource.
     *
     * @var bool
     */
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
            Slug::make('Slug')
                ->from('tittle')
                ->rules('required')
                ->updateRules('required','unique:events,slug,{{resourceId}}')
                ->creationRules('unique:events,tittle,{{resourceId}}')
                ->withMeta(['extraAttributes' => ['readonly' => true]])
                ->showOnPreview()
                ->sortable(),
            Text::make('Event Tittle', 'tittle')
            ->rules('required')
            ->updateRules('required','unique:events,tittle,{{resourceId}}')
            ->creationRules('unique:events,tittle,{{resourceId}}')
            ->sortable()->showOnPreview()
            ->help('Type your Event Tittle'),
            Markdown::make('Description')->showOnPreview(),
            Image::make('Thumbnail')->disk('public')->path('images/events/thumbnail')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->hideFromIndex()->showOnPreview()->prunable(),
            Image::make('Poster')->disk('public')->path('images/events/poster')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->hideFromIndex()->showOnPreview()->prunable(),
            Image::make('Images')->disk('public')->path('images/events/images')
            ->thumbnail(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : null;
                })
            ->hideFromIndex()->showOnPreview()->prunable(),
            Text::make('Video Link', 'video_link')
            ->hideFromIndex()->sortable()->showOnPreview()->help('Type your Video Link'),
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
            DateTime::make('Start Date', 'start_date')
            ->sortable()->showOnPreview()
            ->displayUsing(fn ($value) => $value ? $value->format('d/m/Y, g:ia') : ''),
            DateTime::make('End Date', 'end_date')
            ->sortable()->showOnPreview()
            ->displayUsing(fn ($value) => $value ? $value->format('d/m/Y, g:ia') : ''),
            // DateTime::make('Start Time','start_time')->sortable()->showOnPreview(),
            // DateTime::make('End Time','end_time')->sortable()->showOnPreview(),
            // Image::make('Thumb'),
            Boolean::make('Status','status')
            ->trueValue('1')
            ->falseValue('0')
            ->withMeta(['value' => $this->status ?? true])
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
        return [

            // (new DownloadExcel)
            // ->onSuccess(function() {
            //     return Action::message('Your export is ready for you! :)');
            // })
            // ->onFailure(function() {
            //      return Action::danger('Oh dear! I could not create that export for you :(.');
            // }),
            (new DownloadExcel)->withFilename('users-' . time() . '.xlsx'),

            // $this->export(),

        ];
    }

}
