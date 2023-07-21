<?php

use App\Models\User;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('cover');
            $table->year('year');
            $table->integer('quantity')->default(0);
            $table->foreignIdFor(User::class, 'created_by'); //kolom created_by foreign key ke id pada tabel user
            $table->foreignIdFor(User::class, 'updated_by'); //kolom updated_at foreign key ke id pada tabel user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
