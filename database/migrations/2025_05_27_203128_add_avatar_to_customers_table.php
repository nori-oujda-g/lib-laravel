<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // il ya deux methodes pour stocker un fichier (image, fichier pdf, ....):
    // la methode blob : on stocke le code base64 du fichier
    // la methode simple : on stocke seulement le nom du fichier ou son lien 
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('avatar', 150)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
};
