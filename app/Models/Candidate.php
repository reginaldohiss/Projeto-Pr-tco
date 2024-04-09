<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Candidate extends Model
{
    use SoftDeletes;

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    /**
     * @var string
     */
    protected $table = 'candidates';

    public $timestamps = true;

    /**
     * @var string[]
     */
    protected $fillable = [
        'nome', 'vagas', 'status'
    ];

    protected $hidden = [
        'id'
    ];

    public function getVagasAttribute($values)
    {
        return json_decode($values);
    }

    public function getcreatedAtAttribute($value)
    {
        return date('d/m/y H:i');
    }
    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/y H:i');
    }
}
