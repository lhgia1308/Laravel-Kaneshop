<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BusinessSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Queue\Capsule\Manager;
use PDO;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Closure;
use RecursiveDirectoryIterator;
use ZipArchive;

class DatabaseController extends Controller {

    public function index() {
        return view('utils.database.home');
    }

    public function check_connection(Request $request) {
        $result = "";
        try {
            if($request['type'] == 'mysql') {
                $conn = mysqli_connect($request['host'], $request['username'], $request['password']);
                if($conn) {
                    $result = "Connection established.";
                }
                else{
                    $result = "Connection could not be established.";
                }
            }
            if($request['type'] == 'sqlserver') {
    
                $connectionInfo = array("Database" => $request['database'], "UID" => $request['username'], "PWD" => $request['password']);
                $conn = sqlsrv_connect($request['host'], $connectionInfo);
    
                if($conn) {
                    $result = "Connection established.";
                }
                else{
                    $result = "Connection could not be established.";
                }
            }
            if($request['type'] == 'oracle') {
                $connectionInfo = $request['host'].'/'.$request['servicename'];
                $conn = oci_connect($request['username'], $request['password'], $connectionInfo);
                if($conn) {
                    $result = "Connection established.";
                }
                else{
                    $result = "Connection could not be established.";
                }
                oci_close($conn);
            }
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            return response()->json(['success' => 0, 'message' => $result], 200);
        }
        return response()->json(['success' => 1, 'message' => $result], 200);
    }

    public function save_connection(Request $request) {
        $result = "";
        try {
            if($request['type'] == 'mysql') {
                $type = BusinessSetting::where(['type' => 'mysql_connection_info'])->first();
                if(isset($type)) {
                    DB::table('business_settings')->where(['type' => 'mysql_connection_info'])->update([
                        'value' => json_encode([
                            'host' => $request['host']
                            ,'port' => $request['port']
                            ,'database' => $request['database']
                            ,'username' => $request['username']
                            ,'password' => $request['password']
                        ])
                    ]);
                    $result = "Updated";
                }
                else {
                    $new_id = DB::table('business_settings')->max('id') + 1;
                    DB::table('business_settings')->insert([
                        'id' => $new_id
                        ,'type' => 'mysql_connection_info'
                        ,'value' => json_encode([
                            'host' => $request['host']
                            ,'port' => $request['port']
                            ,'database' => $request['database']
                            ,'username' => $request['username']
                            ,'password' => $request['password']
                        ])
                    ]);
                    $result = "Inserted";
                }
            }
            //End MYSQL
            //SQL SERVER
            if($request['type'] == 'sqlserver') {
                $type = BusinessSetting::where(['type' => 'sqlserver_connection_info'])->first();
                if(isset($type)) {
                    DB::table('business_settings')->where(['type' => 'sqlserver_connection_info'])->update([
                        'value' => json_encode([
                            'host' => $request['host']
                            ,'port' => $request['port']
                            ,'database' => $request['database']
                            ,'username' => $request['username']
                            ,'password' => $request['password']
                        ])
                    ]);
                    $result = "Updated";
                }
                else {
                    $new_id = DB::table('business_settings')->max('id') + 1;
                    DB::table('business_settings')->insert([
                        'id' => $new_id
                        ,'type' => 'sqlserver_connection_info'
                        ,'value' => json_encode([
                            'host' => $request['host']
                            ,'port' => $request['port']
                            ,'database' => $request['database']
                            ,'username' => $request['username']
                            ,'password' => $request['password']
                        ])
                    ]);
                    $result = "Inserted";
                }
            }
            //END SQL SERVER
            //ORACLE
            if($request['type'] == 'oracle') {
                $type = BusinessSetting::where(['type' => 'oracle_connection_info'])->first();
                if(isset($type)) {
                    DB::table('business_settings')->where(['type' => 'oracle_connection_info'])->update([
                        'value' => json_encode([
                            'host' => $request['host']
                            ,'port' => $request['port']
                            ,'servicename' => $request['servicename']
                            ,'username' => $request['username']
                            ,'password' => $request['password']
                        ])
                    ]);
                    $result = "Updated";
                }
                else {
                    $new_id = DB::table('business_settings')->max('id') + 1;
                    DB::table('business_settings')->insert([
                        'id' => $new_id
                        ,'type' => 'oracle_connection_info'
                        ,'value' => json_encode([
                            'host' => $request['host']
                            ,'port' => $request['port']
                            ,'servicename' => $request['servicename']
                            ,'username' => $request['username']
                            ,'password' => $request['password']
                        ])
                    ]);
                    $result = "Inserted";
                }
            }
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            return response()->json(['success' => 0, 'message' => $result], 200);
        }
        return response()->json(['success' => 1, 'message' => $result], 200);
    }

