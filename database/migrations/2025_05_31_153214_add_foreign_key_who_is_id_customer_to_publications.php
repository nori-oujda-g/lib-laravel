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
        // Relation Ships:
        // one to one 1-1
        // one to many 1-n
        // many to one n-1 (or one to many inversed, or belongs to)
        // many to many 
        Schema::table('publications', function (Blueprint $table) {
            // unsigned Integer : entier positive 
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            // on lie customer_id comme clé etrangère avec la clé primère id dans customers 
            // après ce codage on lance dans cli : php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn('customer_id');
        });
    }
};
