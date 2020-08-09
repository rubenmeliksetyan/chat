<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }

    public function recipient()
    {
        return $this->hasOne(User::class, 'id', 'to');
    }
}
