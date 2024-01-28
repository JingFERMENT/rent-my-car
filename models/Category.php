<?php
require_once(__DIR__ . '/../helpers/Database.php');

class Category
{

    // Déclaration des attributs
    // Créer autant des attributs que dans les colonnes de l'entité de MCD
    private ?int $id_category;
    private string $name;


    /**
     * Méthode magique appelée automatiquement lors de l'instanciation de la classe 'Category'
     * 
     * @param string $name
     * @param int|null $id_category
     * = null (valeur par défaut)
     * '' = création d'un valeur par défaut
     */
    public function __construct(string $name = '', ?int $id_category = null)
    {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    /**
     * 
     * Méthode permettant d'affecter la valeur passée en paramètre à l'attribut name
     * 
     * @param string $name
     * 
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * 
     * Méthode permettant de retourner la valeur de l'attribut name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Méthode permettant d'affecter la valeur passée en paramètre à l'attribut 'id_category'
     * 
     * @param int|null $id_category
     * 
     * @return int
     */
    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
    }

    /**
     * Méthode permettant de retourner la valeur de l'attribut 'id_category'
     * 
     * @return int|null
     */
    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }

    // création des méthodes persos
    /**
     * 
     * Méthode permettant l'enregistrement d'une nouvelle catégorie
     * 
     * @return bool True en cas de succès, sinon une erreur de type Exception est générée
     */
    public function insert(): bool
    {
        // Création d'une variable recevant un objet issu de la classe PDO 
        $pdo = Database::connect();

        // Requête contenant un marqueur nominatif
        $sql = 'INSERT INTO `categories`(`name`) VALUES (:name);';

        // Si marqueur nominatif, il faut préparer la requête 
        // pour la sécurité des requêtes de SQL (ne pas avoir de l'injection)
        $sth = $pdo->prepare($sql);

        // méthode permttant de définir un marqueur et une valeur qui appartient à PDO Statement 
        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':name', $this->getName());

        // Exécution de la requête
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
    }

    /**
     * 
     * Méthode permettant de récupérer la liste des catégories sous forme de tableau d'objets
     * 
     * @return array
     */
    public static function getAll(): array|false
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT `name`,`id_category` FROM `categories` ORDER BY `name`;';

        /*Sélectionner toutes les valeurs dans la table catégorie*/
        // $sql = 'SELECT * FROM `categories` ORDER BY `name`;';

        // query : préparer et executer sans marqueur substitute
        $sth = $pdo->query($sql);

        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    /**
     * 
     * Méthode permettant  de récupérer un objet standard avec pour propriétés, les colonnes sélectionnées
     * 
     * @param int $id_category
     * 
     * @return object
     */
    public static function get(int $id_category): object|false
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `categories` WHERE `id_category` =:id_category;';

        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);

        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        // Exécution de la requête
        $sth->execute();

        $data = $sth->fetch(PDO::FETCH_OBJ);

        // On teste si data est vide.
        if (!$data) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la récupération de catégorie.');
        } else {
            // Retourne la data dans le cas contraire (tout s'est bien passé)
            return $data;
        }
    }

    /**
     * Méthode permettant de savoir si une catégorie existe déjà
     * 
     * @param mixed $name
     * 
     * @return bool
     */
    public static function isExist(string $name): bool
    {
        $pdo = Database::connect();

        // SHOW COLLATION WHERE COLLATION LIKE  "%_cs"
        // COUNT(*): combien il y a d'enregistrement dans la base
        // laisser COUNT(*) peut avoir des problèmes quand on y accède (ex:objet->COUNT(*))
        // donc il faudrait nommer la colonne comme nbcolumn
        $sql = 'SELECT COUNT(*) AS `nbcolumn` FROM `categories` WHERE `name` = :name;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $name);

        $sth->execute();

        // fetchAll     => renvoyer toutes les lignes sous forme de tableau associatif
        // fetch        => récupérer première ligne à trouver ()
        // fetchColumn  => récupérer la valeur de la première colonne de chaque ligne.
        $result = $sth->fetchColumn();

        // if ($result !== false) {
        //     return true;
        // } else {
        //     return false;
        // }

        // Si le nombre de lignes correspondantes est supérieur à zéro, la valeur existe
        return $result > 0;
    }

    /**
     * 
     * Méthode permettant de l'enregistrement la mise à jour d'une catégorie
     * 
     * @return bool
     */
    public function update(): bool
    {
        // Création d'une variable recevant un objet issu de la classe PDO 
        $pdo = Database::connect();

        // Requête contenant un marqueur nominatif
        $sql = 'UPDATE `categories` SET `name` =:name WHERE `id_category` =:id_category;';

        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);

        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        if (!$sth->execute()) {
            throw new Exception('Erreur lors de la mise à jour de la catégorie.');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    /**
     * 
     *  Méthode permettant de supprimer une valeur 
     * 
     * @param mixed $id_category
     * 
     * @return bool
     */
    public static function delete(int $id_category): bool
    {

        // méthode "connect" static de la classe Database 
        $pdo = Database::connect();

        // marqueur nominatif 
        $sql = 'DELETE FROM `categories` WHERE `id_category` = :id_category;';

        // solution 1: marqueur nominatif prepare + bindValue + execute / solution 2: sans marquereur utiliser query
        $sth = $pdo->prepare($sql);

        // entier pour id_category
        // PDO::PARAM_INT: ne mets pas les "" entre les valeurs 
        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        $sth->execute();

        if(!$sth->rowCount()<= 0) {
            return false;
        } else {
            return true;
        }
    }
}
