<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizQuestions6 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->integer('relation_id')->nullable();
            $table->dropColumn('relation');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->dropColumn('relation_id');
            $table->text('relation')->nullable();
        });
    }
}
