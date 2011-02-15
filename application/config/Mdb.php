<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ::CONFIG/mongo_conn/string:: MongoDB Connection Parameters
// By default you will connect to whatever server is specified in your php.ini configuration, usually mongodb://localhost:27017
// Format: mongodb://[username:password@]hostname_or_ip[:port][/database]
// Skip the [username:password@] part if your server doesn't do authentication
// Skip the [:port] part to use the default port (27017)
// Skip the [/database] part if your user is a global admin, and  does not belong to the specific database
$config['mongo_conn']	= 'mongodb://localhost';

// ::CONFIG/mongo_db/string:: Database to connect to
$config['mongo_db'] = 'sinapsisDB';

// ::CONFIG/mongo_friendly/string:: Friendly database name
// Once the connection is initialized and the database selected, the underlying MongoDB object will be attached to the Mdb object, and made available through the controller ($this->mdb).
// Normally, we name the attached object the same name as the database, so if you're connected to the 'openpanels' database, you can access the MongoDB object using $this->mdb->openpanels, but you can override that name below, this is useful if your db name is long, complicated or would conflict with other variable names.
$config['mongo_friendly'] = '';

// ::CONFIG/mongo_persist/string:: Persistent string
// According to PHP manual: Persistent connections need an identifier string to uniquely identify them. For a persistent connection to be used, the hostname, port, persist string, and username and password (if given) must match an existing persistent connection. Otherwise, a new connection will be created with this identifying information.
$config['mongo_persist'] = 'cimongodb';


