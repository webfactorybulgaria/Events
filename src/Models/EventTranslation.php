<?php

namespace TypiCMS\Modules\Events\Models;

use TypiCMS\Modules\Core\Custom\Models\BaseTranslation;

class EventTranslation extends BaseTranslation
{
    /**
     * get the parent model.
     */
    public function owner()
    {
        return $this->belongsTo('TypiCMS\Modules\Events\Custom\Models\Event', 'event_id')->withoutGlobalScopes();
    }
}
