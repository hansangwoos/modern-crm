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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('ct_id'); // primary key

            // 조직 정보
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('part_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('mb_no')->nullable(); // 직원 id

            // 고객 기본 정보
            $table->string('ct_name'); // 이름
            $table->string('ct_hp2'); //번호 2
            $table->string('ct_hp3'); //번호 3
            $table->text('ct_memo'); // 고객 메모

            // 추적 및 상태
            $table->unsignedInteger('ct_ld')->nullable(); // 랜딩 id
            $table->unsignedInteger('ct_status'); // 고객 상태 id

            // 개인정보
            $table->string('ct_birth', 6)->nullable(); // 주민번호 앞자리
            $table->date('ct_birthY')->nullable(); // 생년월일
            $table->string('ct_regnumber', 7)->nullable(); // 주민번호 뒷자리

            $table->timestamps();

            // 인덱스
            $table->index(['team_id', 'part_id', 'group_id']);
            $table->indeX('mb_no');
            $table->index('ct_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
