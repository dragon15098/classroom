<?php
    include_once('./backend/fb_config.php');
    include_once("./model/M_User.php");
    function getFacebookLoginUrl() {
		// endpoint for facebook login dialog
		$endpoint = 'https://www.facebook.com/' . FB_GRAPH_VERSION . '/dialog/oauth';

		$params = array( // login url params required to direct user to facebook and promt them with a login dialog
			'client_id' => FB_APP_ID,
			'redirect_uri' => FB_REDIRECT_URI,
			'state' => FB_APP_STATE,
			'scope' => 'email',
			'auth_type' => 'rerequest'
		);

		// return login url
		return $endpoint . '?' . http_build_query( $params );
    }
    
    function makeFacebookApiCall( $endpoint, $params ) {
		// open curl call, set endpoint and other curl params
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $endpoint . '?' . http_build_query( $params ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );

		// get curl response, json decode it, and close curl
		$fbResponse = curl_exec( $ch );
		$fbResponse = json_decode( $fbResponse, TRUE );
		curl_close( $ch );

		return array( // return response data
			'endpoint' => $endpoint,
			'params' => $params,
			'has_errors' => isset( $fbResponse['error'] ) ? TRUE : FALSE, // boolean for if an error occured
			'error_message' => isset( $fbResponse['error'] ) ? $fbResponse['error']['message'] : '', // error message
			'fb_response' => $fbResponse // actual response from the call
		);
    }
    
    
    function getFacebookUserInfo( $accessToken ) {
		// endpoint for getting a users facebook info
		$endpoint = FB_GRAPH_DOMAIN . 'me';

		$params = array( // params for the endpoint
			'fields' => 'first_name,last_name,email,picture',
			'access_token' => $accessToken
		);

		// make the api call
		return makeFacebookApiCall( $endpoint, $params );
	}
   
    function tryAndLoginWithFacebook($get)
    {
    	$_SESSION['fb_access_token'] = array();
    	$_SESSION['fb_user_info'] = array();
    	$_SESSION['eci_login_required_to_connect_facebook'] = false;
    
    	if (isset($get['error'])) { 
    		
    	} else {
    		$accessTokenInfo = getAccessTokenWithCode($get['code']);
    		if ($accessTokenInfo['has_errors']) {
    		} else {
    			$_SESSION['fb_access_token'] = $accessTokenInfo['fb_response']['access_token'];
    			$fbUserInfo = getFacebookUserInfo($_SESSION['fb_access_token']);
    		
    			if (!$fbUserInfo['has_errors'] && !empty($fbUserInfo['fb_response']['id']) && !empty($fbUserInfo['fb_response']['email'])) { 				
    				$modelUser = new Model_User();
    				if($modelUser->getUserWithFbId($fbUserInfo['fb_response']['id']) ==null){
    					$fbResponse = $fbUserInfo['fb_response'];	
    					$modelUser->addFbUser($fbResponse['first_name'] . " " . $fbResponse['last_name'], $fbResponse['email'], "123456789", 0, $fbResponse['id'] );	
    					
    				}
    			
    				 $userDetail = $modelUser->getUserWithFbId($fbUserInfo['fb_response']['id']);
    				 if( $userDetail != null){
    				     session_start();
        				 $_SESSION['userId'] = $userDetail->userId;
        				 $_SESSION['type'] = $userDetail->type;
        				 $_SESSION['name'] = $userDetail->name;
        				 $_SESSION['loggedin'] = true;
        				 header("Location: ./controller/C_Authentication.php");
        			}
    			}
    		}
    	}
    }

    function getAccessTokenWithCode($code)
    {
        // endpoint for getting an access token with code
        $endpoint = FB_GRAPH_DOMAIN . FB_GRAPH_VERSION . '/oauth/access_token';

        $params = array( // params for the endpoint
            'client_id' => FB_APP_ID,
            'client_secret' => FB_APP_SECRET,
            'redirect_uri' => FB_REDIRECT_URI,
            'code' => $code
        );

        // make the api call
        return makeFacebookApiCall($endpoint, $params);
    }
?>