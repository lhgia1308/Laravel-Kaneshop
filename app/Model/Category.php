<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    protected $casts = [
        'parent_id'  => 'integer',
        'position'   => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function translations()
    {
        // echo 'cal Category 1 translations';
        // var_dump($this->morphMany('App\Model\Translation', 'translationable'));
        return $this->morphMany('App\Model\Translation', 'translationable');
    }

    public function parent()
    {
        // echo 'cal Category 2 parent';
        // echo 'cal parent';
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childes()
    {
        // echo 'cal Category 3 childes';
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getNameAttribute($name)
    {
        // echo 'cal Category 4 getNameAttri';
        // echo "getNameAttribute: ".$name;
        if (auth('admin')->check() || auth('seller')->check()) {
            return $name;
        }
        return $this->translations[0]->value??$name;
    }

    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function($query){
                $language = \App\Model\BusinessSetting::where('type','default_language')->first();
                $default_language = 'en';
                if(isset($language)){
                    $default_language = json_decode($language['value'],true)['default_language'];
                }
                $locale = session()->get('locale')??$default_language;
                return $query->where('locale', $locale);
            }]);
        });
    }
}
