
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateCustomerWalletHistoriesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('customer_wallet_histories', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->smallInteger('customer_id')->nullable();
                    
                        $table->Decimal('transaction_amount')->nullable();
                    
                        $table->string('transaction_type', 20)->nullable();
                    
                        $table->string('transaction_method', 30)->nullable();
                    
                        $table->string('transaction_id', 20)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('customer_wallet_histories');
                        }
                    }
                