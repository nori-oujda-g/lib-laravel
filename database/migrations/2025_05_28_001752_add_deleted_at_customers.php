<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // cette migration esr généré par la commande :
    // php artisan make:migration add_deleted_at_customers --table=customers
    // le but de cette colone ajouté (deleted_at) est de restorer une ligne supprimé
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // $table->dropColumn('deleted_at');
            $table->dropSoftDeletes();
        });
    }
    // après cette configuration on lance : php artisan migrate
};
