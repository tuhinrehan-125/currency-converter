<?php

namespace App\Repositories\Eloquent;
use App\Models\Currency;
use App\Repositories\Contracts\ICurrency;
use App\Repositories\Eloquent\BaseRepository;

class CurrencyRepository extends BaseRepository implements ICurrency 
{
    public function model(){
        return Currency::class;
    }
}