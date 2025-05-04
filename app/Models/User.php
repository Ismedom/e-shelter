<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes, HasApiTokens;

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
        'current_owner_id',
        'is_hotel_owner',
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
    protected $dates = ['deleted_at'];
    
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
    const TYPE_PLATFORM_USER = 'platform_owner';
    const TYPE_HOTEL_USER    = 'hotel_user';
    const TYPE_GUEST_USER    = 'guest';

    // user verify method
    const VERIFY_VIA_EMAIL ='email';

    // check user role
    public function isRole($role){
        return $this->role == $role;
    }
    public function isSuperAdmin(){
        return $this->isRole(self::SUPER_ADMIN);
    }
    public function isAdmin(){
        return $this->isRole(self::ADMIN);
    }
    public function isHotelOwner(){
        return $this->isRole(self::HOTEL_OWNER);
    }
    public function isHotelStaff(){
        return $this->isRole(self::HOTEL_STAFF);
    }
    public function isGuest(){
        return $this->isRole(self::GUEST);
    }
    public function isPlatformUser(){
        return $this->isRole(self::TYPE_PLATFORM_USER);
    }

    // user status

    public function isActive(){
        return $this->status == self::STATUS_ACTIVE;
    }
    public function isDraft(){
        return $this->status == self::STATUS_DRAFT;
    }
    public function isInactive(){
        return $this->status == self::STATUS_INACTIVE;
    }
    public function isVerified(){
        return $this->email_verified_at != null;
    }
    public function isNotVerified(){
        return $this->email_verified_at == null;
    }
    public function isVerifiedViaEmail(){
        return $this->verififed_via == self::VERIFY_VIA_EMAIL;
    }

    // scopes query 
    public function scopeActive($query){
        return $query->where('status', self::STATUS_ACTIVE);
    }
    public function scopeInactive($query){
        return $query->where('status', self::STATUS_INACTIVE);
    }
    public function scopeDraft($query){
        return $query->where('status', self::STATUS_DRAFT);
    }
    public function scopeHotelOwner($query){
        return $query->where('role', self::HOTEL_OWNER);
    }
    public function scopeHotelStaff($query){
        return $query->where('role', self::HOTEL_STAFF);
    }
    public function scopeGuest($query){
        return $query->where('role', self::GUEST);
    }
    public function scopeSuperAdmin($query){
        return $query->where('role', self::SUPER_ADMIN);
    }


    // relationships
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    public function bussinessInformation(){
        return $this->hasOne(BusinessInformation::class, 'business_owner_id');
    }
    public function accommodations() {
        return $this->hasMany(Accommodation::class, 'business_owner_id');
    }
}
