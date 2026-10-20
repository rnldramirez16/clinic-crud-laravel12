
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            if (!Schema::hasColumn('patients', 'first_name')) {
                $table->string('first_name', 100)->nullable();
            }

            if (!Schema::hasColumn('patients', 'last_name')) {
                $table->string('last_name', 100)->nullable();
            }

            if (!Schema::hasColumn('patients', 'birth_date')) {
                $table->date('birth_date')->nullable();
            }

            if (!Schema::hasColumn('patients', 'sex')) {
                $table->string('sex', 20)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $columns = [
                'first_name',
                'last_name',
                'birth_date',
                'sex',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('patients', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
