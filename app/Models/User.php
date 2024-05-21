<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->role === "admin")
        {
            return true;
        }
        return false;
    }
    public function isLibrarian()
    {
        if ($this->role === "Librarian")
        {
            return true;
        }
        return false;
    }
    public function isMember()
    {
        if ($this->role === "Member")
        {
            return true;
        }
        return false;
    }



    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function getLoans()
    {
        $this->getLoans = Loan::where('user_id', Auth::user()->getId())
            ->get();
        return $this->getLoans;
    }

    protected $pendingLoans = 'pendingLoans';
    protected $overdueOrActiveLoans = 'overdueLoans';
    protected $returnedLoans = 'returnedLoans';
    protected $messages = 'messages';

    public function pendingLoans()
    {
        $this->pendingLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'pending')
            ->get();
        return $this->pendingLoans;
    }

    public function overdueLoans()
    {
        $this->pendingLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'overdue')
            ->get();
        return $this->pendingLoans;
    }

    public function activeLoans()
    {
        $this->pendingLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'active')
            ->get();
        return $this->pendingLoans;
    }

    public function rejectedLoans()
    {
        $this->pendingLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'rejected')
            ->get();
        return $this->pendingLoans;
    }
    public function overdueOrActiveLoans()
    {
        /*$this->overdueOrActiveLoans = Loan::where('user_id', Auth::user()->getId())->get();*/
        $this->overdueOrActiveLoans = Loan::where('user_id', Auth::user()->getId())
            ->where(function ($query) {
                $query->where('status', 'Active')
                    ->orWhere('status', 'Overdue');
            })->get();
        return $this->overdueOrActiveLoans;
    }
    public function returnedLoans()
    {
        $this->returnedLoans = Loan::where('user_id', Auth::user()->getId())
            ->where('status', 'returned')
            ->get();
        return $this->returnedLoans;
    }

    public function getMessages()
    {
        $this->messages = Message::where('user_id', Auth::user()->getId())->get();
        return $this->messages;
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
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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
}
