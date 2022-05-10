<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->string("picture")->nullable();
            $table->string("first");
            $table->string("last");
            $table->string("middle")->nullable();
            $table->string("number");
            $table->string("extension")->nullable();
            $table->string("birthdate");
            $table->string("place");
            $table->string("sex");
            $table->string("civil");
            $table->string("height");
            $table->string("weight");
            $table->string("blood");
            $table->string("gsis")->nullable();
            $table->string("pagibig")->nullable();
            $table->string("philhealth")->nullable();
            $table->string("sss")->nullable();
            $table->string("tin")->nullable();
            $table->string("citizenship")->nullable();
            $table->string("rhouse")->nullable();
            $table->string("rstreet")->nullable();
            $table->string("rvillage")->nullable();
            $table->string("rbarangay");
            $table->string("rcity");
            $table->string("rprovince");
            $table->string("rzip");
            $table->string("phouse")->nullable();
            $table->string("pstreet")->nullable();
            $table->string("pvillage")->nullable();
            $table->string("pbarangay");
            $table->string("pcity");
            $table->string("pprovince");
            $table->string("pzip");
            $table->string("telephone")->nullable();
            $table->string("mobile")->nullable();
            $table->string("alternate")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
};
