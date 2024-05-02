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
        Schema::table('users', function (Blueprint $table) {
            $table->string('uniqueid', 50)->nullable()->comment('Such as user ID');
            $table->string('phone', 50);
            $table->string('empid', 150)->comment('Employee ID');
            $table->string('idcard', 150)->comment('Citizen ID Card (NIK)');
            $table->enum('gender', ['male', 'female'])->notNull();
            $table->longText('photo')->nullable();
            $table->string('POB', 150)->notNull()->comment('Place of Birth');
            $table->date('DOB')->nullable()->comment('Date of Birth');
            $table->text('address')->nullable();
            $table->date('joindate')->nullable()->comment('Join first time into company');
            $table->string('companyid', 150)->nullable()->comment('Refer to company');
            $table->tinyInteger('isadmin')->default(0)->notNull();

            $table->index('companyid');
            $table->foreign('companyid')
                ->references('id')
                ->on('company')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
