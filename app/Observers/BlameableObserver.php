<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    public function creating(Model $model)
    {
        $model->created_by = Auth::user()->nip;
        $model->updated_by = Auth::user()->nip;
    }

    public function updating(Model $model)
    {
        $model->updated_by = Auth::user()->nip;
    }

    public function deleting(Model $model)
    {
        $model->deleted_by = Auth::user()->nip;
    }
}
