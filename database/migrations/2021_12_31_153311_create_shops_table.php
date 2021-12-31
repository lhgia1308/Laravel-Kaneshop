
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateShopsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('shops', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('seller_id')->nullable();
                    
                        $table->string('name', 100)->nullable();
                    
                        $table->string('address', 255)->nullable();
                    
                        $table->string('contact', 255)->nullable();
                    
                        $table->string('image', 30)->nullable();
                    
                        $table->string('banner', 191)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('shops');
                        }
                    }
                