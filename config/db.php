<?php

if (YII_ENV_DEV) {
	return [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=yii_basic',
	    'username' => 'root',
	    'password' => 'root',
	    'charset' => 'utf8',

	    // Schema cache options (for production environment)
	    //'enableSchemaCache' => true,
	    //'schemaCacheDuration' => 60,
	    //'schemaCache' => 'cache',
	];
}

if (YII_ENV_PROD) {
	return [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=databases.000webhost.com;dbname=id6896486_yii_basic',
	    'username' => 'id6896486_root',
	    'password' => '12345678@Xx',
	    'charset' => 'utf8',

	    // Schema cache options (for production environment)
	    'enableSchemaCache' => true,
	    'schemaCacheDuration' => 60,
	    'schemaCache' => 'cache',
	];
}
?>