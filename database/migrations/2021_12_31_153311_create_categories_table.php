
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateCategoriesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('categories', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 100)->nullable();
                    
                        $table->string('slug', 100)->nullable();
                    
                        $table->string('icon', 250)->nullable();
                    
                        $table->smallInteger('parent_id')->nullable();
                    
                        $table->smallInteger('position')->nullable();
                    
                        $table->smallInteger('home_status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('categories');
                        }
                    }
                