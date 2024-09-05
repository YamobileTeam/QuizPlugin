<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizRequests4 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->text('answer2')->nullable();
            $table->renameColumn('answer', 'answer1');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->dropColumn('answer2');
            $table->renameColumn('answer1', 'answer');
        });
    }
}
