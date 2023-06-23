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
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Http\Requests\NovaRequest;

class EventTag extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\EventTag>
     */
    public static $model = \App\Models\EventTag::class;

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
        'id','slug','tittle',
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
            Text::make('Tittle')->sortable()->required()
            ->showOnPreview()
            ->help('Type your Tittle. example: Name of People, Product Sponsor, etc'),
            Text::make('Sub Tittle','subtittle')
            ->showOnPreview()
            ->help('Type your Sub Tittle. example: Engineer & Businessman, Programmer, Musician, Artist, etc'),
            Text::make('Type','type')
            ->showOnPreview()
            ->help('example: Perfomers, Speakers, Sponsor, Hosts, Co-Hosts, Chief Guests, etc'),
            Text::make('Website'),
            Markdown::make('Description')
            ->showOnPreview(),
            Text::make('Phone'),
            Text::make('Email'),
            Text::make('Facebook'),
            Text::make('Instagram'),
            Text::make('Twitter'),
            Text::make('Linkedin'),
            Image::make('Images')
            ->disk('public')
            ->path('images/event-tags')
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
