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
    //private Object|false $category;


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
        //$this->category = Category::get($id_category);
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
    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    //==================== PICTURE ====================
    /**
     * Set the value of picture
     */
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }


    /**
     * Get the value of picture
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }


    //==================== CREATED_AT ====================

    /**
     * Get the value of created_at
     */
    public function getCreated_at(): string
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
    public function getUpdated_at(): ?string
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
    public function getDeleted_at(): ?string
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
        //$this->category = Category::get($id_category);
    }

    /**
     * Get the value of id_category
     */
    public function getId_category(): ?int
    {
        return $this->id_category;
    }

    // créer un objet donc une méthode non-static
    /**
     * 
     * Méthode permettant d'effectuer l'ajout d'un véhicule dans la base de données
     * 
     * @return bool
     */
    public function insertVehicle(): bool
    {
        $pdo = Database::connect();

        // attention aux bonnes correspondanes 
        $sql = 'INSERT INTO `vehicles`(`brand`,`model`,`registration`,`mileage`,`picture`,`id_category`) 
        VALUES (:brand, :model,:registration,:mileage,:picture,:id_category );';

        // préparer pour la sécurité de l'injection de SQL
        $sth = $pdo->prepare($sql);
        // $sth = statement handle

        // méthode permttant de définir un marqueur et une valeur // appartenir à PDO Statement 
        // type attendu des valeurs : 3ème paramètre de bindValue par défaut c'est un string 
        // méthode bindValue qui appartient à la PDO Statement
        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getId_category(), PDO::PARAM_INT);

        // executer les requêtes 
        // méthode execute qui appartient à la PDO Statement
        // pour savoir la requête est bien executé 
        // PDOStatement::rowCount — Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()


        $sthResult = $sth->execute();
        // $nbRows = $sth->rowCount();

        //   if($nbRows>0) {
        //         return true;
        //     } else {
        //         return false;
        //     }

        // return $sth->rowCount() > 0 ? true: false ;
        return $sth->rowCount() > 0;
        // return (bool) $sth->rowCount();

    }


    /**
     * @param int $id_category
     * 
     * @return bool
     */
    public static function getVehiclesFromIdCategory(?int $id_category): bool
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) FROM `vehicles` WHERE `id_category` =:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetchColumn();

        return $result > 0;
    }


    /**
     * 
     * Méthode permettant de retourner la liste de tous les véhicules
     * 
     * @param bool $sortByAsc
     * 
     * @return array
     */
    public static function getAllVehicles(bool $sortByAsc, $start, $per_page, bool $isArchived = false): array|false
    {
        $pdo = Database::connect();

        if ($isArchived == false) {
            $archive = 'IS NULL';
        } else {
            $archive = 'IS NOT NULL';
        }

        // attention sur JOIN
        // $sql = 'SELECT `id_vehicle`,`brand`,`model`,`registration`, `mileage`, `picture`, `created_at`, `vehicles`.`id_category`, `categories`.`name`
        // ON clé primaire et clé étrangère
        $sql = 'SELECT * FROM `vehicles` 
        INNER JOIN `categories` ON (`categories`.`id_category` = `vehicles`.`id_category` ) 
        WHERE `deleted_at` ' . $archive . ' ORDER BY `categories`.`name`'.
        "LIMIT $start, $per_page;";


        $sqlAsc = $sql . ';';
        $sqlDesc = $sql . ' DESC;';

        // pour pouvoir trier les catégories selon l'ordre alphabétique 
        // envoyer sur URL / marqueur subsitutive 

        // query : PDOStatement | false
        if ($sortByAsc) {
            $sth = $pdo->query($sqlAsc);
        } else {
            $sth = $pdo->query($sqlDesc);
        }

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * 
     * Methode statique permettant de retourner un véhicule avec l'id_vehcile demandé
     * 
     * @param int $id_vehicle
     * 
     * @return object
     */
    public static function get(int $id_vehicle): object|false
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `vehicles` WHERE `id_vehicle` =:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id_vehicle, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }
    /**
     * 
     * Méthode permettant de mettre à jour les informations des véhicules
     * 
     * @return bool
     */
    public function updateVehicles(): bool
    {

        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles`  
        SET `brand` = :brand,
        `model` = :model,
        `registration` = :registration,
        `mileage` = :mileage,
        `picture` = :picture,
        `id_category` = :id_category
        WHERE 
        `id_vehicle` = :id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getId_category(), PDO::PARAM_INT);
        $sth->bindValue(':id_vehicle', $this->getId_vehicle(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * 
     * Méthode permettant de vérifier si la plaque d'immatriculation existe déjà
     * @param string $registration
     * 
     * @return bool
     */
    public static function isExist(string $registration): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_vehicle`) AS "count"
        FROM `vehicles`
        WHERE `registration` = :registration;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':registration', $registration);

        $result = $sth->execute(); // retourner true ou false sur la bonne execution de la requête

        $result = $sth->fetchColumn(); // on récupère la valeur retourner par le count (si c'est 0 c'est false)

        return (bool) $result > 0; // retourner true si c'est supérieur à 0;
    }

    /**
     * 
     * Méthode permettant d'archiver le véhicule concerné
     * 
     * @param int $id_vehicle
     * 
     * @return bool
     */
    public static function archive(int $id_vehicle): bool
    {
        $pdo = Database::connect();

        // fonction SQL: NOW() (heure de serveur des données) , décalage avec l'heure réelle (heure de web)
        $sql = 'UPDATE `vehicles`
        SET `deleted_at` = NOW()
        WHERE `id_vehicle` =:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id_vehicle, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * 
     * Méthode permettant de supprimer le véhicule concerné
     * 
     * @param int $id_vehicle
     * 
     * @return bool
     */
    public static function delete(int $id_vehicle): bool
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `vehicles`
        WHERE `id_vehicle` =:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id_vehicle, PDO::PARAM_INT);

        $sth->execute();

        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * Méthode permettant de réactiver un véhicule concerné
     * 
     * @param int $id_category
     * 
     * @return bool
     */
    public static function reactivate(int $id_vehicle): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles` SET `deleted_at` = NULL WHERE `id_vehicle` = :id_vehicle ;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id_vehicle, PDO::PARAM_INT);

        $sth->execute();

        if (!$sth->execute()) {
            throw new Exception('Erreur lors de la réactivation du véhicule.');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function pagination(int $offset)
    {
    
        $pdo = Database :: connect();

        $sql = 'SELECT * FROM `vehicles`  INNER JOIN `categories` ON (`categories`.`id_category` = `vehicles`.`id_category` ) 
        WHERE `deleted_at` IS NULL ORDER BY `categories`.`name` LIMIT 10 OFFSET :offset;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':offset', $offset, PDO::PARAM_INT); 

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

public static function nbOfAllVehicles(){

    $pdo = Database::connect();

    $sql = 'SELECT COUNT(*) AS nb_vehicles FROM `vehicles`;';

    $sth = $pdo->query($sql);

    $sth->execute(); 

    $result = $sth->fetchColumn(); 

    return $result;

}




 



}
