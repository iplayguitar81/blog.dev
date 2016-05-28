<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserListImport extends Model
{
    public function getFile()
    {
        return storage_path('exports') . '/file.csv';
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }//
}
