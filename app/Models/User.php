<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'persona_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'persona_id');
    }

    public function roles()
    {
        return $this->hasMany(Rol::class, 'user_id', 'id');
    }

    public function responsables_id()
    {
        $resp = array();
        foreach ($this->roles() as $role) {
            array_push($resp, $role->entidad->responsable->id);
        }
        return $resp;

    }


    /* Determinar si pertence a una oficina */
    public function esDireccionEscuela()
    {
        if ($this->roles->where('entidad_id', 1)->count()) {
            return true;
        }
        return false;
    }

    public function esDepartamentoAcademico()
    {
        if ($this->roles->where('entidad_id', 2)->count()) {
            return true;
        }
        return false;
    }

    public function esOGE()
    {
        if ($this->roles->where('entidad_id', 3)->count()) {
            return true;
        }
        return false;
    }

    public function esDocente()
    {
        if ($this->roles->where('entidad_id', 4)->count()) {
            return true;
        }
        return false;
    }

    public function esDecanatura()
    {
        if ($this->roles->where('entidad_id', 5)->count()) {
            return true;
        }
        return false;
    }

    public function esDireccionUnidadCalidad()
    {
        if ($this->roles->where('entidad_id', 6)->count()) {
            return true;
        }
        return false;
    }

    public function esBiblioteca()
    {
        if ($this->roles->where('entidad_id', 7)->count()) {
            return true;
        }
        return false;
    }

    public function esComiteTutoria()
    {
        if ($this->roles->where('entidad_id', 8)->count()) {
            return true;
        }
        return false;
    }

    public function esEstudiante()
    {
        if ($this->roles->where('entidad_id', 9)->count()) {
            return true;
        }
        return false;
    }

    public function esVicerrectoradoAcademico()
    {
        if ($this->roles->where('entidad_id', 10)->count()) {
            return true;
        }
        return false;
    }

    public function esVicerrectoradoInvestigacion()
    {
        if ($this->roles->where('entidad_id', 11)->count()) {
            return true;
        }
        return false;
    }

    public function esDireccionUnidadRRSS()
    {
        if ($this->roles->where('entidad_id', 12)->count()) {
            return true;
        }
        return false;
    }

    public function esDireccionUnidadInvestigacion()
    {
        if ($this->roles->where('entidad_id', 13)->count()) {
            return true;
        }
        return false;
    }
}
