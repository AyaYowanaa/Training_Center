<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('site_data')) {

            Schema::create('site_data', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image', 255)->nullable();
                $table->string('logo_footer', 255)->nullable();
                $table->text('name')->nullable();
                $table->string('email', 255)->nullable();
                $table->text('address')->nullable();
                $table->string('fax', 20)->nullable();
                $table->string('phone', 20)->nullable();
                $table->text('short_about')->nullable();
                $table->text('video')->nullable();
                $table->text('maplocation')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('twitter')->nullable();
                $table->string('snabchat')->nullable();
                $table->string('YouTube')->nullable();
                $table->string('Instagram')->nullable();
                $table->string('Facebook')->nullable();

                $table->timestamps();
            });
        }
     /************************************************************** */   
        if (!Schema::hasTable('site_blogs')) {

            Schema::create('site_blogs', function (Blueprint $table) {
                $table->id();
                $table->text('title')->nullable();
                $table->text('details')->nullable();
                $table->text('date_at')->nullable();
                $table->text('publisher')->nullable();
                $table->string('main_image')->nullable();
                $table->string('main_pdf')->nullable();


                $table->timestamps();
            });
        }
    /************************************************************** */

        if (!Schema::hasTable('site_blog_images')) {

            Schema::create('site_blog_images', function (Blueprint $table) {
                $table->id();
                $table->integer('blog_id')->nullable();
                $table->string('image')->nullable();
                $table->string('thumbnailmd')->nullable();
                $table->string('thumbnailsm')->nullable();
                $table->timestamps();
            });
        }
    /************************************************************** */
        if (!Schema::hasTable('site_blog_comments')) {
        Schema::create('site_blog_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('comment')->nullable();
            $table->enum('is_read',['no','yes'])->default('no')->nullable();
            $table->timestamps();
        });
    }
   /************************************************************** */

        if (!Schema::hasTable('site_abouts')) {

            Schema::create('site_abouts', function (Blueprint $table) {
                $table->id();
                $table->text('address')->nullable();
                $table->text('sub_address')->nullable();
                $table->text('details')->nullable();
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }
    /************************************************************** */
    
        if (!Schema::hasTable('site_services')) {

            Schema::create('site_services', function (Blueprint $table) {
                $table->id();
                $table->text('description')->nullable();
                $table->text('title')->nullable();
                $table->string('icon')->nullable();
                $table->timestamps();
            });
        }
    /************************************************************** */
   
        if (!Schema::hasTable('site_banners')) {

            Schema::create('site_banners', function (Blueprint $table) {
                $table->id();
                $table->string('image')->nullable();
                $table->string('thumbnailmd')->nullable();
                $table->string('thumbnailsm')->nullable();
                $table->text('title')->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
    /************************************************************** */
    
        if (!Schema::hasTable('site_contacts')) {
            Schema::create('site_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 255)->nullable();
                $table->string('email', 255)->nullable();
                $table->string('phone', 255)->nullable();
                $table->string('subject', 255)->nullable();
                $table->text('message')->nullable();
                $table->timestamps();
            });
        }
    /************************************************************** */    
     if (!Schema::hasTable('site_feedbacks')) {
    Schema::create('site_feedbacks', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->text('name')->nullable();
        $table->text('feedback')->nullable();
        $table->text('jop_title')->nullable();
    
        $table->timestamps();
    });
}
 /************************************************************** */
    
 if (!Schema::hasTable('site_parteners')) {

    Schema::create('site_parteners', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->text('link')->nullable();
        $table->text('title')->nullable();
    
        $table->timestamps();
    });
}
 /************************************************************** */
    
 if (!Schema::hasTable('site_statistics')) {


    Schema::create('site_statistics', function (Blueprint $table) {
        $table->id();
        $table->text('number')->nullable();
        $table->text('title')->nullable();
    
        $table->timestamps();
    });
}

 /************************************************************** */
    
 if (!Schema::hasTable('site_advantages')) {
    Schema::create('site_advantages', function (Blueprint $table) {
        $table->id();
        $table->text('description')->nullable();
        $table->text('title')->nullable();
        $table->string('icon')->nullable();
        $table->timestamps();
    });
}
 /************************************************************** */
    
 if (!Schema::hasTable('site_photo_images')) {

    Schema::create('site_photo_images', function (Blueprint $table) {
        $table->id();
        $table->integer('photo_id')->nullable();
        $table->string('image')->nullable();
        $table->string('thumbnailmd')->nullable();
        $table->string('thumbnailsm')->nullable();
        $table->timestamps();
    });
}
 /************************************************************** */
    
 if (!Schema::hasTable('site_photos')) {
    Schema::create('site_photos', function (Blueprint $table) {
        $table->id();
        $table->text('title')->nullable();
        $table->text('details')->nullable();
        $table->string('main_image')->nullable();
        $table->timestamps();
    });
}
 /************************************************************** */
    
 if (!Schema::hasTable('site_events')) {
    Schema::create('site_events', function (Blueprint $table) {
        $table->id();
        $table->text('title')->nullable();
        $table->text('details')->nullable();
        $table->string('date_at')->nullable();
        $table->string('from_time')->nullable();
        $table->string('to_time')->nullable();
        $table->string('location')->nullable();
        $table->string('location_map')->nullable();
        $table->string('publisher')->nullable();
        $table->string('main_image')->nullable();
        $table->timestamps();
    });
}
 /************************************************************** */
    
 if (!Schema::hasTable('site_event_images')) {

    Schema::create('site_event_images', function (Blueprint $table) {
        $table->id();
        $table->integer('event_id')->nullable();
        $table->string('image')->nullable();
        $table->string('thumbnailmd')->nullable();
        $table->string('thumbnailsm')->nullable();
        $table->timestamps();
    });
}
/************************************************************** */
    
if (!Schema::hasTable('site_videos')) {
    Schema::create('site_videos', function (Blueprint $table) {
        $table->id();
        $table->text('title')->nullable();
        $table->string('full_link')->nullable();
        $table->string('link_id')->nullable();
        $table->string('main_image')->nullable();
        $table->timestamps();
    });
}
/************************************************************** */
    
if (!Schema::hasTable('site_event_comments')) {
    Schema::create('site_event_comments', function (Blueprint $table) {
        $table->id();
        $table->integer('event_id')->nullable();
        $table->string('name')->nullable();
        $table->string('email')->nullable();
        $table->string('comment')->nullable();
        $table->enum('is_read',['no','yes'])->default('no')->nullable();

        $table->timestamps();
    });
}
 /******************************************************************** */
 
 if (!Schema::hasTable('site_staff')) {
 Schema::create('site_staff', function (Blueprint $table) {
    $table->id();
    $table->string('image')->nullable();
    $table->text('name')->nullable();
    $table->text('description')->nullable();
    $table->text('jop_title')->nullable();
    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->timestamps();

});

 }

 /********************************************************************* */
    
 if (!Schema::hasTable('site_polices')) {
    Schema::create('site_polices', function (Blueprint $table) {
        $table->id();
        $table->text('description')->nullable();
        $table->text('title')->nullable();
        $table->timestamps();
    });
}


/********************************************************************************************** */
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_data');
        Schema::dropIfExists('site_contacts');
        Schema::dropIfExists('site_banners');
        Schema::dropIfExists('site_services');
        Schema::dropIfExists('site_abouts');
        Schema::dropIfExists('site_blog_images');
        Schema::dropIfExists('site_blogs');
        Schema::dropIfExists('site_blog_comments');
        Schema::dropIfExists('site_feedbacks');
        Schema::dropIfExists('site_advantages');
        Schema::dropIfExists('site_statistics');
        Schema::dropIfExists('site_parteners');
        Schema::dropIfExists('site_photo_images');
        Schema::dropIfExists('site_photos');
        Schema::dropIfExists('site_events');
        Schema::dropIfExists('site_videos');
        Schema::dropIfExists('site_event_images');
        Schema::dropIfExists('site_event_comments');
        Schema::dropIfExists('site_staff');
        Schema::dropIfExists('site_polices');


 





    }
};
