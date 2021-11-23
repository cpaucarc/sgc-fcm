<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'email',
        'password',
        'persona_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'persona_id')
            ->with('estudiante');
    }

    public function trabajo()
    {
        return $this->hasMany(UserOficina::class, 'user_id', 'id')
            ->with('entidad', 'oficina');
    }

    public function responsables_id()
    {
        return Auth::user()->trabajo->pluck('entidad.responsable.id');
    }

    /* Determinar si pertence a una oficina */

    /*
    public function esDireccionEscuela()
    {
        return (bool)$this->roles->where('entidad_id', 1)->count();
    }

    public function esDepartamentoAcademico()
    {
        return (bool)$this->roles->where('entidad_id', 2)->count();
    }

    public function esOGE()
    {
        return (bool)$this->roles->where('entidad_id', 3)->count();
    }

    public function esDocente()
    {
        return (bool)$this->roles->where('entidad_id', 4)->count();
    }

    public function esDecanatura()
    {
        return (bool)$this->roles->where('entidad_id', 5)->count();
    }

    public function esDireccionUnidadCalidad()
    {
        return (bool)$this->roles->where('entidad_id', 6)->count();
    }

    public function esBiblioteca()
    {
        return (bool)$this->roles->where('entidad_id', 7)->count();
    }

    public function esComiteTutoria()
    {
        return (bool)$this->roles->where('entidad_id', 8)->count();
    }

    public function esEstudiante()
    {
        return (bool)$this->roles->where('entidad_id', 9)->count();
    }

    public function esVicerrectoradoAcademico()
    {
        return (bool)$this->roles->where('entidad_id', 10)->count();
    }

    public function esVicerrectoradoInvestigacion()
    {
        return (bool)$this->roles->where('entidad_id', 11)->count();
    }

    public function esDireccionUnidadRRSS()
    {
        return (bool)$this->roles->where('entidad_id', 12)->count();
    }

    public function esDireccionUnidadInvestigacion()
    {
        return (bool)$this->roles->where('entidad_id', 13)->count();
    }
    */
}
