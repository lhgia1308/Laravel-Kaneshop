
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateReviewsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('reviews', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('product_id')->nullable();
                    
                        $table->bigInteger('customer_id')->nullable();
                    
                        $table->text('comment')->nullable();
                    
                        $table->string('attachment', 191)->nullable();
                    
                        $table->Integer('rating')->nullable();
                    
                        $table->Integer('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('reviews');
                        }
                    }
                