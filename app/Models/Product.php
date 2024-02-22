<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Category;
use App\Models\Tag;

/**
 * App\Models\Product
 *
 * @property int $product_id
 * @property string $title
 * @property string $description
 * @property string $type_yoga
 * @property int $price
 * @property string|null $cover
 * @property string|null $cover_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCoverDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTypeYoga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @property-read Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @mixin \Eloquent
 */
class Product extends Model
{
  protected $primaryKey = 'product_id';
  protected $fillable = ['category_id', 'title', 'description', 'type_yoga', 'price', 'cover', 'cover_description'];

  protected $casts = [
    'price' => 'float', // Indicamos que el atributo 'price' es de tipo float
];
  public function getTagIds(): array
  {
    return $this->tags->pluck('tag_id')->all();
  }

 /*  protected function price(): Attribute
  {
    return Attribute::make(
      get: fn (int $value): float  => $value / 100,
      set: fn (float $value)       => $value * 100,
    );
  } */



  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id', 'category_id');
  }


  public function tags(): BelongsToMany
  {
    return $this->belongsToMany(
      Tag::class,
      'products_has_tags',
      'product_id',
      'tag_id',
      'product_id',
      'tag_id'

    );
  }
}