    public function load_connection(Request $request) {
        $type = "mysql_connection_info";
        if($request['type'] == 'sqlserver') {
            $type = "sqlserver_connection_info";
        }
        if($request['type'] == 'oracle') {
            $type = "oracle_connection_info";
        }
        $row = BusinessSetting::where(['type' => $type])->first();
        if(isset($row)) {
            $value = json_decode($row->value, true);
            return response()->json($value);
        }
        // return response(null);
    }

    public function get_config($type, Request $request) {
        if($type == 'mysql') {
            $config = [
                'driver' => 'mysql', 
                'host' => $request['host'], 
                'port' => $request['port'],
                'database' => $request['database'], 
                'username' => $request['username'], 
                'password' => $request['password'], 
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ];
        }

        if($type == 'sqlserver') {
            $config = [
                'driver' => 'sqlsrv',
                'host' => $request['host'], 
                'port' => $request['port'],
                'database' => $request['database'], 
                'username' => $request['username'], 
                'password' => $request['password'],
                'charset' => 'utf8',
                'prefix' => '',
                'prefix_indexes' => true,
            ];
        }

        if($type == 'oracle') {
            $config = [
                'driver' => 'oracle',
                'host' => $request['host'], 
                'port' => $request['port'],
                'service_name' => $request['servicename'], 
                'database' => $request['username'],
                'username' => $request['username'], 
                'password' => $request['password'],
                'charset' => env('DB_CHARSET', 'AL32UTF8'),
                'prefix' => env('DB_PREFIX', ''),
                'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
                'edition'        => env('DB_EDITION', 'ora$base'),
                'server_version' => env('DB_SERVER_VERSION', '11g')
            ];
        }

        return $config;
    }

    public function load_tables(Request $request) {

        $config = $this->get_config($request['type'], $request);

        try {

            Config::set('database.connections.myconnect', $config);
            $tables = DB::connection('myconnect')->getDoctrineSchemaManager()->listTableNames();

        } 
        catch (\Throwable $th) {
            return response()->json(['success' => 0, 'message' => $th->getMessage()], 200);
        }

        return response()->json(['success' => 1, 'data' => $tables], 200);
    }

