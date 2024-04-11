<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];


    /**
     * Liaison avec le modèle Role
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getRole() : string
    {
        return strtolower($this->role->name);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return strtolower($this->role->name) === 'admin';
    }

    public static function register($name, $email, $password, $roleName, &$createdUser = null) : bool
    {
        try {
            $role = Role::query()->where('name', strtolower($roleName))->firstOrFail();
             if(!($user = self::create([
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
                'role_id'  => $role->id
            ]))) {
               throw new \Exception("Erreur lors de la création de l'utilisateur. Veuillez réessayer.");
            }

            $createdUser = $user;
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
