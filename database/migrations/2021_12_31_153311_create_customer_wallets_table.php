
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateCustomerWalletsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('customer_wallets', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->smallInteger('customer_id')->nullable();
                    
                        $table->Decimal('balance')->nullable();
                    
                        $table->Decimal('royality_points')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('customer_wallets');
                        }
                    }
                