
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateDealOfTheDaysTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('deal_of_the_days', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('title', 150)->nullable();
                    
                        $table->smallInteger('product_id')->nullable();
                    
                        $table->Decimal('discount')->nullable();
                    
                        $table->string('discount_type', 12)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('deal_of_the_days');
                        }
                    }
                