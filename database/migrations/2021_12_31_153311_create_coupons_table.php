
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateCouponsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('coupons', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('coupon_type', 50)->nullable();
                    
                        $table->string('title', 100)->nullable();
                    
                        $table->string('code', 15)->nullable();
                    
                        $table->DateTime('start_date')->nullable();
                    
                        $table->DateTime('expire_date')->nullable();
                    
                        $table->Decimal('min_purchase')->nullable();
                    
                        $table->Decimal('max_discount')->nullable();
                    
                        $table->Decimal('discount')->nullable();
                    
                        $table->string('discount_type', 15)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('coupons');
                        }
                    }
                