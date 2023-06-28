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
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Avatar;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Http\Requests\NovaRequest;

class EventTag extends Resource
{
    public static $model = \App\Models\EventTag::class;
    public static $title = 'tittle';
    public static $search = [
        'id','slug','tittle',
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
            Slug::make('Slug')
                ->from('tittle')
                ->required()
                ->withMeta(['extraAttributes' => ['readonly' => true]])
                ->showOnPreview()
                ->sortable()->hideFromIndex(),
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
            Text::make('Facebook')->hideFromIndex(),
            Text::make('Instagram')->hideFromIndex(),
            Text::make('Twitter')->hideFromIndex(),
            Text::make('Linkedin')->hideFromIndex(),
            // Avatar::make('Avatar')
            // ->disk('public')
            // ->path('images/event-tags')
            // ->store(function (Request $request, $model) {
            //     return [
            //         'avatar' => $request->avatar->storePublicly(config('app.env').
            //             '/avatars', ['disk' => 'public'])
            //     ];
            // })->preview(function () {
            //     return $this->value
            //                 ? Storage::disk($this->disk)->url($this->value)
            //                 : null;
            // })
            // ->prunable(),
            Avatar::make('Avatar')
            ->store(function (Request $request, $model) {
                return [
                    'avatar' => $request->avatar->storePublicly('images/event-tags'.
                        '/avatars', ['disk' => 'public'])
                ];
            })->preview(function () {
                return $this->value
                            ? Storage::disk($this->disk)->url($this->value)
                            : null;
            })->showOnPreview()
            ->prunable(),
            // Image::make('Images')
            // ->disk('public')
            // ->path('images/event-tags')
            // ->thumbnail(function ($value, $disk) {
            //         return $value
            //             ? Storage::disk($disk)->url($value)
            //             : null;
            //     })
            // ->showOnPreview()
            // ->prunable(),
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