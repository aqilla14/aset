<?php

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
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset')->unique();
            $table->string('nama_aset');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->enum('status', ['tersedia', 'dipinjam', 'rusak', 'pemeliharaan'])->default('tersedia');
            $table->date('tanggal_perolehan');
            $table->decimal('harga', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
