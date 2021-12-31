
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateBannersTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('banners', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('photo', 255)->nullable();
                    
                        $table->string('banner_type', 255)->nullable();
                    
                        $table->string('url', 255)->nullable();
                    
                        $table->smallInteger('published')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('banners');
                        }
                    }
                