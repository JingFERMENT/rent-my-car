<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/Database.php');


class Vehicles
{
    // déclaration des attributs
    private ?int $id_category;
    private string $name;

    private int $id_vehicle;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;

    /**
     * Méthode magique appelée automatiquement lors de l'instanciation de la classe 'Vehicles'
     * Elle assigne toutes les properties à la création de l'objet
     * 
     * @param int $id_category
     * @param string $name
     * @param int $id_vehicle
     * @param string $brand
     * @param string $model
     * @param string $registration
     * @param int $mileage
     * @param string $picture
     */
    public function __construct(
        string $name,
        int $id_category,
        int $id_vehicle,
        string $brand,
        string $model,
        string $registration,
        int $mileage,
        ?string $picture
    ) {
        $this->name = $name;
        $this->id_category = $id_category;

        $this->id_vehicle = $id_vehicle;
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->mileage = $picture;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of id_category
     */
    public function setId_category(int $id_category): void
    {
        $this->id_category = $id_category;
    }

    /**
     * Get the value of id_category
     */
    public function getId_category(): int
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_vehicle
     */
    public function setId_vehicle(int $id_vehicle): void
    {
        $this->id_vehicle = $id_vehicle;
    }

    /**
     * Get the value of id_vehicle
     */
    public function getId_vehicle(): int
    {
        return $this->id_vehicle;
    }

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

    /**
     * Set the value of picture
     */
    public function setPicture(string $picture):void
    {
        $this->picture = $picture;
    }


    /**
     * Get the value of picture
     */
    public function getPicture():string
    {
        return $this->picture;
    }
}
