<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Module;

class ModuleObserver
{

    public function creating(Module $module)
    {
        $module->uuid = (string) Str::uuid();
    }

}
