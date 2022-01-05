
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateProductsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('products', function (Blueprint $table) {
                        
                            $table->integer("id")->primary();
                        
                            $table->string('added_by', 191)->nullable();
                        
                            $table->bigInteger('user_id')->nullable();
                        
                            $table->string('name', 80)->nullable();
                        
                            $table->string('slug', 120)->nullable();
                        
                            $table->string('category_ids', 80)->nullable();
                        
                            $table->bigInteger('brand_id')->nullable();
                        
                            $table->string('unit', 191)->nullable();
                        
                            $table->Integer('min_qty')->nullable();
                        
                            $table->Boolean('refundable')->nullable();
                        
                            $table->string('images', 255)->nullable();
                        
                            $table->string('thumbnail', 255)->nullable();
                        
                            $table->string('featured', 255)->nullable();
                        
                            $table->string('flash_deal', 255)->nullable();
                        
                            $table->string('video_provider', 30)->nullable();
                        
                            $table->string('video_url', 150)->nullable();
                        
                            $table->string('colors', 150)->nullable();
                        
                            $table->Boolean('variant_product')->nullable();
                        
                            $table->string('attributes', 255)->nullable();
                        
                            $table->Text('choice_options')->nullable();
                        
                            $table->Text('variation')->nullable();
                        
                            $table->Boolean('published')->nullable();
                        
                            $table->Float('unit_price')->nullable();
                        
                            $table->Float('purchase_price')->nullable();
                        
                            $table->string('tax', 191)->nullable();
                        
                            $table->string('tax_type', 80)->nullable();
                        
                            $table->string('discount', 191)->nullable();
                        
                            $table->string('discount_type', 80)->nullable();
                        
                            $table->Integer('current_stock')->nullable();
                        
                            $table->Text('details')->nullable();
                        
                            $table->Boolean('free_shipping')->nullable();
                        
                            $table->string('attachment', 191)->nullable();
                        
                            $table->DateTime('created_at')->nullable();
                        
                            $table->DateTime('updated_at')->nullable();
                        
                            $table->Boolean('status')->nullable();
                        
                            $table->Boolean('featured_status')->nullable();
                        
                            $table->string('meta_title', 191)->nullable();
                        
                            $table->string('meta_description', 191)->nullable();
                        
                            $table->string('meta_image', 191)->nullable();
                        
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('products');
                        }
                    }
                