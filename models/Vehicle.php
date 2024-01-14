<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/Database.php');
require_once(__DIR__ . '/Category.php');

class Vehicle
{
    // ! déclaration des attributs
    
    private ?int $id_vehicle;
    
    private string $brand;
    private string $model;
    private string $registration;
    private ?int $mileage;
    
    private ?string $picture;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at; 

    private ?int $id_category;
    private Category|false $category;
   

    // Méthode magique appelée automatiquement lors de l'instanciation de la classe 'Vehicles'
    //* Elle assigne toutes les properties à la création de l'objet

 
    public function __construct(
        // paramètre obligatoire en premier / facultatif ensuite
        string $brand = '',
        string $model = '',
        string $registration = '',
        
        ?int $mileage = 0,
        ?string $picture = null,

        string $created_at = null,
        string $updated_at = null,
        string $deleted_at = null,
        int $id_vehicle = null,
        int $id_category = null

        
    ) {
        $this->id_category = $id_category;
        $this->id_vehicle = $id_vehicle;
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->mileage = $picture;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->category = Category::get($id_category);
    }

//==================== ID VEHICLE ====================

    /**
     * Set the value of id_vehicle
     */
    public function setId_vehicle(?int $id_vehicle): void
    {
        $this->id_vehicle = $id_vehicle;
    }

    /**
     * Get the value of id_vehicle
     */
    public function getId_vehicle(): ?int
    {
        return $this->id_vehicle;
    }

//==================== BRAND ====================

    /**
     * Set the value of brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * Get the value of brand
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

//==================== MODEL ====================

    /**
     * Set the value of model
     *
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * Get the value of model
     */
    public function getModel(): string
    {
        return $this->model;
    }

//==================== REGISTRATION ====================
    /**
     * Set the value of registration
     */
    public function setRegistration(string $registration): void
    {
        $this->registration = $registration;
    }

    /**
     * Get the value of registration
     */
    public function getRegistration(): string
    {
        return $this->registration;
    }

//==================== Mileage ====================
    /**
     * Set the value of mileage
     */
    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    /**
     * Get the value of mileage
     */
    public function getMileage(): int
    {
        return $this->mileage;
    }

//==================== PICTURE ====================
    /**
     * Set the value of picture
     */
    public function setPicture(?string $picture):void
    {
        $this->picture = $picture;
    }


    /**
     * Get the value of picture
     */
    public function getPicture():?string
    {
        return $this->picture;
    }


//==================== CREATED_AT ====================

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at():?string
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

    }

//==================== UPDATED_AT ====================
    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at():?string
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */ 
    public function setUpdated_at(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

//==================== DELETED_AT ====================
    /**
     * Get the value of deleted_at
     */ 
    public function getDeleted_at():string
    {
        return $this->deleted_at;
    }

    /**
     * Set the value of deleted_at
     */ 
    public function setDeleted_at(string $deleted_at)
    {
        $this->deleted_at = $deleted_at;

    }

//==================== ID CATEGORY ====================

    /**
     * Set the value of id_category
     */
    public function setId_category(int $id_category): void
    {
        $this->id_category = $id_category;
        $this->category = Category::get($id_category);
    }

    /**
     * Get the value of id_category
     */
    public function getId_category(): ?int
    {
        return $this->id_category;
    }

//==================== CATEGORY ====================
    /**
     * Set the value of category
     */
    public function setCategory(int $id_category): void
    {
        $this->category = Category::get($id_category);
    }

    /**
     * Get the value of name
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    public function insertVehicle() {
        
    }









}
