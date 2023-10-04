<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'user_id',
        'message_id_comment',
        'image',
        'text_file',
    ];

    /**
     * Defines a many-to-one relationship between the Message model and the User model.
     *
     * This method allows you to get the user associated with a given message record via the user_id foreign key.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
