<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->boolean('on_sale')->default(false);
            $table->boolean('featured')->default(false);
            $table->decimal('sale_percent', 5, 2)->nullable();
            $table->unsignedInteger('stock');
            $table->foreignIdFor(Category::class);
            // $table->foreignId('vendor_id')->constrained('vendors'); // Assuming 'vendors' is the table name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
