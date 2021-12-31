
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateFlashDealsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('flash_deals', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('title', 150)->nullable();
                    
                        $table->DateTime('start_date')->nullable();
                    
                        $table->DateTime('end_date')->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->smallInteger('featured')->nullable();
                    
                        $table->string('background_color', 255)->nullable();
                    
                        $table->string('text_color', 255)->nullable();
                    
                        $table->string('banner', 100)->nullable();
                    
                        $table->string('slug', 255)->nullable();
                    
                        $table->smallInteger('product_id')->nullable();
                    
                        $table->string('deal_type', 191)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('flash_deals');
                        }
                    }
                