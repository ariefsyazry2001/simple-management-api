<?php

use App\Enums\StatusType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default(StatusType::NEW->value);
            $table->date('deadline')->default(now());
            $table->timestamps();
        });

        // Insert default data
        DB::table('tasks')->insert([
            [
                'title' => 'Task 1',
                'description' => 'This is the first task.',
                'status' => StatusType::NEW->value,
                'deadline' => now()->addDays(7)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Task 2',
                'description' => 'This is the second task.',
                'status' => StatusType::IN_PROGRESS->value,
                'deadline' => now()->addDays(14)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Task 3',
                'description' => 'This is the third task.',
                'status' => StatusType::COMPLETED->value,
                'deadline' => now()->addDays(30)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
