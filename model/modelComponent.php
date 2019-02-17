<?php
// require '/app/class/db.php';

function getComponentsLike($word)
{
	try
	{
	    $db = dbConnect();

			$sql = 'SELECT * FROM `composant` WHERE `model` LIKE \'%'.$_POST['keyWord'].'%\' ';

      $result = $db->query($sql);
      $components = $result->fetchAll(PDO::FETCH_OBJ);
      return $components;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}


function getComponents($componentName='', $tags=[])
{
	try
	{
	    $db = dbConnect();

			if(count($tags)){
				$strTags = "'".implode("','", $tags)."'";
				if ($componentName != '') {
					$sql =
					'SELECT * FROM `composant`
					INNER JOIN image_composant ON image_composant.id_composant = composant.id
					INNER JOIN categorie ON categorie.id = composant.id_cat
					LEFT JOIN compatibility_tag ON compatibility_tag.id_composant = composant.id
					WHERE categorie.nom LIKE \''.$componentName.'\' AND compatibility_tag.tag IN('.$strTags .')';
				}else{
					$sql = 'SELECT * FROM composant';
				}
			}else{
				if ($componentName != '') {
					$sql =
					'SELECT * FROM `composant`
					INNER JOIN image_composant ON image_composant.id_composant = composant.id
					INNER JOIN categorie ON categorie.id = composant.id_cat
					WHERE categorie.nom LIKE \''.$componentName.'\';';
				}else{
					$sql = 'SELECT * FROM composant';
				}
			}

      $result = $db->query($sql);
      $components = $result->fetchAll(PDO::FETCH_OBJ);
      return $components;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}
function getComponent($id)
{
	try
	{
	    $db = dbConnect();

			$sql = 'SELECT * FROM `composant` WHERE id = '.$id;
      $result = $db->query($sql);
      $component = $result->fetch(PDO::FETCH_OBJ);
      return $component;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}

function getComponentsLimit($componentName, $limit, $tags=[])
{
	try
	{
	    $db = dbConnect();
			if(count($tags)){
				$strTags = "'".implode("','", $tags)."'";
				$sql =
				'	SELECT * FROM `composant`
					INNER JOIN image_composant ON image_composant.id_composant = composant.id
					INNER JOIN categorie ON categorie.id = composant.id_cat
					LEFT JOIN compatibility_tag ON compatibility_tag.id_composant = composant.id
					WHERE categorie.nom LIKE \''.$componentName.'\' AND compatibility_tag.tag IN('.$strTags .')
					LIMIT '.$limit.' ;';
			}else{
				$sql =
				'SELECT * FROM `composant`
				INNER JOIN image_composant ON image_composant.id_composant = composant.id
				INNER JOIN categorie ON categorie.id = composant.id_cat
				WHERE categorie.nom LIKE \''.$componentName.'\'
				LIMIT '.$limit.' ;';
			}



      $result = $db->query($sql);
      $components = $result->fetchAll(PDO::FETCH_OBJ);
      return $components;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}


function countComponents($componentName){
	$db = dbConnect();

	$sql =
	'SELECT COUNT(*) AS `count` FROM `composant`
	INNER JOIN categorie ON categorie.id = composant.id_cat
	WHERE categorie.nom LIKE \''.$componentName.'\'';

	$result = $db->query($sql);
	$countComponents = $result->fetchAll(PDO::FETCH_OBJ)[0];
	return $countComponents->count;
}

function createComponent($model, $marque, $score, $categorie){
	try
	{
		$db = dbConnect();

		$sql =
		'INSERT INTO composant
		(`model`, `marque`, `point_puissance`, `auteur`, `id_cat`, `date_at`)
		VALUES
		(:model, :marque, :point_puissance, :auteur, :id_cat, :date_at)';

		$requete = $db->prepare($sql);
		$requete->execute([
			':model' => $model,
			':point_puissance' => $score,
			':marque' => $marque,
			':auteur' => $_SESSION['user']['pseudo'],
			':id_cat' => $categorie	,
			':date_at' => dbDate()
		]);
		$lastID = $db->lastInsertId();

		if( !empty($_FILES["imageComposantCreate"]) ) {
			$target_dir = "./public/image/composants/";
			$target_file = $target_dir . basename($_FILES["imageComposantCreate"]["name"]);
			$resultUpload = move_uploaded_file($_FILES["imageComposantCreate"]["tmp_name"], $target_file);
			if( $resultUpload ){
				$nameImage = basename($_FILES["imageComposantCreate"]["name"]);
				$sql = 'INSERT INTO `image_composant`
								(`image`, `id_composant`)
								VALUES
								(:nameImage, :lastID)';
				$requete = $db->prepare($sql);
				$requete->execute([
					':nameImage' => $nameImage,
					':lastID' => $lastID
				]);
			}else{
				exit('Problème d\'upload Attention au chmod sous linux');
			}
		}
		header('Location: /admin/composant/');


	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}

}

function deleteComponent($id){
    try
    {
        $db = dbConnect();
        $sql = 'DELETE FROM composant WHERE id = '.$id;
        $result = $db->query($sql);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}



function updateComponent($id, $model, $marque, $score, $categorie){
	try
	{
		$db = dbConnect();

		$sql =
		'	UPDATE composant
			SET
			`model` = :model,
			`point_puissance` = :point_puissance,
			`marque` = :marque,
			`auteur` = :auteur,
			`id_cat` = :id_cat,
			`date_at` = :date_at
			WHERE
			id = :id';

		$requete = $db->prepare($sql);
		$requete->execute([
			':id' => $id,
			':model' => $model,
			':point_puissance' => $score,
			':marque' => $marque,
			':auteur' => $_SESSION['user']['pseudo'],
			':id_cat' => $categorie	,
			':date_at' => dbDate()
		]);
		if( !empty($_FILES["image"]) ) {
			$target_dir = "./public/image/composants/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$resultUpload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

			if( $resultUpload ){
				$nameImage = basename($_FILES["image"]["name"]);
				$sql = 'UPDATE `image_composant` SET `image` = :nameImage WHERE id_composant = :id';
				$requete = $db->prepare($sql);
				$requete->execute([
					':nameImage' => $nameImage,
					':id' => $id
				]);
			}else{
				exit('Problème d\'upload Attention au chmod sous linux');
			}
		}
		header('Location: /admin/composant/');


	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}

}
