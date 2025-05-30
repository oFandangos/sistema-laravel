<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\sendPasswordMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $guarded = ['id'];

    /*
    protected $fillable = [
        'name',
        'email',
        'password',
        'codpes',
        'is_admin',
        'is_banned'
    ];
    */

    //pode ser usado para definir, por meio de um select, um admin 
    public static function usuarios(){
        $users = User::all();
        return $users;
    }

    public function products(){
        return $this->hasMany('App\Models\Produto');
    }

    public function avisos(){
        return $this->hasMany('App\Models\Aviso');
    }

    public function comentarios(){
        return $this->hasMany('App\Models\Comentario', 'comentario_usuario_id');
    }

}
