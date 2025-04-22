<?php
namespace App\Controllers\Client;

use Google\Client as GoogleClient;
use Google\Service\Oauth2;
use App\Models\User;

class GoogleAuthController
{
    private $client;
    

    public function __construct()
    {
        
        $this->client = new GoogleClient();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri('http://127.0.0.1:8081/login/google/callback');
        $this->client->addScope(['email', 'profile']);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');
    }

    public function redirectToGoogle()
    {
        header('Location: ' . $this->client->createAuthUrl());
        exit;
    }

    public function handleCallback()
    {
        if (!isset($_GET['code'])) {
            $_SESSION['google_auth_error'] = 'Đăng nhập thất bại: Thiếu mã xác thực';
            header('Location: /login');
            exit;
        }

        try {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            
            if (isset($token['error'])) {
                throw new \Exception($token['error_description'] ?? 'Lỗi không xác định từ Google');
            }

            $this->client->setAccessToken($token);
            
            $oauth = new Oauth2($this->client);
            $userInfo = $oauth->userinfo->get();

            // Lưu thông tin người dùng
            $_SESSION['user'] = [
                'google_id' => $userInfo->id,
                'email' => $userInfo->email,
                'name' => $userInfo->name,
                'avatar' => $userInfo->picture,
                'access_token' => $token
            ];

            header('Location: /');
            exit;

        } catch (\Exception $e) {
            error_log('Google Auth Error: ' . $e->getMessage());
            $_SESSION['google_auth_error'] = 'Đăng nhập bằng Google thất bại: ' . $e->getMessage();
            header('Location: /login');
            exit;
        }
    }


}