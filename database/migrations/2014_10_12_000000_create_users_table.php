<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

        //    $table->string('roles_name')->nullable()->default('admin');
            // $table->string('status',10);//مفعل ولا لا موجود فعلا ولا لا
 //status متعرفه كسترينج عادى لكن انا عايز اعرفة ان هى اراى لان ممكن يبقى ليه اكتر من role روح على الموديل
 //بستخدم حاجه اسمها casts
//$table->array('roles_name');
 $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
