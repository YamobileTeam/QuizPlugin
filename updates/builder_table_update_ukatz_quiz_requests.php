<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizRequests extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->text('category')->nullable();
            $table->text('answer')->nullable();
            $table->dropColumn('email');
            $table->dropColumn('name');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->dropColumn('category');
            $table->dropColumn('answer');
            $table->text('email')->nullable();
            $table->text('name')->nullable();
        });
    }
}
