<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'user_id',
        'title',
        'path',
    ];

    public function elements_groups(){
        return $this->hasMany(BlogElementGroup::class, 'blog_id', 'id');
    }

}

class BlogElement extends Model
{
    use HasFactory;

    protected $table = 'blog_elements';
    protected $guarded = ['id'];
    protected $fillable = ['type', 'content', 'group_id'];
}

class BlogElementGroup extends Model
{
    use HasFactory;
    protected $table = 'blog_element_groups';
    protected $guarded = ['id'];
    protected $fillable = ['blog_id'];

    public function elements(){
        return $this->hasMany(BlogElement::class, 'group_id', 'id');
    }
}
