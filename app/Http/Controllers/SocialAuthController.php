<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;
use App\users_info;
class SocialAuthController extends Controller
{
    public function redirect(Request $request)
    {
    	switch ($request->loginType) {
    		case 'facebook':
    			return Socialite::driver('facebook')->redirect();
    			break; 
            case 'twitter':
                return Socialite::driver('twitter')->redirect();
                break;
            case 'google':
                return Socialite::driver('google')->redirect();
                break;   		
    		default:
    		break;
    	}           
    }   

    public function callbackTwitter()
    {
    	$providerUser = \Socialite::driver('twitter')->user(); 
        //echo $providerUser->getId();
        $provider = 'twitter';
        $this->checkIfUser($providerUser, $provider);
        return redirect('/');

        /*$user = User::where('email',$user)->first();
        var_dump($providerUser);*/
    }
    public function callbackFacebook()
    {
    	$providerUser = \Socialite::driver('facebook')->user();
    	$provider = 'facebook';
        $this->checkIfUser($providerUser, $provider);
        return redirect('/');
        
        /* 
        var_dump($providerUser->getEmail());*/
    }
    public function callbackGoogle()
    {
        $providerUser = \Socialite::driver('google')->user(); 
        var_dump($providerUser);
    }
    public function addUser($user, $type){
    	$userReal = new User;
    	$userReal->username = $user->getNickname();
    	if ($type == 'facebook') {
    		$userReal->facebook_user_id = $user->getId();
    		$userReal->username = $user->getEmail();
    	}
    	if ($type == 'twitter') {
    		$userReal->twitter_user_id = $user->getId();
    	}    	
    	$userReal->email = $user->getEmail();
    	$userReal->confirmed = 1;
    	$userReal->save();

    	$userInfo = new users_info;
    	$userInfo->User()->associate($userReal);
    	$userInfo->save();

    	$userReal->with('users_info');
    	$userReal->users_info->nombre = $user->getName();
		$userReal->users_info->foto_url = $user->getAvatar();
		$userReal->users_info->save();	

		Auth::login($userReal);	

    	return true;
    }
    public function checkIfUser($user, $provider){
        if (User::where('email',$user->getEmail())->count() > 0) {
            $userReal = User::where('email',$user->getEmail())->first();
            if (!$userReal->facebook_user_id) {
            	$userReal->facebook_user_id = $user->getId();
            	$userReal->save();
            }
            Auth::login($userReal);
            return true;
        }else{
	        switch ($provider) {
	        	case 'twitter':
	        		if (User::where('twitter_user_id',$user->getId())->count() > 0) {
	        			$userReal = User::where('twitter_user_id',$user->getId())->first();
	        			Auth::login($userReal);
			            return true;
			        }else{
			        	$usertype = 'twitter';
			        	$this->addUser($user, $usertype);
			        	return true;
			        }
	        		break;
	        	case 'facebook':
	        		if (User::where('facebook_user_id',$user->getId())->count() > 0) {
	        			$userReal = User::where('facebook_user_id',$user->getId())->first();
	        			Auth::login($userReal);
			        }else{
			        	$usertype = 'facebook';
			        	$this->addUser($user, $usertype);
			        	return true;
			        }
	        		break;
	        	case 'google':
	        		if (User::where('google_user_id',$user->getId())->count() > 0) {
			            echo "true";
			        }
	        		break;          	
	        	default:
	        		echo "false";
	        		break;
	        }
	    }
        
    }
}