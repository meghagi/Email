<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;
class Contact extends Model
{
    use HasFactory;
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail="meghagangwal1201@gmail.com";
            $adminEmail1="gangwalpradeepkumar@gmail.com";
            $adminEmail2 ="aayushpatidar04@gmail.com";
            Mail::to($adminEmail,$adminEmail1,$adminEmail2)->send(new ContactMail($item));
        });
    }
}
