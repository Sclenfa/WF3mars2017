<?php

    session_start();
    require_once(__DIR__ . '/../vendor/autoload.php');


    if(isset($_GET['controller']) && !empty($_GET['controller']) && isset($_GET['action']) && !empty($_GET['action'])){
        $controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller';

        if(file_exists(__DIR__ . '/../src/Controller/' . ucfirst($_GET['controller']) . 'Controller.php')){
            $a = new $controller;
            $action = strtolower($_GET['action']);
            if(method_exists($a, $action)){
                if(isset($_GET['id'])){
                    $id = (int) $_GET['id'];
                    $a -> $action($id);
                }elseif(isset($_GET['categorie'])){
                    $categorie = (string)$_GET['categorie'];
                    $a -> $action($categorie);
                }else{
                    $a -> $action();
                }
            }
        }
    }else{
        $a = new Controller\ProduitController;
        $a -> afficheAll();
    }

    // TEST 1 : Entity produit
    // $produit = new Entity\Produit;
    // $produit -> setTitre('Mon produit');
    // echo $produit -> getTitre();

    // TEST 2 : PDOManager
    // $pdom = Manager\PDOManager::getInstance();
    // $result = $pdom -> getPdo() -> query("SELECT * FROM produit");
    // $prod = $result -> fetchAll(PDO::FETCH_ASSOC);
    // print_r($prod);

    // TEST 3 : EntityRepository
    // $er = new Manager\EntityRepository;
    // $result = $er -> find(5);
    // print_r($result);

    // $er = new Manager\EntityRepository;
    // $result = $er -> findAll();
    // print_r($result);

    // $er = new Manager\EntityRepository;
    // $result = $er -> delete(5);
    // print_r($result);

    // $produit = array(
    //     "id_produit" => NULL,
    //     "reference" => "fq",
    //     "categorie" => "pantalon",
    //     "titre" => "fqqzd",
    //     "prix" => "15",
    //     "taille" => "S",
    //     "stock" => "15",
    //     "public" => "m",
    //     "photo" => "dqzqdzqzd.jpg",
    //     "couleur" => "blanc",
    //     "description" => "qzdqzdqzdqzdqzd dqzqzdqzdqzd"
    // );

    // $result = $er -> register($produit);

    // print_r($result);

    // TEST 4 : ProduitRepository
    // $pr = new  Repository\ProduitRepository;

    // $produit = $pr ->  getAllProduits();
    // $produit = $pr ->  getProduitById(6);
    // $produit = $pr ->  deleteProduitById(6);
    // $produit = $pr ->  getAllCategories();
    // $produit = $pr ->  getAllProduitsByCategorie('pull');
    // $produit = $pr ->  getAllSuggestions('pull', 7);

    // print_r($produit);

    // TEST 5 : ProduitController
    // $pc = new Controller\ProduitController;
    // $pc -> afficheAll();
    // $pc -> affiche(3);
    // $pc -> categorie('pantalon');
