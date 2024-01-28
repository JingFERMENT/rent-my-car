<?php
require_once(__DIR__ . '/../helpers/Database.php');


class Vehicle
{
    // ! déclaration des attributs
    private int $id_vehicle;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture = NULL;
    private DateTime $created_at;
    private DateTime $updated_at;
    private DateTime $deleted_at;
    private int $id_category;

    // Méthode magique appelée automatiquement lors de l'instanciation de la classe 'Vehicles'
    //* Elle assigne toutes les properties à la création de l'objet

    public function __construct(
        // paramètre obligatoire en premier / facultatif ensuite
        string $brand = '',
        string $model = '',
        string $registration = '',

        int $mileage = 0,
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
    }

    //==================== ID VEHICLE ====================
    public function setId_vehicle(?int $id_vehicle)
    {
        $this->id_vehicle = $id_vehicle;
    }

    public function getId_vehicle(): int
    {
        return $this->id_vehicle;
    }

    //==================== BRAND ====================
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    //==================== MODEL ====================
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    //==================== REGISTRATION ====================
    public function setRegistration(string $registration)
    {
        $this->registration = $registration;
    }


    public function getRegistration(): string
    {
        return $this->registration;
    }

    //==================== Mileage ====================
    public function setMileage(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    //==================== PICTURE ====================
    public function setPicture(?string $picture = NULL)
    {
        $this->picture = $picture;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }


    //==================== CREATED_AT ====================

    public function getCreated_at(): DateTime
    {
        return $this->created_at;
    }

    public function setCreated_at(string $created_at)
    {
        $this->created_at = new DateTime($created_at);
    }

    //==================== UPDATED_AT ====================

    public function getUpdated_at(): DateTime
    {
        return $this->updated_at;
    }

    public function setUpdated_at(string $updated_at)
    {
        $this->updated_at = new DateTime($updated_at);
    }

    //==================== DELETED_AT ====================

    public function getDeleted_at(): DateTime
    {
        return $this->deleted_at;
    }

    public function setDeleted_at(string $deleted_at)
    {
        $this->deleted_at = new DateTime($deleted_at);
    }

    //==================== ID CATEGORY ====================

    public function setId_category(int $id_category)
    {
        $this->id_category = $id_category;
        //$this->category = Category::get($id_category);
    }

    public function getId_category(): int
    {
        return $this->id_category;
    }

    // créer un objet donc une méthode non-static
    /**
     * 
     * Méthode permettant l'enregistrement d'un nouveau véhicule
     * 
     * @return bool True en cas de succès, sinon une erreur de type Exception est générée
     */
    public function insertVehicle(): bool
    {
        // Création d'une variable recevant un objet issu de la classe PDO 
        $pdo = Database::connect();

        // Requête contenant un marqueur nominatif
        // attention aux bonnes correspondanes 
        $sql = 'INSERT INTO `vehicles`
                    (`brand`, `model`, `registration`, `mileage`, `picture`, `id_category`) 
                VALUES 
                    (:brand, :model, :registration, :mileage, :picture, :id_category );';

        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);
        // $sth = statement handle

        // Affectation de la valeur correspondant au marqueur nominatif concerné
        // méthode bindValue permttant de définir un marqueur et une valeur 
        // appartenir à PDO Statement 
        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getId_category(), PDO::PARAM_INT);

        // Exécution de la requête
        // méthode execute qui appartient à la PDO Statement pour savoir la requête est bien executé 
        $sth->execute();

