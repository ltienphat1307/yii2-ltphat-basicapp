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
	    'dsn' => 'mysql:host=sql7.freemysqlhosting.net;dbname=sql7253605;port=3306',
	    'username' => 'sql7253605',
	    'password' => 'bupnmF9ngS',
	    'charset' => 'utf8',

	    // Schema cache options (for production environment)
	    'enableSchemaCache' => true,
	    'schemaCacheDuration' => 60,
	    'schemaCache' => 'cache',
	];
}
?>