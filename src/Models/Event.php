<?php

namespace TypiCMS\Modules\Events\Models;

use TypiCMS\Modules\Core\Custom\Traits\Translatable;
use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Custom\Models\Base;
use TypiCMS\Modules\History\Custom\Traits\Historable;

class Event extends Base
{
    use Historable;
    use Translatable;
    use PresentableTrait;

    protected $presenter = 'TypiCMS\Modules\Events\Custom\Presenters\ModulePresenter';

    protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'image',
        // Translatable columns
        'title',
        'slug',
        'status',
        'venue',
        'address',
        'summary',
        'body',
    ];

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'slug',
        'status',
        'venue',
        'address',
        'summary',
        'body',
    ];

    protected $appends = ['thumb'];

    /**
     * Append thumb attribute.
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }
}
