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
            $table->date('task_created_date')->default(now()->format('Y-m-d')); // New column
            $table->date('deadline')->default(now()->format('Y-m-d'));
            $table->timestamps();
        });

        // Insert default data
        DB::table('tasks')->insert([
            [
                'title' => 'Task 1',
                'description' => 'This is the first task.',
                'status' => StatusType::NEW->value,
                'task_created_date' => now()->format('Y-m-d'),
                'deadline' => now()->addDays(7)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Task 2',
                'description' => 'This is the second task.',
                'status' => StatusType::IN_PROGRESS->value,
                'task_created_date' => now()->format('Y-m-d'),
                'deadline' => now()->addDays(14)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Task 3',
                'description' => 'This is the third task.',
                'status' => StatusType::COMPLETED->value,
                'task_created_date' => now()->format('Y-m-d'),
                'deadline' => now()->addDays(30)->format('Y-m-d'),    
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
