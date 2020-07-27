<?php
/* 
 * Define environment constants - This file MUST be ignored from repository, left this one as example
 */

//SECURITY. Protect against direct access
define(SITE_LOADED,TRUE);

//CORE constants 
define(CORE_PATH,'Core/');
define(TRAITS_PATH,'Traits/');
define(CONTROLLERS_PATH,'Controllers/');
define(MODELS_PATH,'Models/');
define(VIEWS_PATH,'views/');

// Default controller
define(DEFAULT_CONTROLLER,'Home');
define(DEFAULT_METHOD,'index');

// Default not found controller
define(DEFAULT_NOT_FOUND_CONTROLLER,'NotFound');
define(DEFAULT_NOT_FOUND_METHOD,'index');

//Errors
define(SHOW_ERRORS,TRUE);

//Database
define(DB_HOST,'localhost');
define(DB_NAME,'challenge');
define(DB_USER,'luser');
define(DB_PASSWORD,'luser');

//Amazon S3
define(S3_ALLOWED_EXTENSIONS,['txt','pdf','jpg']);


