<?php

use App\Models\Setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->longText('value');
            $table->string('input_type');
            $table->timestamps();
            $table->softDeletes();
        });

        Setting::insert([
            'key' => 'calories_formula',
            'value' => '(4 * $protein) + (4 * $carbohydrate) + (9 * $fat)',
            'input_type' => 'text'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
