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
					'api_key'    => '817918001602609',
					'api_secret' => '1837bc1927e9976659eac193086e814f'
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

		if ( ! $this->input->get('code')) {
			$class = 'League\OAuth2\Client\Provider\\' . $provider_name;
			$this->provider = new $class(array(
				'clientId'     => $this->api[$provider_name]['api_key'],
				'clientSecret' => $this->api[$provider_name]['api_secret'],
				'redirectUri'  => base_url('auth/login/?auth=' . $provider_name),
				'scopes'       => array('email')
			));
		}

		$this->_session($this->provider);
	}

	public function user()
	{
		
	}

	private function _session($provider)
	{

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
