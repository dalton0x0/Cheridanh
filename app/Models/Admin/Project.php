<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover',
        'report',
        'category_id',
        'period_id',
    ];
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function period() : BelongsTo
    {
        return $this->belongsTo(Period::class);
    }
    public function getCoverUrl(): string
    {
        return Storage::disk('public')->url($this->cover);
    }
    public function getReportUrl(): string
    {
        return Storage::disk('public')->url($this->report);
    }
    public function getCoverPath()
    {
        return $this->cover ?? null;
    }
}
