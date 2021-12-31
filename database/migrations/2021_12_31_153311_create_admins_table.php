
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateAdminsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('admins', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 80)->nullable();
                    
                        $table->string('phone', 25)->nullable();
                    
                        $table->smallInteger('admin_role_id')->nullable();
                    
                        $table->string('image', 30)->nullable();
                    
                        $table->string('email', 80)->nullable();
                    
                        $table->DateTime('email_verified_at')->nullable();
                    
                        $table->string('password', 80)->nullable();
                    
                        $table->string('remember_token', 100)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('admins');
                        }
                    }
                