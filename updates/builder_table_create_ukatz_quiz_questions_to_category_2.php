<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUkatzQuizQuestionsToCategory2 extends Migration
{
    public function up()
    {
        Schema::create('ukatz_quiz_questions_to_category', function($table)
        {
            $table->integer('category_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->primary(['category_id','question_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ukatz_quiz_questions_to_category');
    }
}
