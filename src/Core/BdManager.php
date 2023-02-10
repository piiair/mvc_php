<?php 

namespace App\Core;

use PDO;

class BdManager
{
    private $dsn = 'mysql:host=localhost;dbname=bd_site_tel';

    private $userName = "root";

    private $password = "";

    public function getConnect()
    {
        $pdo = new PDO($this->dsn, $this->userName, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function nettoieFormulaire($pString)
    {
        $pString = htmlspecialchars(strip_tags($pString));
        return $pString;
    }

    private function requete($sql, array $param = null)
    {
        //Je récupère une connection à la bdd
        $connect = $this->getConnect();
        if($param !== null){
            //Si le tableau n'est pas vide on éxécute une requête préparée pour se protéger des attaques par injection sql.
            $stmt = $connect->prepare($sql);
            $stmt->execute($param);
            return $stmt;
        }
        else{
            // S'il n'y a pas de param alors on éxécute une requête "query"
            return $connect->query($sql);
        }
    }

    public function findAll($pTable)
    {   
        // requête pour tous les enregistrements d'une table
        $sql = "SELECT * FROM $pTable WHERE id = 1";
        // on éxécute une requête non préparée
        $stmt = $this->requete($sql);
        //On récupère le résultat sous forme d'objet
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    //Fonction qui fait un INSERT à partir des éléments d'un tableau et d'une table dans la bdd.
    public function add(array $pTableau, string $pTable)
    {
        // Un tableau vide pour stoker les keys du _POST qui correspondent aux noms des colonnes dans la table sql
        $colonnes = [];

        // Tableau vide pour stoker les valeurs à mettre dans la table
        $valeurs = [];

        // Tableau vide pour stocker les paramètres
        $params = [];

        foreach ($pTableau as $key => $value ){
            $colonnes[] = $key;
            $valeurs[] = " ? ";
            // On nettoie les entrées formulaire pour éviter les attaques.
            $params[] = $this->nettoieFormulaire($value);
        }
        // Je transforme les tableaux en chaînes de caractères afin de pouvoir les insérer dans une requête par la suite. 
        $string_colonne = implode(",", $colonnes);
        $string_valeurs = implode(",", $valeurs);

        $sql = "INSERT INTO $pTable (" . $string_colonne . ") VALUES (" . $string_valeurs . ")";

        return $this->requete($sql, $params);
    }

    // fonction qui supprime enfonction d'une table et d'un id
    public function delete($pTable, $pId)
    {
        $pId = $this->nettoieFormulaire($pId);
        $sql = "DELETE FROM $pTable WHERE id = $pId";
        $this->requete($sql);
    }

    //Fonction qui récupère en fonction de l'id et d'une table
    public function find($pTable, $pId)
    {
        $pId = $this->nettoieFormulaire($pId);
        $sql = "SELECT * FROM $pTable WHERE id = $pId";
        $stmt = $this->requete($sql);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Fonction qui édite en fonction d'un tableau et d'une table
    public function edit(array $pTableau, string $pTable, $pId)
    {
        $colonnes = [];
        $params = [];
        $pId = $this->nettoieFormulaire($pId);
        
        foreach($pTableau as $key => $value){
            $colonnes[] = "$key = ?";
            $params[] = $this->nettoieFormulaire($value);
        }

        $string_colonnes = implode(",", $colonnes);
        $sql = "UPDATE $pTable SET $string_colonnes WHERE id = $pId";
        $this->requete($sql, $params);
    }

}