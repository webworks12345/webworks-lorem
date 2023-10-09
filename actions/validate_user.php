<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED');
        
    if( !empty( $_POST[ 'username' ] ) && !empty( $_POST[ 'password' ] ) ) {
        
        validate_csrf();
        
        $username = $_POST[ 'username' ];
        $password = md5($_POST[ 'password' ]);

        $q = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $DB->prepare($q);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $check = $stmt->get_result();

        if( $check && $check->num_rows ) {
            $user = $check->fetch_object();          
            if( $user->status == 0 ) {
                set_message( "Your account is not yet activated." . $DB->error, "danger" );
                redirect(LOGIN_REDIRECT);
            }
            //var_dump($password, $user->password);
            if ($password == $user->password) {
                $_SESSION[ AUTH_ID ] = $user->userID;
                $_SESSION[ AUTH_NAME ] = $user->username;
                $_SESSION[ AUTH_TYPE ] = $user->usertype;
                $_SESSION[ AUTH_TOKEN ] = $user->token;
                set_message( "Welcome back {$user->fname}!", 'success' );
                //header("Location: " . SITE_URL . "/?page=");
                redirect( "owner-profile" );
            } else {        
                set_message( "Invalid login, please try again." . $DB->error, "danger" );
            }
                    
        } else {        
            set_message( "Invalid login2, please try again." . $DB->error, "danger" );
        }
    } else {        
        set_message( "You must specify the username and password." . $DB->error, "danger" );
    }

    
?>