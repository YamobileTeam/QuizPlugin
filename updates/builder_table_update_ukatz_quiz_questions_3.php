<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizQuestions3 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->renameColumn('question_id', 'relation_id');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->renameColumn('relation_id', 'question_id');
        });
    }
}
