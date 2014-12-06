<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

<<<<<<< HEAD
class Auth extends FrontController{
	public function index() {
=======
/**
 * Description of auth
 *
 * @author Pumpeddevs <pumpeddevs@gmail.com>
 */
class Auth extends FrontController {

	private $api = array(
			'Facebook' => array(
					'client_id'     => '817918001602609',
					'client_secret' => '1837bc1927e9976659eac193086e814f'
			 ),
			'Google' => array(
				'client_id'     => '1083567373902-ktkflmvll25vfr44t6m5k7hdku0mlpvq.apps.googleusercontent.com',
				'client_secret' => 'LIT16LPia1gSRxSWkjiliT7d'
			)
	);

	private $provider;

	public function index() 
	{
		$this->title = "Instruct.me";
>>>>>>> origin/oauth-client
		$this->render('auth/index');
	}

	public function login()
	{
		$provider_name = $this->input->get('auth');

		// if ( ! $this->input->get('code')) {
		// 			}

		$this->_session($provider_name);
	}

	public function user()
	{
		
	}

	private function _session($provider_name)
	{

		$class = 'League\OAuth2\Client\Provider\\' . $provider_name;
		$provider = new $class(array(
			'clientId'     => $this->api[$provider_name]['client_id'],
			'clientSecret' => $this->api[$provider_name]['client_secret'],
			'redirectUri'  => base_url('auth/login/?auth=' . $provider_name),
			'scopes'       => array('email')
		));


		if ( ! $this->input->get('code')) {

		    // If we don't have an authorization code then get one
		    redirect($provider->getAuthorizationUrl());
		    exit;

		} else {

		    // Try to get an access token (using the authorization code grant)
		    $token = $provider->getAccessToken('authorization_code', [
		        'code' => $this->input->get('code')
		    ]);

		    // If you are using Eventbrite you will need to add the grant_type parameter (see below)
		    $token = $provider->getAccessToken('authorization_code', [
		        'code' => $this->input->get('code'),
		        'grant_type' => 'authorization_code'
		    ]);

		    // Optional: Now you have a token you can look up a users profile data
		    try {

		        // We got an access token, let's now get the user's details
		        $userDetails = $provider->getUserDetails($token);

		        // Use these details to create a new profile
		        printf('Hello %s!', $userDetails->firstName);

		    } catch (Exception $e) {

		        // Failed to get user details
		        exit('Oh dear...');
		    }

		    // Use this to interact with an API on the users behalf
		    echo $token->accessToken;

		    // Use this to get a new access token if the old one expires
		    echo $token->refreshToken;

		    // Number of seconds until the access token will expire, and need refreshing
		    echo $token->expires;
		}
	}
}
