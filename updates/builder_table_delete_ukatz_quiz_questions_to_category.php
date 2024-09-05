<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteUkatzQuizQuestionsToCategory extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ukatz_quiz_questions_to_category');
    }
    
    public function down()
    {
        Schema::create('ukatz_quiz_questions_to_category', function($table)
        {
            $table->integer('category_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('category_question')->unsigned();
            $table->primary(['category_id','question_id','category_question']);
        });
    }
}
