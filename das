warning: LF will be replaced by CRLF in composer.lock.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in database/migrations/2014_10_12_000000_create_users_table.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in database/migrations/2014_10_12_100000_create_password_resets_table.php.
The file will have its original line endings in your working directory
[1mdiff --git a/app/Banco.php b/app/Banco.php[m
[1mindex fc17c7f..e622626 100644[m
[1m--- a/app/Banco.php[m
[1m+++ b/app/Banco.php[m
[36m@@ -6,5 +6,5 @@[m [muse Illuminate\Database\Eloquent\Model;[m
 [m
 class Banco extends Model[m
 {[m
[31m-    protected $table = 'bancos';[m
[32m+[m[32m    protected $table = 'list_bancos';[m
 }[m
[1mdiff --git a/composer.lock b/composer.lock[m
[1mindex ed6ec93..c49f3fb 100644[m
[1m--- a/composer.lock[m
[1m+++ b/composer.lock[m
[36m@@ -1288,16 +1288,16 @@[m
         },[m
         {[m
             "name": "nikic/php-parser",[m
[31m-            "version": "v4.1.1",[m
[32m+[m[32m            "version": "v4.2.0",[m
             "source": {[m
                 "type": "git",[m
                 "url": "https://github.com/nikic/PHP-Parser.git",[m
[31m-                "reference": "8aae5b59b83bb4d0dbf07b0a835f2680a658f610"[m
[32m+[m[32m                "reference": "594bcae1fc0bccd3993d2f0d61a018e26ac2865a"[m
             },[m
             "dist": {[m
                 "type": "zip",[m
[31m-                "url": "https://api.github.com/repos/nikic/PHP-Parser/zipball/8aae5b59b83bb4d0dbf07b0a835f2680a658f610",[m
[31m-                "reference": "8aae5b59b83bb4d0dbf07b0a835f2680a658f610",[m
[32m+[m[32m                "url": "https://api.github.com/repos/nikic/PHP-Parser/zipball/594bcae1fc0bccd3993d2f0d61a018e26ac2865a",[m
[32m+[m[32m                "reference": "594bcae1fc0bccd3993d2f0d61a018e26ac2865a",[m
                 "shasum": ""[m
             },[m
             "require": {[m
[36m@@ -1313,7 +1313,7 @@[m
             "type": "library",[m
             "extra": {[m
                 "branch-alias": {[m
[31m-                    "dev-master": "4.1-dev"[m
[32m+[m[32m                    "dev-master": "4.2-dev"[m
                 }[m
             },[m
             "autoload": {[m
[36m@@ -1335,20 +1335,20 @@[m
                 "parser",[m
                 "php"[m
             ],[m
[31m-            "time": "2018-12-26T11:32:39+00:00"[m
[32m+[m[32m            "time": "2019-01-12T16:31:37+00:00"[m
         },[m
         {[m
             "name": "opis/closure",[m
[31m-            "version": "3.1.3",[m
[32m+[m[32m            "version": "3.1.5",[m
             "source": {[m
                 "type": "git",[m
                 "url": "https://github.com/opis/closure.git",[m
[31m-                "reference": "5e9095ce871a425ab87a854b285b7766de38a7d9"[m
[32m+[m[32m                "reference": "41f5da65d75cf473e5ee582df8fc7f2c733ce9d6"[m
             },[m
             "dist": {[m
                 "type": "zip",[m
[31m-                "url": "https://api.github.com/repos/opis/closure/zipball/5e9095ce871a425ab87a854b285b7766de38a7d9",[m
[31m-                "reference": "5e9095ce871a425ab87a854b285b7766de38a7d9",[m
[32m+[m[32m                "url": "https://api.github.com/repos/opis/closure/zipball/41f5da65d75cf473e5ee582df8fc7f2c733ce9d6",[m
[32m+[m[32m                "reference": "41f5da65d75cf473e5ee582df8fc7f2c733ce9d6",[m
                 "shasum": ""[m
             },[m
             "require": {[m
[36m@@ -1396,7 +1396,7 @@[m
                 "serialization",[m
                 "serialize"[m
             ],[m
[31m-            "time": "2019-01-06T22:07:38+00:00"[m
[32m+[m[32m            "time": "2019-01-14T14:45:33+00:00"[m
         },[m
         {[m
             "name": "paragonie/random_compat",[m
[1mdiff --git a/database/migrations/2014_10_12_000000_create_users_table.php b/database/migrations/2014_10_12_000000_create_users_table.php[m
[1mindex 16a6108..98ef306 100644[m
[1m--- a/database/migrations/2014_10_12_000000_create_users_table.php[m
[1m+++ b/database/migrations/2014_10_12_000000_create_users_table.php[m
[36m@@ -14,11 +14,10 @@[m [mclass CreateUsersTable extends Migration[m
     public function up()[m
     {[m
         Schema::create('users', function (Blueprint $table) {[m
[31m-            $table->increments('id');[m
[31m-            $table->string('name');[m
[31m-            $table->string('email')->unique();[m
[31m-            $table->timestamp('email_verified_at')->nullable();[m
[31m-            $table->string('password');[m
[32m+[m[32m            $table->increments('id')->comment('Ide del usuario');[m
[32m+[m[32m            $table->string('name')->comment('Nombre del Usuario');[m
[32m+[m[32m            $table->string('email')->unique()->comment('Correo del usuario');[m
[32m+[m[32m            $table->string('password')->comment('Clave del usuario');[m
             $table->rememberToken();[m
             $table->timestamps();[m
         });[m
[1mdiff --git a/database/migrations/2019_01_12_053333_create_bancos_table.php b/database/migrations/2019_01_12_053333_create_bancos_table.php[m
[1mdeleted file mode 100644[m
[1mindex 246f10e..0000000[m
[1m--- a/database/migrations/2019_01_12_053333_create_bancos_table.php[m
[1m+++ /dev/null[m
[36m@@ -1,39 +0,0 @@[m
[31m-<?php[m
[31m-[m
[31m-use Illuminate\Support\Facades\Schema;[m
[31m-use Illuminate\Database\Schema\Blueprint;[m
[31m-use Illuminate\Database\Migrations\Migration;[m
[31m-[m
[31m-class CreateBancosTable extends Migration[m
[31m-{[m
[31m-    /**[m
[31m-     * Run the migrations.[m
[31m-     *[m
[31m-     * @return void[m
[31m-     */[m
[31m-    public function up()[m
[31m-    {[m
[31m-        Schema::create('bancos', function (Blueprint $table) {[m
[31m-            $table->increments('id');[m
[31m-            $table->unsignedInteger('user_id');[m
[31m-             $table->string('nombre',60);[m
[31m-            $table->string('descripcion',255)->nullable();[m
[31m-            $table->boolean('status');[m
[31m-            $table->timestamps();[m
[31m-            $table->foreign('user_id')->references('id')->on('users');[m
[31m-        });[m
[31m-    }[m
[31m-[m
[31m-    /**[m
[31m-     * Reverse the migrations.[m
[31m-     *[m
[31m-     * @return void[m
[31m-     */[m
[31m-    public function down()[m
[31m-    {[m
[31m-        Schema::table('bancos', function(Buleprint $table){[m
[31m-            $table->dropForeign(['user_id']);[m
[31m-        });[m
[31m-        Schema::dropIfExists('bancos');[m
[31m-    }[m
[31m-}[m
[1mdiff --git a/resources/views/bancos/index.blade.php b/resources/views/bancos/index.blade.php[m
[1mindex 8bcc506..7bda418 100644[m
[1m--- a/resources/views/bancos/index.blade.php[m
[1m+++ b/resources/views/bancos/index.blade.php[m
[36m@@ -19,7 +19,6 @@[m
 					<thead>[m
 						<tr>[m
 							<th>Id</th>[m
[31m-							<th>Nombre</th>[m
 							<th>Descripción</th>[m
 							<th>Status</th>[m
 							<th>Creado</th>[m
[36m@@ -31,7 +30,6 @@[m
 						@foreach($bancos as $banco)[m
 							<tr>[m
 								<td>{{$banco->id}}</td>[m
[31m-								<td>{{$banco->nombre}}</td>[m
 								<td>{{$banco->descripcion}}</td>[m
 								<td>{{($banco->status==1) ? 'Activo' : 'Inactivo'}}</td>[m
 								<td>{{$banco->created_at}}</td>[m
