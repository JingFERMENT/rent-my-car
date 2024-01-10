<?php

require_once(__DIR__ . '/../config/init.php');
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
     * Méthode permettant d'effectuer l'ajout d'une catégorie en base de données
     * 
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `categories`(`name`) VALUES (:name);';

        // préparer pour la sécurité de l'injection de SQL
        $sth = $pdo->prepare($sql);

        // méthode permttant de définir un marqueur et une valeur // appartenir à PDO Statement 
        $sth->bindValue(':name', $this->getName());

        $sthResult = $sth->execute();

        return $sthResult;
    }

    /**
     * 
     * Méthode permettant de retourner toutes les données de la base
     * 
     * @return array
     */
    public static function getAll(): array
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT `name`,`id_category` FROM `categories`;';

        /*Sélectionner toutes les valeurs dans la table catégorie*/
        // query : préparer et executer sans marqueur substitute
        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * 
     * Méthode permettant de retourner les valeurs concernées d'une id_category
     * 
     * @param int $id_category
     * 
     * @return Category
     */
    public static function get(int $id_category): Category|false
    {
        // appel de la méthode static connect
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `categories` WHERE `id_category` =:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        $category = new Category($result->name, $result->id_category);

        return $category;
    }

    /**
     * 
     * Méthode permettant de mettre à jour les valeurs dans la table catégorie
     *  
     * @param mixed $id_category
     * @param mixed $name
     * 
     * @return [type]
     */
    public function update(): bool
    {

        $pdo = Database::connect();

        $sql = 'UPDATE `categories` SET name = :name WHERE id_category =:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * 
     *  Méthode permettant de supprimer une valeur 
     * 
     * @param mixed $id_category
     * 
     * @return bool
     */
    public function delete($id_category): bool
    {

        $pdo = Database::connect();

        $sql = 'DELETE FROM `categories` WHERE id_category =:id_category';

        $sth = $pdo->prepare($sql);
        
        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT );

        $result = $sth->execute();

        return $result;
    }

    
    /**
     * 
     * Méthode permettant de vérifier s'il y a un doublon dans les noms de catégories 
     * 
     * @param mixed $name
     * 
     * @return bool
     */
    public function isExist($name):bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `categories` WHERE name =:name';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $name);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;

    }
}

// $new = new Category();

// var_dump($new->isExist('Voiture'));