        // Appel à la méthode rowCount permettant de savoir combien d'enregistrements ont été affectés
        // par la dernière requête (fonctionnel uniquement sur insert, update, ou delete. PAS SUR SELECT!!)
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de l\'enregistrement de la catégorie');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }

        // $nbRows = $sth->rowCount();
        //   if($nbRows>0) {
        //         return true;
        //     } else {
        //         return false;
        //     }

        // return $sth->rowCount() > 0 ? true: false ;
        // return $sth->rowCount() > 0;
        // return (bool) $sth->rowCount();

    }


    /**
     * 
     * 
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
     * Méthode permettant de récupérer la liste des véhicules sous forme de tableau d'objets
     * 
     * @param bool $sortByAsc
     * 
     * @return array Tableau d'objets
     */
    public static function getAllVehicles(bool $sort, int $offset, bool $isArchived = false, int $id_category = 0, string $keywords = null): array|false
    {

        $pdo = Database::connect();

        // condition pour archivage
        $archive = $isArchived ? 'IS NOT NULL' : 'IS NULL';

        // condition pour rechercher
        // match SQL
        $research = $keywords ? " AND (`vehicles`.`brand` LIKE :keywords OR `vehicles`.`model` LIKE :keywords OR `categories`.`name` LIKE :keywords OR `registration` LIKE :keywords)" : '';

        // condition pour trier les categories
        $sortCategory = ($id_category != 0) ? " AND `categories`.`id_category`= :id_category" : '';

        // condition pour trier en croissance ou décroissance
        $order = $sort ? ' ASC' : ' DESC';

        $sql = 'SELECT * FROM `vehicles` 
                INNER JOIN `categories` ON (`categories`.`id_category` = `vehicles`.`id_category` ) 
                WHERE `deleted_at` ' . $archive . $research . $sortCategory .
            ' ORDER BY `categories`.`name`' . $order .
            ' LIMIT ' . PER_PAGE . ' OFFSET :offset';

        $sth = $pdo->prepare($sql);

        // prepare the SQL statement

        if ($keywords) {
            // % est un caractère joker
            $sth->bindValue(':keywords', '%' . $keywords . '%');
        }

        if ($id_category != 0) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }

        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }


    public static function nbOfAllVehicles(int $id_category = 0, string $keywords = null): int
    {

        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_vehicle`) AS nb_vehicles FROM `vehicles` 
        JOIN `categories` ON `categories`.id_category = `vehicles`.id_category';


        // if ($id_category != 0) {
        if ($id_category) {
            $sql .= ' WHERE `categories`.`id_category`=:id_category';
        }

        if ($keywords) {
            $sql .= ' AND (`brand` LIKE :keywords OR `model` LIKE :keywords OR `name` LIKE :keywords OR `registration` LIKE :keywords)';
        }

        $sth = $pdo->prepare($sql);

        if ($id_category) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }

        if ($keywords) {
            $sth->bindValue(':keywords', '%' . $keywords . '%');
        }

        $sth->execute();
        $result = $sth->fetchColumn();

        return $result;
    }

    public static function filterByCategory()
    {
        $pdo = Database::connect();

        $sql = 'SELECT DISTINCT `vehicles`.`id_category` , `name` FROM vehicles 
        INNER JOIN `Categories` ON (`categories`.`id_category` = `vehicles`.`id_category`) ORDER BY `name`;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * 
     * Méthode permettant  de récupérer un objet standard avec pour propriétés, les colonnes sélectionnées
     * 
     * @param int $id_vehicle
     * 
     * @return object
     */
    public static function get(int $id_vehicle): object|false
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `vehicles` 
        -- JOIN `categories` ON `categories`.id_category = `vehicles`.id_category 
        WHERE `id_vehicle` =:id_vehicle;';

        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);

        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':id_vehicle', $id_vehicle, PDO::PARAM_INT);

        // Exécution de la requête
        $sth->execute();

        $data = $sth->fetch(PDO::FETCH_OBJ);

         // On teste si data est vide.
         if (!$data) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la récupération des infos du véhicule');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return $data;
        }
    }
    /**
     * 
     * Méthode permettant l'enregistrement la mise à jour d'une catégorie
     * 
     * @return bool True en cas de succès, sinon une erreur de type Exception est générée
     */
    public function updateVehicles(): bool
    {

        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles` SET 
                    `brand` = :brand,
                    `model` = :model,
                    `registration` = :registration,
                    `mileage` = :mileage,
                    `picture` = :picture,
                    `id_category` = :id_category
        
                    WHERE `id_vehicle` = :id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getId_category(), PDO::PARAM_INT);
        $sth->bindValue(':id_vehicle', $this->getId_vehicle(), PDO::PARAM_INT);

        $result = $sth->execute();

        if (!$result) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la mise à jour de la catégorie');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
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
        $sql = 'UPDATE `vehicles` SET 
                    `deleted_at` = NOW() WHERE `id_vehicle` =:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id_vehicle, PDO::PARAM_INT);

        $result = $sth->execute();

        if ($result <= 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 
     * Méthode permettant la suppression d'une catégorie
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
}

// paramètre nommmé : prendre le nom de paramètre, puis affecter une valeur, quelque soit leurs ordres
