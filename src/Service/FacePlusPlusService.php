<?php
// src/Service/FacePlusPlusService.php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FacePlusPlusService
{
    private const API_KEY = 'PKcIeI_tmHS4LSwVNVEfqe9Dv1-5Ncd8';
    private const API_SECRET = 'VHKvjDbFBmOToCuHeYaKj2OSSDv51IEf';
    private const DETECT_URL = 'https://api-us.faceplusplus.com/facepp/v3/detect';
    private const COMPARE_URL = 'https://api-us.faceplusplus.com/facepp/v3/compare';
    
    private Client $client;
    
    public function __construct()
    {
        $this->client = new Client();
    }
    
    public function detectFace(string $imagePath): ?string
    {
        try {
            $response = $this->client->post(self::DETECT_URL, [
                'multipart' => [
                    ['name' => 'api_key', 'contents' => self::API_KEY],
                    ['name' => 'api_secret', 'contents' => self::API_SECRET],
                    [
                        'name' => 'image_file',
                        'contents' => fopen($imagePath, 'r'),
                        'filename' => basename($imagePath)
                    ]
                ]
            ]);
            
            $data = json_decode($response->getBody(), true);
            
            if (isset($data['faces']) && count($data['faces']) > 0) {
                return $data['faces'][0]['face_token'];
            }
            return null;
        } catch (RequestException $e) {
            return null;
        }
    }
    
    public function compareFaces(string $faceToken1, string $faceToken2): bool
    {
        try {
            $response = $this->client->post(self::COMPARE_URL, [
                'form_params' => [
                    'api_key' => self::API_KEY,
                    'api_secret' => self::API_SECRET,
                    'face_token1' => $faceToken1,
                    'face_token2' => $faceToken2
                ]
            ]);
            
            $data = json_decode($response->getBody(), true);
            
            if (isset($data['confidence'])) {
                return $data['confidence'] > 70.0;
            }
            return false;
        } catch (RequestException $e) {
            return false;
        }
    }
}