
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateNotificationsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('notifications', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('title', 100)->nullable();
                    
                        $table->string('description', 200)->nullable();
                    
                        $table->string('image', 50)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('notifications');
                        }
                    }
                