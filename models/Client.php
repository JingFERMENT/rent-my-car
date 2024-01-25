<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/Database.php');

class Client {

    private ?int $id_client;
  
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private string $phone;
    private string $city;
    private string $zipcode;

    private ?string $created_at;
    private ?string $updated_at;

    public function __construct(
        // paramètre obligatoire en premier / facultatif ensuite
        string $lastname,
        string $firstname,
        string $email,
        string $birthday,
        string $phone,
        string $city,
        string $zipcode,
        string $created_at = null,
        string $updated_at = null,

    ) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }


    



}