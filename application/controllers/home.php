<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends FrontController {

	private $api = array(
			'Facebook' => array(
					'client_id'     => FB_CLIENT_ID,
					'client_secret' => FB_CLIENT_SECRET
			 ),
			'Google' => array(
				'client_id'     => GOOGLE_CLIENT_ID,
				'client_secret' => GOOGLE_CLIENT_SECRET
			)
	);

	public function __construct()
	{
		parent::__construct();
		$this->title = 'Instruct Me';
	}

	public function index() {
		$this->render('home/index');
	}

	public function login()
	{
		$provider_name = $this->input->get('auth');
		$session = $this->_session($provider_name);

		// if auth fails, return to home page with some error
		if (!$session) {
			$this->session->set_flashdata('failed_login', 'Please try again');
			redirect('home');
		}

		$user  = $session['user'];
		$token = $session['token'];

		$this->load->model('ImUser');
		$this->load->model('ImUserMeta');

		// add user if not exists else update user token
		$user_id = $this->ImUser->store($user, $token->accessToken);

		if ($user_id) {

			$this->ImUserMeta->insertSingleRow($user_id, 'name', $user->name);
			$this->ImUserMeta->insertSingleRow($user_id, 'photo', $user->imageUrl);

			$this->session->set_userdata('im_uid', $user_id);
			redirect('game');
		}
	}

	private function _session($provider_name)
	{

		$class = 'League\OAuth2\Client\Provider\\' . $provider_name;
		$provider = new $class(array(
			'clientId'     => $this->api[$provider_name]['client_id'],
			'clientSecret' => $this->api[$provider_name]['client_secret'],
			'redirectUri'  => base_url('home/login/?auth=' . $provider_name),
			'scopes'       => array('email')
		));

		if($this->input->get('error')) die('Not authorized');

		if ( ! $this->input->get('code')) {

		    // If we don't have an authorization code then get one
		    redirect($provider->getAuthorizationUrl());
		    exit;

		} else {

		    // Try to get an access token (using the authorization code grant)
		    $token = $provider->getAccessToken('authorization_code', [
		        'code' => $this->input->get('code')
		    ]);

		    // Optional: Now you have a token you can look up a users profile data
		    try {

		        // We got an access token, let's now get the user's details
		        $user = $provider->getUserDetails($token);

		        return array(
										'user'  => $user,
										'token' => $token
		        			 );

		    } catch (Exception $e) {

		        // Failed to get user details
				$this->session->set_flashdata('failed_login', 'Please try again');
				redirect('home');
				exit;
		    }

		    // Use this to interact with an API on the users behalf
		    echo $token->accessToken;

		    // Use this to get a new access token if the old one expires
		    echo $token->refreshToken;

		    // Number of seconds until the access token will expire, and need refreshing
		    echo $token->expires;
		}
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}
}
