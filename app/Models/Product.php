<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name', 
        'slug',
        'description',
        'metadata',
        'images',
        'category_id',
        'price'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    // public $timestamps = false;

       
    protected static function boot()
    {
        parent::boot();
        static::created(function ($product) {
            // $product->slug = $product->generateSlug($product->name);
            // $slug = $product->slug;
            
            $images = unserialize($product->images);

            $i=0;
            $product_images = [];
            foreach($images as $image){
                $i++;
                $image_name = $product->slug.'-'.$i.'.'.pathinfo($image->path, PATHINFO_EXTENSION);
                if(!file_exists(storage_path('/app/public/files/')))
                    mkdir(storage_path('/app/public/files/'), 0777, true);
                $img_main = Image::make(storage_path('/app/'.$image->path))
                ->save(storage_path('/app/public/files/'.$image_name));
                $img_xs = Image::make(storage_path('/app/'.$image->path))
                ->resize(50, 50)->save(storage_path('/app/public/files/'.'xs_'.$image_name));
                $img_sm = Image::make(storage_path('/app/'.$image->path))
                ->resize(150, 150)->save(storage_path('/app/public/files/'.'sm_'.$image_name));
                $img_lg = Image::make(storage_path('/app/'.$image->path))
                ->resize(300, 300)->save(storage_path('/app/public/files/'.'lg_'.$image_name));
                $product_images[] = [
                    'main' => $image_name,
                    'xs' => 'xs_'.$image_name,
                    'sm' => 'sm_'.$image_name,
                    'lg' => 'lg_'.$image_name,
                ];
                // Storage::move(storage_path('/app/public/temp_dir/'.$image), '/public/files/'.$image_name);
            }
            
            // $product->slug = $slug;
            $product->images = serialize($product_images);

            $product->save();
        });
    }
    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }    

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => unserialize($value),
            // set : fn ($value) => json_encode($value),
        );
    }
}
