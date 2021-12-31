
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateAdminRolesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('admin_roles', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 30)->nullable();
                    
                        $table->string('module_access', 250)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('admin_roles');
                        }
                    }
                