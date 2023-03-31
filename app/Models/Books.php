<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = ['title', 'author', 'genre', 'description', 'isbn', 'image', 'publisher', 'published', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

    public static function getBooks()
    {
        $pageCount = 12;
        $pageNumber = request()->page ?? 1;
        $search = request()->search;
        return self::
            where(function ($query) use ($search) {
                if ($search) {
                    $query->where('author', 'like', '%' . $search . '%')
                        ->orWhere('title', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        // ->orWhere('published', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%');
                }
            })->paginate($pageCount, ['*'], 'page', $pageNumber);
    }
}