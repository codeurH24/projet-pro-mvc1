<?php
// require '/app/class/db.php';

function getComponentsLike($word)
{
	try
	{
	    $db = dbConnect();

			$sql = 'SELECT * FROM `component` WHERE `model` LIKE \'%'.$_POST['keyWord'].'%\' ';

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
					'SELECT * FROM `component`
					INNER JOIN picture_component ON picture_component.id_component = component.id
					INNER JOIN category ON category.id = component.id_cat
					LEFT JOIN compatibility_tag ON compatibility_tag.id_component = component.id
					WHERE category.name LIKE \''.$componentName.'\' AND compatibility_tag.tag IN('.$strTags .')';
				}else{
					$sql = 'SELECT * FROM component';
				}
			}else{
				if ($componentName != '') {
					$sql =
					'SELECT * FROM `component`
					INNER JOIN picture_component ON picture_component.id_component = component.id
					INNER JOIN category ON category.id = component.id_cat
					WHERE category.name LIKE \''.$componentName.'\';';
				}else{
					$sql = 'SELECT * FROM component';
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

			$sql = 'SELECT * FROM `component` WHERE id = '.$id;
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
				'	SELECT * FROM `component`
					INNER JOIN picture_component ON picture_component.id_component = component.id
					INNER JOIN category ON category.id = component.id_cat
					LEFT JOIN compatibility_tag ON compatibility_tag.id_component = component.id
					WHERE category.name LIKE \''.$componentName.'\' AND compatibility_tag.tag IN('.$strTags .')
					LIMIT '.$limit.' ;';
			}else{
				$sql =
				'SELECT * FROM `component`
				INNER JOIN picture_component ON picture_component.id_component = component.id
				INNER JOIN category ON category.id = component.id_cat
				WHERE category.name LIKE \''.$componentName.'\'
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
	'SELECT COUNT(*) AS `count` FROM `component`
	INNER JOIN category ON category.id = component.id_cat
	WHERE category.name LIKE \''.$componentName.'\'';

	$result = $db->query($sql);
	$countComponents = $result->fetchAll(PDO::FETCH_OBJ)[0];
	return $countComponents->count;
}

function createComponent($model, $marque, $score, $category){
	try
	{
		$db = dbConnect();

		$sql =
		'INSERT INTO component
		(`model`, `marque`, `point_puissance`, `autor`, `id_cat`, `date_at`)
		VALUES
		(:model, :marque, :point_puissance, :autor, :id_cat, :date_at)';

		$requete = $db->prepare($sql);
		$requete->execute([
			':model' => $model,
			':point_puissance' => $score,
			':marque' => $marque,
			':autor' => $_SESSION['user']['pseudo'],
			':id_cat' => $category	,
			':date_at' => dbDate()
		]);

		$lastID = $db->lastInsertId();

		if( !empty($_FILES["pictureComponentCreate"]['name']) ) {
			$target_dir = "./public/picture/composants/";
			$target_file = $target_dir . basename($_FILES["pictureComponentCreate"]["name"]);
			$resultUpload = move_uploaded_file($_FILES["pictureComponentCreate"]["tmp_name"], $target_file);
			if( $resultUpload ){
				$namePicture = basename($_FILES["pictureComponentCreate"]["name"]);
				$sql = 'INSERT INTO `picture_component`
								(`picture`, `id_component`)
								VALUES
								(:namePicture, :lastID)';
				$requete = $db->prepare($sql);
				$requete->execute([
					':namePicture' => $namePicture,
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
        $sql = 'DELETE FROM component WHERE id = '.$id;
        $result = $db->query($sql);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}



function updateComponent($id, $model, $marque, $score, $category){
	try
	{
		$db = dbConnect();

		$sql =
		'	UPDATE component
			SET
			`model` = :model,
			`point_puissance` = :point_puissance,
			`marque` = :marque,
			`autor` = :autor,
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
			':autor' => $_SESSION['user']['pseudo'],
			':id_cat' => $category	,
			':date_at' => dbDate()
		]);

		if( !empty($_FILES["picture"]['name']) ) {
			$target_dir = "./public/picture/composants/";
			$target_file = $target_dir . basename($_FILES["picture"]["name"]);
			$resultUpload = move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

			if( $resultUpload ){
				$namePicture = basename($_FILES["picture"]["name"]);
				$sql = 'UPDATE `picture_component` SET `picture` = :namePicture WHERE id_component = :id';
				$requete = $db->prepare($sql);
				$requete->execute([
					':namePicture' => $namePicture,
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
