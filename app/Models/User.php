<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $email
 * @property string $user_name
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property int $role_id
 * @property \App\Models\Role $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @mixin \Eloquent
 */
class User extends BaseUser
{
   use Notifiable;
   protected $primaryKey = 'user_id';

   protected $hidden = ['password', 'remember_token'];
   protected $fillable = ['email', 'password'];
   public static function validationRules(): array
   {
      return [
         'email' => ['required'],
         'password' => ['required'],


      ];
   }
   public static function validationMessages(): array
   {
      return [
         'email.required' => 'Por favor, ingrese su email',
         'password.required' => 'Por favor, ingrese su contraseña.',
      ];
   }


   public function role(): BelongsTo
   {
      return $this->belongsTo(Role::class, 'role_id', 'role_id');
   }


   public function products(): BelongsToMany
   {
      return $this->belongsToMany(
         Product::class,
         'users_has_products',
         'user_id',
         'product_id',
         'user_id',
         'product_id'

      );
   }
   public function orders()
   {
       return $this->hasMany(Order::class, 'user_id');
   }

   //Para agregar el boton que redirige de la web al dashboard.
   public function isAdmin(): bool
    {
        return $this->role->name === 'admin';
    }

}
