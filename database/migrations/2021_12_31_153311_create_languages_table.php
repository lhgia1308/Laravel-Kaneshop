
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateLanguagesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('languages', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('code', 5)->nullable();
                    
                        $table->string('name', 20)->nullable();
                    
                        $table->string('image', 100)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('languages');
                        }
                    }
                