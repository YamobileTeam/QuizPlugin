<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizQuestionsToCategory extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_questions_to_category', function($table)
        {
            $table->dropPrimary(['category_id','question_id']);
            $table->dropColumn('question_id');
            $table->primary(['category_id']);
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_questions_to_category', function($table)
        {
            $table->dropPrimary(['category_id']);
            $table->integer('question_id')->unsigned();
            $table->primary(['category_id','question_id']);
        });
    }
}
