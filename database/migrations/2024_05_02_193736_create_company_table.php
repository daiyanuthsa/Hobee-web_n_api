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
        Schema::create('company', function (Blueprint $table) {
            $table->id('id')->comment('Data record ID');
            $table->string('code', 100)->unique()->notNull();
            $table->string('name', 100)->notNull();
            $table->text('address')->notNull();
            $table->string('contactno', 100)->notNull();
            $table->longText('headerlogo')->nullable();
            $table->longText('footerlogo')->nullable();
            $table->longText('simplelogo')->nullable();
            $table->timestamp('recorded')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('isdefault')->default(0);
            $table->tinyInteger('isactive')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
