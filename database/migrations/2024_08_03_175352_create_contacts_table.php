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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->string('name', 255);
            $table->string('gender')->nullable()->default(null);
            $table->string('designation')->nullable()->default(null);
            $table->string('language')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->integer('fax')->nullable()->default(null);
            $table->integer('phone_number')->nullable()->default(null);
            $table->integer('mobile_number')->nullable()->default(null);
            $table->integer('extension_number')->nullable()->default(null);
            $table->string('organisation_name')->nullable()->default(null);
            $table->string('organisation_department')->nullable()->default(null);
            $table->string('organisation_address')->nullable()->default(null);
            $table->string('personal_address_one')->nullable()->default(null);
            $table->string('personal_address_two')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('region')->nullable()->default(null);
            $table->string('zip_code')->nullable()->default(null);
            $table->string('postal_code')->nullable()->default(null);
            $table->foreignId('contact_list_id')->constrained('contact_lists')->onDelete('cascade');
            $table->foreignId('contact_category_id')->constrained('contact_categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
