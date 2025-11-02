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
        Schema::table('page_news', function (Blueprint $table) {
            $table->enum('status', ['draft', 'published'])->default('draft')->after('is_highlight');
            $table->string('image')->nullable()->after('cover');
            $table->boolean('featured')->default(false)->after('status');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->timestamps();
            $table->string('title')->after('name');
            $table->text('description')->after('title');
            $table->string('location')->after('date');
            $table->string('image')->nullable()->after('location');
            $table->enum('status', ['draft', 'published'])->default('draft')->after('image');
            $table->unsignedBigInteger('created_by')->nullable()->after('status');
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');
        });

        Schema::table('page_partners', function (Blueprint $table) {
            $table->enum('status', ['draft', 'published'])->default('draft')->after('updated_by');
        });

        Schema::table('page_testimonials', function (Blueprint $table) {
            $table->string('position')->after('name');
            $table->string('company')->after('position');
            $table->text('content')->after('company');
            $table->string('image')->nullable()->after('photo');
            $table->enum('status', ['draft', 'published'])->default('draft')->after('image');
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->string('title')->after('name');
            $table->text('description')->after('title');
            $table->string('type')->after('description');
            $table->string('duration')->after('type');
            $table->text('requirements')->after('duration');
            $table->string('image')->nullable()->after('requirements');
            $table->enum('status', ['draft', 'published'])->default('draft')->after('image');
            $table->unsignedBigInteger('created_by')->nullable()->after('status');
            $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_news', function (Blueprint $table) {
            $table->dropColumn(['status', 'image', 'featured']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->dropColumn(['title', 'description', 'location', 'image', 'status', 'created_by', 'updated_by']);
        });

        Schema::table('page_partners', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('page_testimonials', function (Blueprint $table) {
            $table->dropColumn(['position', 'company', 'content', 'image', 'status']);
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'type', 'duration', 'requirements', 'image', 'status', 'created_by', 'updated_by']);
        });
    }
};
