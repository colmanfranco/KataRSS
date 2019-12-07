<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RSSSources extends Model
{
    private function allSources()
    {
        return RSSSource::all();
    }

    public function getAllSources()
    {
        return $this->allSources();
    }
}
