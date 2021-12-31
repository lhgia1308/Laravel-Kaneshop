
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateBusinessSettingsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('business_settings', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('type', 50)->nullable();
                    
                        $table->text('value')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('business_settings');
                        }
                    }
                