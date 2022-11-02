<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable =['key','value','type','slug','status'];

    public function setting_alt()
    {
        return $this->hasOne(SettingImageAlt::class,'setting_id');
    }
    public static function value($kay)
    {

        if ($setting = Setting::select('value')->where('slug',$kay)->where('status','1')->first()){
            return $setting->value;
        }
        else{
            return '';
        }
    }
    public static function key($kay)
    {
        if ($setting = Setting::select('key')->where('slug',$kay)->where('status','1')->first()){
            return $setting->key;
        }
        else{
            return '';
        }
    }

    public static function create_slug($string)
    {
        $replace = '-';

        $string = strtolower($string);

//        replace / and . with white space
        $string = preg_replace("/[\/\.]/"," ",$string);
        $string = preg_replace("/[^a-z0-9\s-]/","",$string);

//        remove multiple dashes or whitespace
        $string = preg_replace("/[\s-]+/"," ",$string);

//        convert whitespaces and underscore to $replace
        $string = preg_replace("/[\s_]/",$replace,$string);

        //        limit the string size
        $string = substr($string,0,100);

//      slug is generated
        return $string;
    }
}
