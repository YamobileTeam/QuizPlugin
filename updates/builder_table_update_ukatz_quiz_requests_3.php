<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizRequests3 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->string('user_agent')->nullable();
            $table->string('device_type')->nullable();
            $table->string('browser_name')->nullable();
            $table->string('platform_name')->nullable();
            $table->string('ip')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('source')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->dropColumn('user_agent');
            $table->dropColumn('device_type');
            $table->dropColumn('browser_name');
            $table->dropColumn('platform_name');
            $table->dropColumn('ip');
            $table->dropColumn('utm_source');
            $table->dropColumn('utm_medium');
            $table->dropColumn('utm_campaign');
            $table->dropColumn('utm_term');
            $table->dropColumn('utm_content');
            $table->dropColumn('source');
        });
    }
}
