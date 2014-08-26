<?php

namespace App\Modules\Project\Composers;

class TicketsComposer
{

    public function compose($view)
    {
        $view->with('tickets', array('tickets'));
    }
}
