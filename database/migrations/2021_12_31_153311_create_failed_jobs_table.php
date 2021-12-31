
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateFailedJobsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('failed_jobs', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->text('connection')->nullable();
                    
                        $table->text('queue')->nullable();
                    
                        $table->text('payload')->nullable();
                    
                        $table->text('exception')->nullable();
                    
                        $table->DateTime('failed_at')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('failed_jobs');
                        }
                    }
                