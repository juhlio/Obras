<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('obras', function (Blueprint $t) {
            $t->engine = 'InnoDB';
            $t->charset = 'utf8mb4';
            $t->collation = 'utf8mb4_unicode_ci';

            $t->id();
            $t->string('codigo', 30)->unique();
            $t->string('titulo');
            $t->enum('status', ['planejada','em_andamento','pausada','concluida','cancelada'])
              ->default('planejada');
            $t->date('inicio_previsto')->nullable();
            $t->date('fim_previsto')->nullable();
            $t->decimal('orcamento', 15, 2)->default(0);
            $t->text('descricao')->nullable();
            $t->timestamps();

            $t->index(['status','inicio_previsto']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('obras');
    }
};
