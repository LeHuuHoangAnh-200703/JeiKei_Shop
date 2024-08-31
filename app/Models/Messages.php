<?php

namespace App\Models;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    protected $fillable = ['id', 'chat_id', 'user_id', 'admin_id', 'message', 'sent_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
