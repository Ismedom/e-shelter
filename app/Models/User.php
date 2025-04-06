<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'user_type',
        'status',
        'otp',
        'otp_expired',
        'email_verified_at',
        'verififed_via',
        'role',
        'first_name',
        'last_name',
        ''
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    // user role
    const ADMIN = 'admin';
    const GUEST = 'guest';
    const SUPER_ADMIN = 'super_admin';
    const HOTEL_OWNER = 'hotel_owner';
    const HOTEL_STAFF = 'hotel_staff';

    // user status
    const STATUS_ACTIVE   = 'active';
    const STATUS_DRAFT    = 'draft';
    const STATUS_INACTIVE = 'inactive';

    // user type
    const PLATFORM_USER = 'platform_owner';
    const HOTEL_USER   = 'hotel_user';
    const GUEST_USER   = 'guest';

    // user verify method
    const VERIFY_VIA_EMAIL ='email';

    public function isRole($role){
        return $this->role == $role;
    }
}
