
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateShippingMethodsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('shipping_methods', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('creator_id')->nullable();
                    
                        $table->string('creator_type', 191)->nullable();
                    
                        $table->string('title', 100)->nullable();
                    
                        $table->Decimal('cost')->nullable();
                    
                        $table->string('duration', 20)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('shipping_methods');
                        }
                    }
                