<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $news_id
 * @property string $title
 * @property string $subtitle
 * @property string|null $author
 * @property string $news_date
 * @property string $body
 * @property string|null $cover
 * @property string|null $cover_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCoverDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereNewsDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    protected $primaryKey = 'news_id';
    protected $fillable = ['title', 'subtitle', 'author', 'news_date', 'body', 'cover', 'cover_description'];
}
