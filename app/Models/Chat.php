<?php
namespace App\Models;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $fillable = ['id', 'user_id', 'admin_id', 'started_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
?>