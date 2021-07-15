<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\Auditable;

class Task extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'tasks';

    protected $appends = [
        'attachment',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'done_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'start_date',
        'end_date',
        'done_time',
        'done',
        'assigned_to_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function tags()
    {
        return $this->belongsToMany(TaskTag::class);
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment')->last();
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . " " . config('panel.time_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . " " . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
    
    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . " " . config('panel.time_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . " " . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
    public function getDoneTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . " " . config('panel.time_format')) : null;
    }
    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . " " . config('panel.time_format')) : null;
    }
    public function custom_date($value)
    {
        return  $value ? Carbon::createFromFormat(config('panel.date_format') . " " . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }


    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
