
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateChattingsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('chattings', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->smallInteger('user_id')->nullable();
                    
                        $table->smallInteger('seller_id')->nullable();
                    
                        $table->text('message')->nullable();
                    
                        $table->smallInteger('sent_by_customer')->nullable();
                    
                        $table->smallInteger('sent_by_seller')->nullable();
                    
                        $table->smallInteger('seen_by_customer')->nullable();
                    
                        $table->smallInteger('seen_by_seller')->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->smallInteger('shop_id')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('chattings');
                        }
                    }
                