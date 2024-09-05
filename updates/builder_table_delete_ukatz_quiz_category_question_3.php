<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteUkatzQuizCategoryQuestion3 extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ukatz_quiz_category_question');
    }
    
    public function down()
    {
        Schema::create('ukatz_quiz_category_question', function($table)
        {
            $table->integer('category_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->primary(['category_id','question_id']);
        });
    }
}
