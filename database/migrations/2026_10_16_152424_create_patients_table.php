
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // The first migration already creates the patients table.
        // Do not create it again.
    }

    public function down(): void
    {
        // Keep the existing patients table and its data.
    }
};