    public function download_migration_files(Request $request) {
        $names = $request['table_names'];

        $config = $this->get_config($request['selTypeOfConnection'], $request);

        try {

            Config::set('database.connections.myconnect', $config);
            //Delete all the files in this folder
            $dir = base_path('storage/app/public/database_utils/migrations');
            $files = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            foreach ($files as $file) {
                if ($file->isDir()) {
                    // rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            //End delete files
            //Create the global variables
            $structure_str = "";
            $myzip = new ZipArchive;
            foreach ($names as $name) {
                $current_datetime = date('Y_m_d_His');
                
                //Create a new file PHP
                file_put_contents(base_path('storage/app/public/database_utils/migrations/'.$current_datetime.'_create_'.$name.'_table.php'), '');

                $columns = DB::connection('myconnect')->getDoctrineSchemaManager()->listTableColumns($name);

                foreach ($columns as $column) {
                    // $obj = DB::getSchemaBuilder()->getColumnType($name, $column);
                    $col_type = str_replace("\\", "", $column->getType());
                    $col_name = $column->getName();
                    if($col_name == "id") {
                        $structure_str = $structure_str.'
                            $table->integer("id")->primary();
                        ';
                    }
                    else {
                        $str = "";
                        $length = $column->getLength();
                        switch ($col_type) {
                            case 'BigInt':
                                $str = "bigInteger('".$col_name."')";
                                break;
                            case 'SmallInt':
                                $str = "smallInteger('".$col_name."')";
                                break;
                            case 'String':
                                if($length ==0) {
                                    $str = "text('".$col_name."')";
                                }
                                else {
                                    $str = "string('".$col_name."', ".$length.")";
                                }
                                break;
                            default:
                                $str = $col_type."('".$col_name."')";
                                break;
                        }
                        $structure_str = $structure_str.'
                            $table->'.$str.'->nullable();
                        ';
                    }
                }
                //Build a data string
                $create_str = '
                    Schema::create('."'".$name."'".', function (Blueprint $table) {
                        '.$structure_str.'
                    });
                ';
                $drop_str = "Schema::dropIfExists('".$name."')";
                $table_name = str_replace("_", "", ucwords($name, "_"));
                $template_str = '
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class Create'.$table_name.'Table extends Migration
                    {
                        public function up() {
                            '.$create_str.'
                        }

                        public function down() {
                            '.$drop_str.';
                        }
                    }
                ';
                //Write result to a PHP file
                $file = fopen('storage/app/public/database_utils/migrations/'.$current_datetime.'_create_'.$name.'_table.php', "w") or die("Unable to open file!");
                fwrite($file, $template_str);
                fclose($file);
                //Zip file
                if ($myzip->open('storage/app/public/database_utils/migrations/migration_files.zip', ZipArchive::CREATE) === TRUE)
                {
                    // Add files to the zip file
                    // $myzip->addFile('boy.png');
                    // $myzip->addFile('gray.jpeg');
                
                    // Add old.txt file to zip and rename it to newfile.txt
                    // $myzip->addFile('old.txt', 'new.txt');
                
                    // Add a file write.txt file to zip using the text specified
                    $myzip->addFromString($current_datetime.'_create_'.$name.'_table.php', $template_str);
                
                    // closing the zip file.
                    $myzip->close();
                }
                //End zip file
                //Reset structure_str to get structure of a new table
                $structure_str = "";
            }
            //Download zip file

            // header("Pragma: public");
            // header("Expires: 0");
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header("Cache-Control: public");
            // header("Content-Description: File Transfer");
            // header("Content-type: application/octet-stream"); //application/zip
            // header("Content-Disposition: attachment; filename=\"".$filename."\"");
            // header("Content-Transfer-Encoding: binary");
            // header("Content-Length: ".filesize($filepath.$filename));
            // ob_end_flush();
            // @readfile($filepath.$filename);
            //End Download zip file

        } 
        catch (\Throwable $th) {
            return response()->json(['success' => 0, 'message' => $th->getMessage()], 200);
        }
        return response()->json(['success' => 1, 'message' => 'Success', 'data' => asset('storage/app/public/database_utils/migrations/migration_files.zip')], 200);
    }

    public function download_seed_files(Request $request) {
        $names = $request['table_names'];
        
        try {
            $config = $this->get_config($request['selTypeOfConnection'], $request);

            //Delete all the files in this folder
            $dir = base_path('storage/app/public/database_utils/seeds');
            $files = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            foreach ($files as $file) {
                if ($file->isDir()) {
                    // rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            //End delete files
            $myzip = new ZipArchive;

            foreach($names as $name) {
    
                file_put_contents(base_path('storage/app/public/database_utils/seeds/'.$name.'.php'), '');
                $class = DB::table($name)->get();
                //Define a array: $str_atr to convert to a string
                $str_atr = [];
                foreach($class as $obj) {
                    $obj_arr = [];
                    
                    foreach($obj as $key=>$value) {
    
                        $type = DB::getSchemaBuilder()->getColumnType($name, $key);
                        //Handle special chars
                        $value = addcslashes($value, "'");
                        $value = str_replace('\"', '', $value);
                        //End handle
    
                        $val = "'".$value."'";
                        if($type == "integer") {
                            $val = $value==""?'NULL':$value;
                        }
                        if($type == "datetime") {
                            $val = "date('Y-m-d H:i:s', strtotime('".$value."'))";
                        }
                        
                        array_push($obj_arr, implode('=>', array("'".$key."'", $val)));
                        $data_str = implode(",", $obj_arr);
    
                    }
                    $data_str = "[" . $data_str . "]";
                    //Push a string to a array
                    array_push($str_atr, $data_str);
                }
                
                //Join datas of a array to a string
                $temp_str = implode(',', $str_atr);
                //End Get data of a table
                $results = '
                    DB::table("'.$name.'")->insert([
                        '.$temp_str.'
                    ]);
                ';
                $template_str = '
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class '.$name.' extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            '.$results.'
                        }
                    }
                ';
                //Write data to a PHP file
                $file = fopen('storage/app/public/database_utils/seeds/'.$name.'.php', "w") or die("Unable to open file!");
                fwrite($file, $template_str);
                fclose($file);
                //Zip file
                if ($myzip->open('storage/app/public/database_utils/seeds/seed_files.zip', ZipArchive::CREATE) === TRUE)
                {
                    $myzip->addFromString($name.'.php', $template_str);
                    // closing the zip file.
                    $myzip->close();
                }
            }
        }
        catch (\Throwable $th) {
            return response()->json(['success' => 0, 'message' => $th->getMessage()], 200);
        }
        return response()->json(['success' => 1, 'message' => 'Success', 'data' => asset('storage/app/public/database_utils/seeds/seed_files.zip')], 200);
    }
}
