
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            if (!Schema::hasColumn('patients', 'patient_number')) {
                $table->string('patient_number')->nullable()->unique();
            }

            if (!Schema::hasColumn('patients', 'full_name')) {
                $table->string('full_name')->nullable();
            }

            if (!Schema::hasColumn('patients', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable();
            }

            if (!Schema::hasColumn('patients', 'gender')) {
                $table->string('gender')->nullable();
            }

            if (!Schema::hasColumn('patients', 'contact_number')) {
                $table->string('contact_number')->nullable();
            }

            if (!Schema::hasColumn('patients', 'email')) {
                $table->string('email')->nullable();
            }

            if (!Schema::hasColumn('patients', 'address')) {
                $table->text('address')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // Keep existing patient data when rolling back.
        });
    }
};
