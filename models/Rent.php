<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Rent
{
    private string $startdate;
    private string $enddate;

    private ?int $id_rent;
    private ?string $created_at;
    private ?string $confirmed_at;
    private ?int $id_vehicle;
    private ?int $id_client;


    public function __construct(
        string $startdate,
        string $enddate,
        ?int $id_rent,
        ?int $id_vehicle,
        ?int $id_client,
        ?string $created_at = null,
        ?string $confirmed_at = null,

    ) {
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->id_rent = $id_rent;
        $this->id_vehicle = $id_vehicle;
        $this->id_client = $id_client;
        $this->created_at = $created_at;
        $this->confirmed_at = $confirmed_at;
    }

    //==================== START DATE ====================

    /**
     * Set the value of startdate
     *
     * @return  self
     */
    public function setStartdate(string $startdate): void
    {
        $this->startdate = $startdate;
    }

    /**
     * Get the value of startdate
     */
    public function getStartdate(): string
    {
        return $this->startdate;
    }

    //==================== END DATE ====================

    /**
     * Set the value of enddate
     *
     * @return  self
     */
    public function setEnddate(string $enddate): void
    {
        $this->enddate = $enddate;
    }

    /**
     * Get the value of enddate
     */
    public function getEnddate(): string
    {
        return $this->enddate;
    }

    //==================== ID RENT ====================

    /**
     * Set the value of id_rent
     *
     * @return  self
     */
    public function setId_rent(?int $id_rent): void
    {
        $this->id_rent = $id_rent;
    }

    /**
     * Get the value of id_rent
     */
    public function getId_rent(): ?int
    {
        return $this->id_rent;
    }

    //==================== ID VEHICLE ====================

    /**
     * Set the value of id_vehicle
     *
     * @return  self
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

    //==================== ID CLIENT ====================

    
    /**
     * Set the value of id_client
     *
     * @return  self
     */
    public function setId_client(?int $id_client):void 
    {
        $this->id_client = $id_client;
    }

    /**
     * Get the value of id_client
     */
    public function getId_client():?int
    {
        return $this->id_client;
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

    //==================== CONFIRMED AT====================

    /**
     * Set the value of confirmed_at
     *
     * @return  self
     */
    public function setConfirmed_at(?string $confirmed_at): void
    {
        $this->confirmed_at = $confirmed_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getConfirmed_at(): ?string
    {
        return $this->confirmed_at;
    }


    public function insertRent(): bool
    {

        $pdo = Database::connect();

        $sql = 'INSERT INTO `rents`(`id_rent`,`startdate`,`firstname`,`email`,`birthday`,`phone`,`city`,`zipcode`) 
        VALUES (:id_client, :lastname,:firstname,:email,:birthday,:phone,:city,:zipcode);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_client', $this->getId_client(), PDO::PARAM_INT);
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':birthday', $this->getBirthday());
        $sth->bindValue(':phone', $this->getPhone());
        $sth->bindValue(':city', $this->getCity());
        $sth->bindValue(':zipcode', $this->getZipcode());

        $sth->execute();
        return $sth->rowCount() > 0;

    }

}
