<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model {
    use HasFactory, SoftDeletes;

    const STATUSES = ['pending','in-progress','completed'];

    protected $fillable = ['user_id','title','description','status','due_date'];
    protected $casts    = ['due_date' => 'date:Y-m-d'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeStatus($q, $s) { return $q->where('status',$s); }
    public function scopeDueBefore($q, $d) { return $q->whereDate('due_date','<=',$d); }
    public function scopeDueAfter($q, $d) { return $q->whereDate('due_date','>=',$d); }
}