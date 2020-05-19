<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class College extends BaseModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'colleges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'college_id', 'id');
    }

    public function i18n()
    {
        return $this->hasMany(CollegeI18n::class, 'college_id', 'id');
    }
}
