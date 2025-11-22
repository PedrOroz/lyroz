<?php
   /**
   * Who can register and what the default role will be
   * Values for who can register under a standard setup can be:
   *      any  == anybody can register (default)
   *      admin == members must be registered by an administrator
   *      root  == only the root user can register members
   * 
   * Values for default role can be any valid role, but it's hard to see why
   * the default 'member' value should be changed under the standard setup.
   * However, additional roles can be added and so there's nothing stopping
   * anyone from defining a different default.
   */ 
  define("CAN_REGISTER", "admin");
  define("DEFAULT_ROLE", "member");
  /**
   * Is this a secure connection?  The default is FALSE, but the use of an
   * HTTPS connection for logging in is recommended.
   * 
   * If you are using an HTTPS connection, change this to TRUE
   */
  define("SECURE", FALSE); 
  
  /**
   * [sec_session_start description]
   *
   * @return [type] [description]
   */

  function sec_session_start() 
  {
    $session_name = 'sec_session_id'; // Set a custom session name 
    $secure       = SECURE;

    // This stops JavaScript being able to access the session id.
    $httponly     = true;

    if(ini_set('session.use_only_cookies', 1) === FALSE) 
    {
      die ("<h4 class='user-name text-dark m-none text-center'>NO SE PUEDE INICIAR SESION DE FORMA SEGURA </h4>");
      exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

    // Sets the session name to the one set above.
    session_name($session_name);

    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
  }

  /**
   * [sec_time_outs description]
   *
   * @return [type] [description]
   */

  function sec_time_outs()
  {
    session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 900;//= 15 min
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: /iniciar-sesion");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
  }