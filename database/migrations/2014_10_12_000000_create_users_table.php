<?php

use App\Enums\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default(UserRole::Customer);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_services');
        Schema::dropIfExists('employee_roles');
        Schema::dropIfExists('employee_details');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('reward_points');
        Schema::dropIfExists('store_openings');
        Schema::dropIfExists('user_stores');
        Schema::dropIfExists('service_stores');
        Schema::dropIfExists('booking_details');
        Schema::dropIfExists('ratings');
        Schema::dropIfExists('users');
        Schema::dropIfExists('bookings');

        Schema::dropIfExists('stores');
        Schema::dropIfExists('services');
    }
};
