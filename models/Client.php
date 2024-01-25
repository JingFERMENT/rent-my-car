<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Client
{

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

    //==================== ID CLIENT ====================

    /**
     * Set the value of id_client
     *
     * @return  self
     */
    public function setId_client(?int $id_client): void
    {
        $this->id_client = $id_client;
    }


    /**
     * Get the value of id_client
     */
    public function getId_client(): ?int
    {
        return $this->id_client;
    }

    //==================== LASTNAME ====================

    /**
     * @param string $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }


    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    //==================== FIRSTNAME ====================


    /**
     * @param string $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }


    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }


    //==================== EMAIL ====================


    /**
     * @param string $email
     * 
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    //==================== BIRTHDAY ====================

    /**
     * Get the value of birthday
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */
    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    //==================== PHONE ====================
    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Get the value of phone
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    //==================== CITY ====================

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * Get the value of city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    //==================== ZIPCODE ====================

    /**
     * Set the value of zipcode
     *
     * @return  self
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * Get the value of zipcode
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    //==================== CREATED AT====================

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at(): ?string
    {
        return $this->created_at;
    }

    //==================== UPDATED AT====================

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at(?string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at(): ?string
    {
        return $this->updated_at;
    }

}
