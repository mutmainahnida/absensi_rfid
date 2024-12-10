<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('name');
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
