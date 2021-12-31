
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateShippingAddressesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('shipping_addresses', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('customer_id', 15)->nullable();
                    
                        $table->string('contact_person_name', 500)->nullable();
                    
                        $table->string('address_type', 20)->nullable();
                    
                        $table->string('address', 255)->nullable();
                    
                        $table->string('city', 50)->nullable();
                    
                        $table->string('zip', 10)->nullable();
                    
                        $table->string('phone', 20)->nullable();
                    
                        $table->string('state', 191)->nullable();
                    
                        $table->string('country', 191)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('shipping_addresses');
                        }
                    }
                