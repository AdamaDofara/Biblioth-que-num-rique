<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // /**
    //  * Get the post that owns the Comment
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function post(): BelongsTo
    // {
    //     return $this->belongsTo(Post::class, 'foreign_key', 'other_key');
    // }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'post_id'
    ];

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
