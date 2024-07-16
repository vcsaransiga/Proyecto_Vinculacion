<?php

namespace App\Observers;

use App\Models\Kardex;

class KardexObserver
{
    /**
     * Handle the Kardex "created" event.
     */
    public function created(Kardex $kardex): void
    {
        //
    }

    public function creating(Kardex $kardex):void{
        
    }

    /**
     * Handle the Kardex "updated" event.
     */
    public function updated(Kardex $kardex): void
    {
        //
    }

    /**
     * Handle the Kardex "deleted" event.
     */
    public function deleted(Kardex $kardex): void
    {
        //
    }

    /**
     * Handle the Kardex "restored" event.
     */
    public function restored(Kardex $kardex): void
    {
        //
    }

    /**
     * Handle the Kardex "force deleted" event.
     */
    public function forceDeleted(Kardex $kardex): void
    {
        //
    }
}
